<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * 20 SD Negeri di Kecamatan Gunungwungkal (nama & alamat sesuai data
     * referensi Kemendikdasmen — data publik). NPSN & NSS sengaja memakai
     * nilai dummy, bukan NPSN resmi, sesuai aturan proyek.
     */
    private const SEKOLAH = [
        ['nama' => 'SD Negeri Bancak 01', 'dabin' => 'Dabin I', 'alamat' => 'Desa Bancak RT 04 RW 01, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gadu 01', 'dabin' => 'Dabin I', 'alamat' => 'Desa Gadu RT 03 RW 02, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gadu 02', 'dabin' => 'Dabin I', 'alamat' => 'Desa Gadu, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gajihan', 'dabin' => 'Dabin I', 'alamat' => 'Desa Gajihan RT 06 RW 02, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Giling 01', 'dabin' => 'Dabin I', 'alamat' => 'Desa Giling RT 04 RW 01, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Giling 02', 'dabin' => 'Dabin II', 'alamat' => 'Desa Giling, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Giling 03', 'dabin' => 'Dabin II', 'alamat' => 'Desa Giling RT 03 RW 04, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gulangpongge 01', 'dabin' => 'Dabin II', 'alamat' => 'Desa Gulangpongge RT 02 RW 01, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gulangpongge 02', 'dabin' => 'Dabin II', 'alamat' => 'Desa Gulangpongge RT 07 RW 02, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Gunungwungkal 01', 'dabin' => 'Dabin II', 'alamat' => 'Jl. Raya Gunungwungkal-Tlogowungu Km 1, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Jembulwunut', 'dabin' => 'Dabin III', 'alamat' => 'Desa Jembulwunut RT 01 RW 01, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Jepalo', 'dabin' => 'Dabin III', 'alamat' => 'Desa Jepalo, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Jrahi 01', 'dabin' => 'Dabin III', 'alamat' => 'Dukuh Jiwo RT 03 RW 03, Desa Jrahi, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Jrahi 02', 'dabin' => 'Dabin III', 'alamat' => 'Desa Jrahi, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Ngetuk 01', 'dabin' => 'Dabin III', 'alamat' => 'Desa Ngetuk RT 01 RW 02, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Perdopo 02', 'dabin' => 'Dabin IV', 'alamat' => 'Desa Perdopo, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Sampok', 'dabin' => 'Dabin IV', 'alamat' => 'Desa Sampok, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Sidomulyo 01', 'dabin' => 'Dabin IV', 'alamat' => 'Jl. Raya Gunungwungkal-Tlogowungu Km 7, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Sidomulyo 02', 'dabin' => 'Dabin IV', 'alamat' => 'Desa Sidomulyo RT 07 RW 02, Kec. Gunungwungkal'],
        ['nama' => 'SD Negeri Sumberejo 01', 'dabin' => 'Dabin IV', 'alamat' => 'Desa Sumberejo, Kec. Gunungwungkal'],
    ];

    public function run(): void
    {
        foreach (self::SEKOLAH as $urutan => $data) {
            $nomor = str_pad((string) ($urutan + 1), 4, '0', STR_PAD_LEFT);

            Sekolah::firstOrCreate(
                ['nama' => $data['nama']],
                [
                    'npsn' => "9999{$nomor}",
                    'nss' => "1010318{$nomor}",
                    'dabin' => $data['dabin'],
                    'alamat' => $data['alamat'],
                    'kecamatan' => 'Gunungwungkal',
                ]
            );
        }
    }
}
