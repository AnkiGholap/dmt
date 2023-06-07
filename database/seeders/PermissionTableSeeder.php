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
           'purchaseorder-viewAny',
            'purchaseorder-delete',
            'purchaseorder-view',
            'purchaseorder-edit',
            'purchaseorder-create',
            'purchaseorder-restore',
            'purchaseorder-forceDelete',
            'purchaseorder-update',
            'purchaseorder-store',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
