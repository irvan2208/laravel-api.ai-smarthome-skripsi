<?php

use App\Helpers\Enums\UserStatus;
use App\Models\Role;
use App\Models\User;
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
        try {
            DB::beginTransaction();

            $admin = Role::where('name', 'admin')->first();

            $user = new User;
            $user->name = 'Admin';
            $user->email = 'admin@admin.com';
            $user->password = bcrypt('admin');
            $user->save();
            $user->attachRole($admin);
            $this->command->info($user->name. ' created!');
            DB::commit();
        } catch (\Exception $e) {
            $this->command->info($e);
            DB::rollBack();
        }
    }
}
