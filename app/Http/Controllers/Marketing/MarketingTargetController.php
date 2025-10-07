<?php

namespace App\Http\Controllers\Marketing;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use App\Models\Admin\Industry;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use App\Models\Admin\MarketingTarget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MarketingTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $selectedMonth = $request->input('month');
        $year = now()->year;

        $query = MarketingTarget::query()->where('year', $year)->with('user');

        if ($selectedMonth) {
            $query->where('month', $selectedMonth);
        }

        $groupedTargets = [];
        $user = Auth::user();

        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
            $targets = $query->get();
            $groupedTargets[] = [
                'name' => $user->name,
                'user_id' => $user->id,
                'targets' => $this->structureTargets($targets),
            ];
        } else {
            $targets = $query->get();
            $grouped = $targets->groupBy('user_id');

            foreach ($grouped as $userId => $userTargets) {
                $userName = $userTargets->first()?->user?->name ?? 'Unknown';
                $groupedTargets[] = [
                    'name' => $userName,
                    'user_id' => $userId,
                    'targets' => $this->structureTargets($userTargets),
                ];
            }
        }

        return view('metronic.pages.marketingTarget.index', [
            'months' => $months,
            'selectedMonth' => $selectedMonth,
            'year' => $year,
            'groupedTargets' => $groupedTargets,
            'user' => $user,
        ]);
    }



    private function structureTargets($targets)
    {
        $result = [];

        foreach ($targets as $target) {
            $result[$target->contact_type][$target->sector] = $target->amount;
        }

        return $result;
    }


    public function editMonth($userId, $month)
    {
        $year = now()->year;

        $targets = MarketingTarget::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        $existingTargets = [];
        foreach ($targets as $t) {
            $existingTargets[$t->contact_type][$t->sector] = $t->amount;
        }

        return view('metronic.pages.marketingTarget.edit', [
            'user_id' => $userId,
            'selectedMonth' => $month,
            'existingTargets' => $existingTargets,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['users'] = User::where('role', 'sales')->select('users.id', 'users.name')->get();
        return view('metronic.pages.marketingTarget.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|string',
            'targets' => 'required|array',
        ]);

        try {
            $userId = $request->input('user_id') ?? Auth::id();
            $month = $request->input('month');
            $year = $request->input('year') ?? date('Y');
            $targets = $request->input('targets');

            foreach ($targets as $contactType => $sectorTargets) {
                foreach ($sectorTargets as $target) {
                    $sectorName = $target['sector'];
                    $amount = (float) $target['amount']; // Changed to float to support decimals

                    if ($amount > 0) {
                        MarketingTarget::create([
                            'user_id'      => $userId,
                            'sector'       => $sectorName,
                            'year'         => $year,
                            'month'        => $month,
                            'contact_type' => $contactType,
                            'amount'       => $amount,
                            'value'        => null,
                            'status'       => 'pending',
                        ]);
                    }
                }
            }

            Session::flash('success', 'Marketing targets saved successfully.');
            return redirect()->route('admin.marketing-target.index');
        } catch (\Exception $e) {

            Session::flash('error', 'Error storing marketing target: ' . $e->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedMonth = request()->query('month') ?? now()->format('F');
        $selectedYear = request()->query('year') ?? now()->year;

        // Fetch marketing targets for this user/month/year
        $targets = MarketingTarget::where('user_id', $id)
            ->where('month', $selectedMonth)
            ->where('year', $selectedYear)
            ->get();

        // Build structure like: ['Physical' => ['Banks' => 5]]
        $existingTargets = [];
        foreach ($targets as $target) {
            $existingTargets[$target->contact_type][$target->sector] = $target->amount;
        }

        return view('metronic.pages.marketingTarget.edit', [
            'user_id' => $id,
            'selectedMonth' => $selectedMonth,
            'existingTargets' => $existingTargets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {
        $request->validate([
            'month' => 'required|string',
            'targets' => 'required|array',
        ]);

        try {
            // Use the provided user ID or fallback to authenticated user's ID
            $userId = $userId ?? Auth::id();
            $month = $request->input('month');
            $year = $request->input('year') ?? date('Y');
            $targets = $request->input('targets');

            // Delete old targets for this user/month/year before inserting new ones
            MarketingTarget::where('user_id', $userId)
                ->where('month', $month)
                ->where('year', $year)
                ->delete();

            // Store new targets
            foreach ($targets as $contactType => $sectorTargets) {
                foreach ($sectorTargets as $target) {
                    $sectorName = $target['sector'];
                    $amount = (float) $target['amount']; // float allows decimal

                    if ($amount > 0) {
                        MarketingTarget::create([
                            'user_id'      => $userId,
                            'sector'       => $sectorName,
                            'year'         => $year,
                            'month'        => $month,
                            'contact_type' => $contactType,
                            'amount'       => $amount,
                            'value'        => null,
                            'status'       => 'pending',
                        ]);
                    }
                }
            }

            Session::flash('success', 'Marketing targets updated successfully.');
            return redirect()->route('admin.marketing-target.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating marketing target: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
