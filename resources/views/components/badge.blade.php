@props(['status'])

@php
    $labelBawaan = [
        'draft' => 'Draft',
        'diajukan_ke_ks' => 'Diajukan ke KS',
        'dikirim' => 'Dikirim',
        'dikembalikan' => 'Dikembalikan',
        'divalidasi' => 'Divalidasi',
    ][$status] ?? $status;
@endphp

<span {{ $attributes->merge(['class' => 'badge badge-'.$status]) }}>
    {{ $slot->isEmpty() ? $labelBawaan : $slot }}
</span>
