<?php
namespace App\Http\Helpers\Helper;

use App\Models\User;

class Helper {
    public static function getAdminRoleId() {
        $admin_id = User::firstWhere('name', '=', 'Admin')->id;
        return $admin_id;
    }

    public static function getCustomerRoleId() {
        $cust_id = User::firstWhere('name', '=', 'Customer')->id;
        return $cust_id;
    }
}