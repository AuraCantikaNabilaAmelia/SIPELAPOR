<x-app-layout :title="$sekolah->nama">
    <x-card class="max-w-2xl" :title="$sekolah->nama">
        <dl class="grid grid-cols-1 gap-x-6 gap-y-3 text-sm sm:grid-cols-2">
            <div>
                <dt class="text-ink-500">NPSN</dt>
                <dd class="text-ink-900">{{ $sekolah->npsn }}</dd>
            </div>
            <div>
                <dt class="text-ink-500">NSS</dt>
                <dd class="text-ink-900">{{ $sekolah->nss ?: '—' }}</dd>
            </div>
            <div>
                <dt class="text-ink-500">Dabin</dt>
                <dd class="text-ink-900">{{ $sekolah->dabin ?: '—' }}</dd>
            </div>
            <div>
                <dt class="text-ink-500">Kecamatan</dt>
                <dd class="text-ink-900">{{ $sekolah->kecamatan }}</dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-ink-500">Alamat</dt>
                <dd class="text-ink-900">{{ $sekolah->alamat ?: '—' }}</dd>
            </div>
        </dl>
    </x-card>
</x-app-layout>
