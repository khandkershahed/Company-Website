<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['notifications'] = DB::table('notifications')->where('notifiable_id', Auth::user()->id)->orderBy('created_at' , 'DESC')->get();
        // return view('admin.pages.notification.all', $data);
        return view('metronic.pages.notification.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //id": "005b0661-7a5b-4ba6-80d4-5222e3b8e64a"
        //   +"type": "App\Notifications\RfqDeal"
        //   +"notifiable_type": "App\Models\User"
        //   +"notifiable_id": 1
        //   +"data": "{"name":"client","link":"","message":"A New RFQ\/Deal is created. Need to be checked."}"
        //   +"read_at": "2023-01-29 23:36:24"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('notifications')->where('id', $id)->delete();
    }

    public function multiDelete(Request $request)
    {
        $id = $request->id;
        DB::table('notifications')->whereIn('id', $id)->delete();
        return response()->json("Selected notifications deleted successfully.", 200);
    }
    public function bulkDelete(Request $request)
    {
        $id = $request->id;
        DB::table('notifications')->whereIn('id', $id)->delete();
        return response()->json("Selected notifications deleted successfully.", 200);
    }
}
