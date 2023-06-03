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
           'actualstock-viewAny',
            'actualstock-delete',
            'actualstock-view',
            'actualstock-edit',
            'actualstock-create',
            'actualstock-restore',
            'actualstock-forceDelete',
            'actualstock-update',
            'actualstock-store',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
