<?php



namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;



class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     */

    public function run(): void

    {

        $permissions = [

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'users-list',
            'users-create',
            'users-edit',
            'users-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'survey-list',
            'survey-create',
            'survey-edit',
            'survey-delete',

        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
