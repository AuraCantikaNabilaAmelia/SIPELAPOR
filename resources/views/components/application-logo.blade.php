@props(['subtitle' => false])

<div {{ $attributes->merge(['class' => 'flex items-center gap-2.5']) }}>
    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded border border-primary-300 bg-primary-50 text-sm font-semibold text-primary-700">
        SP
    </span>
    <span class="leading-tight">
        <span class="block text-lg font-semibold tracking-tight text-ink-900">SIPELAPOR</span>
        @if ($subtitle)
            <span class="block text-xs text-ink-500">Korwilcam Bidang Pendidikan Gunungwungkal</span>
        @endif
    </span>
</div>
