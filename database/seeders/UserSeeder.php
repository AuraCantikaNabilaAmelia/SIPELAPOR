<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * 1 akun testing per peran (password sama untuk semua: "password").
     * Akun kepala_sekolah dibuat sebagai Plt di 2 sekolah sekaligus untuk
     * menguji fitur "pilih sekolah aktif".
     */
    public function run(): void
    {
        $sekolahPertama = Sekolah::orderBy('id')->first();
        $sekolahKedua = Sekolah::orderBy('id')->skip(1)->first();

        $admin = $this->buatAkun('Admin SIPELAPOR', 'admin@sipelapor.test');
        $admin->assignRole('admin');

        $operatorKorwil = $this->buatAkun('Operator Korwil', 'operator.korwil@sipelapor.test');
        $operatorKorwil->assignRole('operator_korwil');

        $korwilcam = $this->buatAkun('Korwilcam Gunungwungkal', 'korwilcam@sipelapor.test');
        $korwilcam->assignRole('korwilcam');

        $kepalaSekolah = $this->buatAkun('Kepala Sekolah (Plt)', 'kepsek@sipelapor.test', $sekolahPertama?->id);
        $kepalaSekolah->assignRole('kepala_sekolah');
        if ($sekolahPertama && $sekolahKedua) {
            $kepalaSekolah->sekolahTerkait()->syncWithoutDetaching([
                $sekolahPertama->id => ['is_plt' => true],
                $sekolahKedua->id => ['is_plt' => true],
            ]);
        }

        $operatorSekolah = $this->buatAkun('Operator Sekolah', 'operator.sekolah@sipelapor.test', $sekolahPertama?->id);
        $operatorSekolah->assignRole('operator_sekolah');
    }

    private function buatAkun(string $nama, string $email, ?int $sekolahId = null): User
    {
        return User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $nama,
                'password' => Hash::make('password'),
                'sekolah_id' => $sekolahId,
                'email_verified_at' => now(),
            ]
        );
    }
}
