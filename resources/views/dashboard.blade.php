<x-app-layout title="Dasbor">
    <div class="space-y-6">
        <x-card>
            <p class="text-sm text-ink-500">Selamat datang,</p>
            <h2 class="mt-1 text-xl font-semibold text-ink-900">{{ auth()->user()->name }}</h2>
            <p class="mt-1 text-sm text-ink-500">
                Peran: {{ \Illuminate\Support\Str::headline($peran ?? '-') }}
            </p>
        </x-card>

        @role('admin')
            <div class="grid gap-4 sm:grid-cols-2">
                <a href="{{ route('sekolah.index') }}" class="block">
                    <x-card class="transition hover:border-primary-300">
                        <p class="text-sm text-ink-500">Sekolah terdaftar</p>
                        <p class="mt-1 text-2xl font-semibold text-ink-900">{{ $jumlahSekolah }} SD</p>
                        <p class="mt-2 text-sm text-primary-700">Lihat Master Sekolah &rarr;</p>
                    </x-card>
                </a>
                <x-card>
                    <p class="text-sm font-medium text-ink-700">Langkah berikutnya</p>
                    <p class="mt-1 text-sm text-ink-500">
                        Master pegawai, data referensi, impor Excel, dan kelola pengguna akan tersedia di tahap pengembangan berikutnya.
                    </p>
                </x-card>
            </div>
        @endrole

        @role('operator_korwil')
            <div class="grid gap-4 sm:grid-cols-2">
                <a href="{{ route('sekolah.index') }}" class="block">
                    <x-card class="transition hover:border-primary-300">
                        <p class="text-sm text-ink-500">Sekolah di wilayah Gunungwungkal</p>
                        <p class="mt-1 text-2xl font-semibold text-ink-900">{{ $jumlahSekolah }} SD</p>
                        <p class="mt-2 text-sm text-primary-700">Lihat Data Sekolah &rarr;</p>
                    </x-card>
                </a>
                <x-card>
                    <p class="text-sm font-medium text-ink-700">Langkah berikutnya</p>
                    <p class="mt-1 text-sm text-ink-500">
                        Kelola periode, monitoring setor, validasi laporan, dan rekap Mekanisme akan tersedia di tahap pengembangan berikutnya.
                    </p>
                </x-card>
            </div>
        @endrole

        @role('korwilcam')
            <div class="grid gap-4 sm:grid-cols-2">
                <a href="{{ route('sekolah.index') }}" class="block">
                    <x-card class="transition hover:border-primary-300">
                        <p class="text-sm text-ink-500">Sekolah di wilayah Gunungwungkal</p>
                        <p class="mt-1 text-2xl font-semibold text-ink-900">{{ $jumlahSekolah }} SD</p>
                        <p class="mt-2 text-sm text-primary-700">Lihat Data Sekolah &rarr;</p>
                    </x-card>
                </a>
                <x-card>
                    <p class="text-sm font-medium text-ink-700">Langkah berikutnya</p>
                    <p class="mt-1 text-sm text-ink-500">
                        Rekap Mekanisme untuk ditinjau dan disetujui akan tersedia di tahap pengembangan berikutnya.
                    </p>
                </x-card>
            </div>
        @endrole

        @role('operator_sekolah')
            @php($sekolah = auth()->user()->sekolah)
            <x-card>
                <p class="text-sm text-ink-500">Sekolah Anda</p>
                @if ($sekolah)
                    <p class="mt-1 text-lg font-semibold text-ink-900">{{ $sekolah->nama }}</p>
                    <p class="text-sm text-ink-500">NPSN {{ $sekolah->npsn }} &middot; {{ $sekolah->dabin }}</p>
                    <a href="{{ route('sekolah.show', $sekolah->id) }}" class="mt-3 inline-block text-sm text-primary-700">Lihat profil sekolah &rarr;</a>
                @else
                    <p class="mt-1 text-sm text-ink-500">Akun ini belum dihubungkan ke sekolah manapun. Hubungi admin.</p>
                @endif
                <p class="mt-4 text-sm text-ink-500">
                    Formulir laporan bulanan akan tersedia di tahap pengembangan berikutnya.
                </p>
            </x-card>
        @endrole

        @role('kepala_sekolah')
            @php($sekolah = auth()->user()->sekolahAktif())
            <x-card>
                <p class="text-sm text-ink-500">Sekolah aktif</p>
                @if ($sekolah)
                    <p class="mt-1 text-lg font-semibold text-ink-900">{{ $sekolah->nama }}</p>
                    <p class="text-sm text-ink-500">NPSN {{ $sekolah->npsn }} &middot; {{ $sekolah->dabin }}</p>
                    <a href="{{ route('sekolah.show', $sekolah->id) }}" class="mt-3 inline-block text-sm text-primary-700">Lihat profil sekolah &rarr;</a>
                    @if (auth()->user()->isPltKepalaSekolah())
                        <p class="mt-3 text-xs text-ink-500">
                            Anda Plt Kepala Sekolah di lebih dari satu sekolah — gunakan pemilih sekolah di pojok kanan atas untuk berpindah.
                        </p>
                    @endif
                @else
                    <p class="mt-1 text-sm text-ink-500">Akun ini belum dihubungkan ke sekolah manapun. Hubungi admin.</p>
                @endif
                <p class="mt-4 text-sm text-ink-500">
                    Laporan masuk untuk ditinjau akan tersedia di tahap pengembangan berikutnya.
                </p>
            </x-card>
        @endrole
    </div>
</x-app-layout>
