@php
    $user = auth()->user();
    $daftarSekolahUser = $user->sekolahList();
    $tampilkanPemilihSekolah = $user->hasRole('kepala_sekolah') && $daftarSekolahUser->count() > 1;
@endphp

<header class="flex h-16 items-center justify-between gap-4 border-b border-border bg-white px-4 lg:px-8">
    <div class="flex items-center gap-3">
        <button type="button" class="rounded p-2 text-ink-500 hover:bg-paper-100 lg:hidden" @click="sidebarTerbuka = true" aria-label="Buka menu">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6">
                <path stroke-linecap="round" d="M3 5h14M3 10h14M3 15h14" />
            </svg>
        </button>
        <h1 class="text-base font-semibold text-ink-900">{{ $title ?? 'Dasbor' }}</h1>
    </div>

    <div class="flex items-center gap-3">
        @if ($tampilkanPemilihSekolah)
            <form method="POST" action="{{ route('sekolah-aktif.update') }}" class="hidden sm:block">
                @csrf
                @method('PUT')
                <label for="sekolah_id" class="sr-only">Sekolah aktif</label>
                <select id="sekolah_id" name="sekolah_id" onchange="this.form.submit()" class="form-control">
                    @foreach ($daftarSekolahUser as $opsiSekolah)
                        <option value="{{ $opsiSekolah->id }}" @selected(optional($user->sekolahAktif())->id === $opsiSekolah->id)>
                            {{ $opsiSekolah->nama }}
                        </option>
                    @endforeach
                </select>
            </form>
        @endif

        <x-dropdown align="right" width="56">
            <x-slot name="trigger">
                <button class="flex items-center gap-2 rounded px-2 py-1.5 text-sm text-ink-700 hover:bg-paper-100">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-50 text-xs font-semibold text-primary-700">
                        {{ Str::of($user->name)->substr(0, 1) }}
                    </span>
                    <span class="hidden text-left sm:block">
                        <span class="block text-sm font-medium leading-tight text-ink-900">{{ $user->name }}</span>
                        <span class="block text-xs leading-tight text-ink-500">{{ \Illuminate\Support\Str::headline($user->getRoleNames()->first() ?? '-') }}</span>
                    </span>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">Profil Saya</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        Keluar
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
