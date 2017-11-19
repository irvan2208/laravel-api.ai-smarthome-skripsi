<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            $role = new Role();
            $role->name = 'admin';
            $role->display_name = 'Administrator';
            $role->save();

            $user = new Role();
            $user->name = 'user';
            $user->display_name = 'User';
            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
