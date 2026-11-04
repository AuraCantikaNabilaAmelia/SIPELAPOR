@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'errorBag' => 'default',
    'hint' => null,
])

@php
    $id = $attributes->get('id', $name);
    $nilai = $value ?? old($name);
    $pesanError = $errors->getBag($errorBag)->get($name);
@endphp

<div>
    @if ($label)
        <x-input-label :for="$id" :value="$label" />
    @endif

    <x-text-input
        :id="$id"
        :name="$name"
        :type="$type"
        :value="$nilai"
        {{ $attributes->merge(['class' => 'mt-1 block w-full']) }}
    />

    @if ($hint)
        <p class="mt-1 text-xs text-ink-500">{{ $hint }}</p>
    @endif

    <x-input-error :messages="$pesanError" class="mt-2" />
</div>
