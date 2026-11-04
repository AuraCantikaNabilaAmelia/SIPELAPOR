<x-guest-layout>
    <h1 class="mb-6 text-lg font-semibold text-ink-900">Atur ulang kata sandi</h1>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-input name="email" label="Email" type="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />

        <x-input name="password" label="Kata sandi baru" type="password" required autocomplete="new-password" />

        <x-input name="password_confirmation" label="Konfirmasi kata sandi baru" type="password" required autocomplete="new-password" />

        <x-button class="w-full">
            Atur ulang kata sandi
        </x-button>
    </form>
</x-guest-layout>
