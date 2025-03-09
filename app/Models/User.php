<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\LeaveApplication;
use App\Models\Admin\RfqOrderStatus;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'photo',
    //     'phone',
    //     'designation',
    //     'address',
    //     'city',
    //     'country',
    //     'postal',
    //     'last_seen',
    //     'role',
    //     'status',
    //     'email_verified_at',
    //     'password',
    // ];


    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getpermissionGroups()
    {

        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    } // End Method



    public static function getpermissionByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    } // End Method

    public static function roleHasPermissions($role, $permissions)
    {

        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        }
    } // End Method

    public function getCategoryName()
    {
        return EmployeeCategory::where('id', $this->category_id)->value('name');
    }

    public function getSupervisorName()
    {
        return User::where('id', $this->supervisor_id)->value('name');
    }
    static public function getName($id)
    {
        return User::where('employee_id', $id)->value('name');
    }

    public function employeeStatus()
    {
        return $this->belongsTo(EmployeeCategory::class, 'category_id');
    }

    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class, 'employee_id');  // 'employee_id' is the foreign key in the leave_applications table
    }
    public function rfqOrderStatus()
    {
        return $this->hasMany(RfqOrderStatus::class, 'employee_id');  // 'employee_id' is the foreign key in the leave_applications table
    }
}
