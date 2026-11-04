@php
    $item = fn (string $routeName) => request()->routeIs($routeName) ? 'nav-item nav-item-active' : 'nav-item';
@endphp

<nav class="flex h-full flex-col gap-6 overflow-y-auto px-4 py-6">
    <a href="{{ route('dashboard') }}" class="px-1">
        <x-application-logo />
    </a>

    <div class="flex flex-col gap-1">
        <a href="{{ route('dashboard') }}" class="{{ $item('dashboard') }}">Dasbor</a>
    </div>

    @role('operator_sekolah')
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Sekolah Saya</p>
            <div class="flex flex-col gap-1">
                @if (auth()->user()->sekolah_id)
                    <a href="{{ route('sekolah.show', auth()->user()->sekolah_id) }}" class="{{ $item('sekolah.show') }}">Profil Sekolah</a>
                @endif
                <a href="{{ route('sekolah-saya.laporan') }}" class="{{ $item('sekolah-saya.laporan') }}">Laporan Bulanan</a>
                <a href="{{ route('sekolah-saya.riwayat') }}" class="{{ $item('sekolah-saya.riwayat') }}">Riwayat &amp; Status Pengiriman</a>
            </div>
        </div>
    @endrole

    @role('kepala_sekolah')
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Sekolah Saya</p>
            <div class="flex flex-col gap-1">
                @if (auth()->user()->sekolahAktif())
                    <a href="{{ route('sekolah.show', auth()->user()->sekolahAktif()->id) }}" class="{{ $item('sekolah.show') }}">Profil Sekolah</a>
                @endif
                <a href="{{ route('sekolah-saya.laporan-masuk') }}" class="{{ $item('sekolah-saya.laporan-masuk') }}">Laporan Masuk</a>
                <a href="{{ route('sekolah-saya.riwayat-persetujuan') }}" class="{{ $item('sekolah-saya.riwayat-persetujuan') }}">Riwayat Persetujuan</a>
            </div>
        </div>
    @endrole

    @role('operator_korwil')
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Pelaporan</p>
            <div class="flex flex-col gap-1">
                <a href="{{ route('korwil.periode') }}" class="{{ $item('korwil.periode') }}">Kelola Periode</a>
                <a href="{{ route('korwil.monitoring') }}" class="{{ $item('korwil.monitoring') }}">Monitoring Setor</a>
                <a href="{{ route('korwil.validasi') }}" class="{{ $item('korwil.validasi') }}">Validasi Laporan</a>
                <a href="{{ route('korwil.perubahan-pegawai') }}" class="{{ $item('korwil.perubahan-pegawai') }}">Perubahan Pegawai</a>
            </div>
        </div>
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Korwil &amp; Mekanisme</p>
            <div class="flex flex-col gap-1">
                <a href="{{ route('korwil.apel') }}" class="{{ $item('korwil.apel') }}">Apel Korwil</a>
                <a href="{{ route('korwil.pegawai') }}" class="{{ $item('korwil.pegawai') }}">Pegawai Kantor Korwil</a>
                <a href="{{ route('korwil.rekap-mekanisme') }}" class="{{ $item('korwil.rekap-mekanisme') }}">Rekap Mekanisme</a>
                <a href="{{ route('sekolah.index') }}" class="{{ $item('sekolah.index') }}">Data Sekolah</a>
            </div>
        </div>
    @endrole

    @role('korwilcam')
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Mekanisme</p>
            <div class="flex flex-col gap-1">
                <a href="{{ route('korwilcam.rekap-mekanisme') }}" class="{{ $item('korwilcam.rekap-mekanisme') }}">Rekap Mekanisme</a>
                <a href="{{ route('korwilcam.laporan') }}" class="{{ $item('korwilcam.laporan') }}">Laporan Sekolah</a>
                <a href="{{ route('sekolah.index') }}" class="{{ $item('sekolah.index') }}">Data Sekolah</a>
            </div>
        </div>
    @endrole

    @role('admin')
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Master Data</p>
            <div class="flex flex-col gap-1">
                <a href="{{ route('sekolah.index') }}" class="{{ $item('sekolah.index') }}">Master Sekolah</a>
                <a href="{{ route('admin.pegawai') }}" class="{{ $item('admin.pegawai') }}">Pegawai &amp; Riwayat Jabatan</a>
                <a href="{{ route('admin.referensi') }}" class="{{ $item('admin.referensi') }}">Data Referensi</a>
            </div>
        </div>
        <div>
            <p class="px-3 pb-1 text-xs font-medium text-ink-400">Administrasi</p>
            <div class="flex flex-col gap-1">
                <a href="{{ route('admin.impor') }}" class="{{ $item('admin.impor') }}">Impor Data Pegawai</a>
                <a href="{{ route('admin.pengguna') }}" class="{{ $item('admin.pengguna') }}">Kelola Pengguna &amp; Peran</a>
            </div>
        </div>
    @endrole

    <div class="mt-auto">
        <p class="px-3 pb-1 text-xs font-medium text-ink-400">Akun</p>
        <div class="flex flex-col gap-1">
            <a href="{{ route('profile.edit') }}" class="{{ $item('profile.edit') }}">Profil Saya</a>
        </div>
    </div>
</nav>
