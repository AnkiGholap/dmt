<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'mastersku-viewAny',
            'mastersku-delete',
            'mastersku-view',
            'mastersku-edit',
            'mastersku-create',
            'mastersku-restore',
            'mastersku-forceDelete',
            'mastersku-update',
            'mastersku-store',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
