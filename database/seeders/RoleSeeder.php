<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public const PERAN = [
        'admin',
        'operator_korwil',
        'korwilcam',
        'kepala_sekolah',
        'operator_sekolah',
    ];

    public function run(): void
    {
        foreach (self::PERAN as $peran) {
            Role::firstOrCreate(['name' => $peran, 'guard_name' => 'web']);
        }
    }
}
