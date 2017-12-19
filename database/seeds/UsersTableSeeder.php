<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->first_name = 'John';
        $admin->last_name = 'Doe';
        $admin->middle_name = 'Admin';
        $admin->address = 'Malate, Manila';
        $admin->contact = '09368574701';
        $admin->email = 'admin@admin.com';
        $admin->status = 'active';
        $admin->password = bcrypt('admin');
        $admin->user_type = 'Admin';
        $admin->is_active = true;
        $admin->save();

        $customer = new User();
        $customer->first_name = 'John';
        $admin->last_name = 'Doe';
        $customer->middle_name = 'Customer';
        $customer->address = 'Malate, Manila';
        $customer->contact = '09368574701';
        $customer->email = 'customer@customer.com';
        $customer->status = 'active';
        $customer->password = bcrypt('customer');
        $customer->user_type = 'Customer';
        $customer->is_active = true;
        $customer->save();
    }
}
