<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{

public function run()
{
    
         $user = User::create([
        'name' => 'george', 
        'email' => 'george@gmail.com',
        'password' => bcrypt('123456'),
        'roles_name' => ["owner"],
        'Status' => 'مفعل',
        ]);
  
        $role = Role::create(['name' => 'owner']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);


}
}