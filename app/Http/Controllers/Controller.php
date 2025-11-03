<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected array $rfq_user_emails = [];
    protected array $sourcing_emails = [];
    protected $sales_managers;

    public function __construct()
    {
        // Fetch RFQ user emails (admins/managers in key departments)
        $this->rfq_user_emails = User::inDepartments(['sales', 'marketing', 'super_admin'])
            ->whereIn('role', ['admin', 'manager'])
            ->pluck('email')
            ->toArray();

        $this->sourcing_emails = User::inDepartments(['site', 'super_admin'])
            ->whereIn('role', ['admin', 'manager'])
            ->pluck('email')
            ->toArray();

        // Fetch sales/marketing/super_admin users
        $this->sales_managers = User::inDepartments(['sales', 'marketing', 'super_admin'])
            ->orderBy('id', 'DESC')
            ->get(['id', 'name']);


    }
}
