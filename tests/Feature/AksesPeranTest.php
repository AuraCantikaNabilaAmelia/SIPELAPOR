<?php

namespace Tests\Feature;

use App\Models\Sekolah;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AksesPeranTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    private function buatUser(string $peran, ?Sekolah $sekolah = null): User
    {
        $user = User::factory()->create([
            'sekolah_id' => $sekolah?->id,
        ]);
        $user->assignRole($peran);

        return $user;
    }

    public function test_tamu_diarahkan_ke_login_saat_membuka_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    #[DataProvider('peranUntukDashboard')]
    public function test_setiap_peran_bisa_membuka_dashboard_sendiri(string $peran): void
    {
        $user = $this->buatUser($peran);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
    }

    public static function peranUntukDashboard(): array
    {
        return [
            ['admin'],
            ['operator_korwil'],
            ['korwilcam'],
            ['kepala_sekolah'],
            ['operator_sekolah'],
        ];
    }

    public function test_halaman_khusus_admin_ditolak_untuk_peran_lain(): void
    {
        $admin = $this->buatUser('admin');
        $operatorKorwil = $this->buatUser('operator_korwil');

        $this->actingAs($admin)->get('/admin/pengguna')->assertOk();
        $this->actingAs($operatorKorwil)->get('/admin/pengguna')->assertForbidden();
    }

    public function test_halaman_khusus_operator_korwil_ditolak_untuk_peran_lain(): void
    {
        $operatorKorwil = $this->buatUser('operator_korwil');
        $korwilcam = $this->buatUser('korwilcam');

        $this->actingAs($operatorKorwil)->get('/korwil/periode')->assertOk();
        $this->actingAs($korwilcam)->get('/korwil/periode')->assertForbidden();
    }

    public function test_halaman_khusus_operator_sekolah_ditolak_untuk_kepala_sekolah(): void
    {
        $sekolah = Sekolah::factory()->create();
        $operatorSekolah = $this->buatUser('operator_sekolah', $sekolah);
        $kepalaSekolah = $this->buatUser('kepala_sekolah', $sekolah);

        $this->actingAs($operatorSekolah)->get('/sekolah-saya/laporan')->assertOk();
        $this->actingAs($kepalaSekolah)->get('/sekolah-saya/laporan')->assertForbidden();
    }

    public function test_daftar_sekolah_hanya_untuk_lingkup_korwil(): void
    {
        $sekolah = Sekolah::factory()->create();
        $admin = $this->buatUser('admin');
        $operatorSekolah = $this->buatUser('operator_sekolah', $sekolah);
        $kepalaSekolah = $this->buatUser('kepala_sekolah', $sekolah);

        $this->actingAs($admin)->get('/sekolah')->assertOk();
        $this->actingAs($operatorSekolah)->get('/sekolah')->assertForbidden();
        $this->actingAs($kepalaSekolah)->get('/sekolah')->assertForbidden();
    }

    public function test_operator_sekolah_hanya_bisa_melihat_sekolahnya_sendiri(): void
    {
        $sekolahSendiri = Sekolah::factory()->create();
        $sekolahLain = Sekolah::factory()->create();
        $operatorSekolah = $this->buatUser('operator_sekolah', $sekolahSendiri);

        $this->actingAs($operatorSekolah)->get("/sekolah/{$sekolahSendiri->id}")->assertOk();
        $this->actingAs($operatorSekolah)->get("/sekolah/{$sekolahLain->id}")->assertForbidden();
    }

    public function test_korwil_dan_korwilcam_bisa_melihat_semua_sekolah(): void
    {
        $sekolah = Sekolah::factory()->create();
        $operatorKorwil = $this->buatUser('operator_korwil');
        $korwilcam = $this->buatUser('korwilcam');

        $this->actingAs($operatorKorwil)->get("/sekolah/{$sekolah->id}")->assertOk();
        $this->actingAs($korwilcam)->get("/sekolah/{$sekolah->id}")->assertOk();
    }

    public function test_kepala_sekolah_plt_bisa_melihat_dua_sekolah_dan_berpindah_sekolah_aktif(): void
    {
        $sekolahA = Sekolah::factory()->create();
        $sekolahB = Sekolah::factory()->create();
        $sekolahLain = Sekolah::factory()->create();

        $kepalaSekolah = User::factory()->create();
        $kepalaSekolah->assignRole('kepala_sekolah');
        $kepalaSekolah->sekolahTerkait()->attach([
            $sekolahA->id => ['is_plt' => true],
            $sekolahB->id => ['is_plt' => true],
        ]);

        $this->actingAs($kepalaSekolah)->get("/sekolah/{$sekolahA->id}")->assertOk();
        $this->actingAs($kepalaSekolah)->get("/sekolah/{$sekolahB->id}")->assertOk();
        $this->actingAs($kepalaSekolah)->get("/sekolah/{$sekolahLain->id}")->assertForbidden();

        $this->assertTrue($kepalaSekolah->isPltKepalaSekolah());

        // Memilih sekolah aktif yang sah.
        $this->actingAs($kepalaSekolah)
            ->put('/sekolah-aktif', ['sekolah_id' => $sekolahB->id])
            ->assertRedirect();
        $this->assertSame($sekolahB->id, session('sekolah_aktif_id'));

        // Mencoba memilih sekolah yang bukan miliknya ditolak.
        $this->actingAs($kepalaSekolah)
            ->put('/sekolah-aktif', ['sekolah_id' => $sekolahLain->id])
            ->assertForbidden();
    }
}
