<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title.' — '.config('app.name') : config('app.name', 'SIPELAPOR') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-ink-900 antialiased">
        <div x-data="{ sidebarTerbuka: false }" class="flex min-h-screen bg-paper">
            <!-- Sidebar: desktop -->
            <aside class="hidden w-64 shrink-0 border-r border-border bg-white lg:block">
                @include('layouts.partials.sidebar')
            </aside>

            <!-- Sidebar: mobile (overlay) -->
            <div x-show="sidebarTerbuka" x-cloak class="fixed inset-0 z-40 lg:hidden" style="display: none;">
                <div class="fixed inset-0 bg-ink-900/40" @click="sidebarTerbuka = false"></div>
                <aside class="relative z-10 h-full w-64 bg-white shadow-lg">
                    <button type="button" class="absolute right-3 top-3 rounded p-1.5 text-ink-500 hover:bg-paper-100" @click="sidebarTerbuka = false" aria-label="Tutup menu">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path stroke-linecap="round" d="M5 5l10 10M15 5L5 15" />
                        </svg>
                    </button>
                    @include('layouts.partials.sidebar')
                </aside>
            </div>

            <div class="flex min-h-screen flex-1 flex-col">
                @include('layouts.partials.topbar', ['title' => $title ?? null])

                <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
                    @if (session('status'))
                        <x-alert variant="success" class="mb-6">{{ session('status') }}</x-alert>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
