<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
$permission->name = 'president';
$permission->guard_name = 'etudiant';

$permission->save();


$admin = new Permission();
$admin->name = 'admin';
$admin->save();
$user =  \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('admin'),
            
        ]);
        $user->givePermissionTo($admin );
    }
}
