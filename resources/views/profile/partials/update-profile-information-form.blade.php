<section>
    <header>
        <h2 class="text-base font-semibold text-ink-900">Informasi Profil</h2>
        <p class="mt-1 text-sm text-ink-500">Perbarui nama dan alamat email akun Anda.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <x-input name="name" label="Nama" :value="old('name', $user->name)" required autofocus autocomplete="name" />

        <div>
            <x-input name="email" label="Email" type="email" :value="old('email', $user->email)" required autocomplete="username" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-ink-700">
                        Alamat email Anda belum diverifikasi.
                        <button form="send-verification" class="rounded text-sm text-ink-700 underline hover:text-ink-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            Kirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <x-alert variant="success" class="mt-2">
                            Tautan verifikasi baru telah dikirim ke email Anda.
                        </x-alert>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-button>Simpan</x-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-ink-500"
                >Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
