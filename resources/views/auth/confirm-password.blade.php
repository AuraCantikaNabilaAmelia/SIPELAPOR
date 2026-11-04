<x-guest-layout>
    <h1 class="mb-2 text-lg font-semibold text-ink-900">Konfirmasi kata sandi</h1>
    <div class="mb-4 text-sm text-ink-500">
        Ini adalah area aman aplikasi. Konfirmasi kata sandi Anda sebelum melanjutkan.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <x-input name="password" label="Kata sandi" type="password" required autocomplete="current-password" />

        <x-button class="w-full">
            Konfirmasi
        </x-button>
    </form>
</x-guest-layout>
