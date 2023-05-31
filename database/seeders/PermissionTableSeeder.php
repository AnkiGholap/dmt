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
           'sku-viewAny',
            'sku-delete',
            'sku-view',
            'sku-edit',
            'sku-create',
            'sku-restore',
            'sku-forceDelete',
            'sku-update',
            'sku-store',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
