<x-guest-layout>
    <h1 class="mb-6 text-lg font-semibold text-ink-900">Masuk ke akun Anda</h1>

    @if (session('status'))
        <x-alert variant="success" class="mb-4">{{ session('status') }}</x-alert>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <x-input name="email" label="Email" type="email" required autofocus autocomplete="username" />

        <x-input name="password" label="Kata sandi" type="password" required autocomplete="current-password" />

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-border text-primary-500 shadow-sm focus:ring-primary-500" name="remember">
                <span class="ms-2 text-sm text-ink-700">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-ink-500 underline hover:text-ink-900" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif
        </div>

        <x-button class="w-full">
            Masuk
        </x-button>
    </form>
</x-guest-layout>
