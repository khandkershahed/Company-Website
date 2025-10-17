<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\RfqOrderStatus;
use Illuminate\Support\Facades\Cache;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\LeaveApplication;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $guarded = [];


    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'department' => 'array',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('all_employees');
        });

        static::deleted(function () {
            Cache::forget('all_employees');
        });
    }
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
    // In User.php model
    public function inDepartment($department)
    {
        $depts = [];

        if (is_array($this->department)) {
            $depts = $this->department;
        } elseif (is_string($this->department)) {
            $decoded = json_decode($this->department, true);
            $depts = is_array($decoded) ? $decoded : [$this->department]; // fallback if not JSON
        }

        return in_array($department, $depts);
    }


    public function isBusinessAdminOrManager()
    {
        return $this->inDepartment('business') && in_array($this->role, ['admin', 'manager']);
    }

    public function staffDocuments()
    {
       return $this->hasMany(StaffDocument::class, 'user_id');
    }
}
