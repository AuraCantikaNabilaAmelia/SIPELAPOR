<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman tidak ditemukan — {{ config('app.name', 'SIPELAPOR') }}</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans text-ink-900 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center bg-paper px-6 py-10">
            <div class="mb-8">
                <x-application-logo />
            </div>
            <x-card class="w-full max-w-sm text-center">
                <p class="text-sm font-medium text-ink-500">404 — Tidak ditemukan</p>
                <h1 class="mt-2 text-lg font-semibold text-ink-900">Halaman yang Anda cari tidak ada</h1>
                <p class="mt-2 text-sm text-ink-500">
                    Periksa kembali tautannya, atau kembali ke dasbor.
                </p>
                <x-button href="{{ route('dashboard') }}" class="mt-6 w-full">Kembali ke dasbor</x-button>
            </x-card>
        </div>
    </body>
</html>
