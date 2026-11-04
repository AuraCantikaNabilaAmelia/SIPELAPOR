<x-guest-layout>
    <h1 class="mb-2 text-lg font-semibold text-ink-900">Lupa kata sandi</h1>
    <div class="mb-4 text-sm text-ink-500">
        Masukkan alamat email akun Anda. Kami akan mengirim tautan untuk mengatur ulang kata sandi.
    </div>

    @if (session('status'))
        <x-alert variant="success" class="mb-4">{{ session('status') }}</x-alert>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <x-input name="email" label="Email" type="email" required autofocus />

        <x-button class="w-full">
            Kirim tautan atur ulang
        </x-button>
    </form>
</x-guest-layout>
