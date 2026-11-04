<section>
    <header>
        <h2 class="text-base font-semibold text-ink-900">Ubah Kata Sandi</h2>
        <p class="mt-1 text-sm text-ink-500">Gunakan kata sandi yang panjang dan acak agar akun tetap aman.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('put')

        <x-input id="update_password_current_password" name="current_password" label="Kata sandi saat ini" type="password" error-bag="updatePassword" autocomplete="current-password" />

        <x-input id="update_password_password" name="password" label="Kata sandi baru" type="password" error-bag="updatePassword" autocomplete="new-password" />

        <x-input id="update_password_password_confirmation" name="password_confirmation" label="Konfirmasi kata sandi baru" type="password" error-bag="updatePassword" autocomplete="new-password" />

        <div class="flex items-center gap-4">
            <x-button>Simpan</x-button>

            @if (session('status') === 'password-updated')
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
