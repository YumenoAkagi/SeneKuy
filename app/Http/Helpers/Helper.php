<?php
namespace App\Http\Helpers;

use App\Models\Role;

class Helper {
    public static function getAdminRoleId() {
        $admin_id = Role::firstWhere('name', '=', 'Admin')->id;
        return $admin_id;
    }

    public static function getCustomerRoleId() {
        $cust_id = Role::firstWhere('name', '=', 'Customer')->id;
        return $cust_id;
    }
}