<x-guest-layout>
    <h1 class="mb-2 text-lg font-semibold text-ink-900">Verifikasi email</h1>
    <div class="mb-4 text-sm text-ink-500">
        Terima kasih telah mendaftar. Mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirim. Jika belum menerima email, kami akan dengan senang hati mengirim ulang.
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-alert variant="success" class="mb-4">
            Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
        </x-alert>
    @endif

    <div class="flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-button>
                Kirim ulang email verifikasi
            </x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="rounded text-sm text-ink-500 underline hover:text-ink-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                Keluar
            </button>
        </form>
    </div>
</x-guest-layout>
