<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPELAPOR') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-ink-900 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center bg-paper px-6 py-10">
            <div class="mb-8">
                <x-application-logo subtitle />
            </div>

            <div class="w-full max-w-sm card px-7 py-8">
                {{ $slot }}
            </div>

            <p class="mt-8 text-center text-xs text-ink-500">
                Sistem Pelaporan Bulanan Sekolah &amp; Rekap Mekanisme<br>
                Korwilcam Bidang Pendidikan Kecamatan Gunungwungkal, Kabupaten Pati
            </p>
        </div>
    </body>
</html>
