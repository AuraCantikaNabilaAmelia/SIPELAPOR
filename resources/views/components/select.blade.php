@props([
    'name',
    'label' => null,
    'options' => [],
    'value' => null,
    'placeholder' => null,
    'errorBag' => 'default',
])

@php
    $id = $attributes->get('id', $name);
    $nilaiTerpilih = $value ?? old($name);
    $pesanError = $errors->getBag($errorBag)->get($name);
@endphp

<div>
    @if ($label)
        <x-input-label :for="$id" :value="$label" />
    @endif

    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control mt-1 block w-full']) }}>
        @if ($placeholder)
            <option value="" @selected(! $nilaiTerpilih)>{{ $placeholder }}</option>
        @endif

        @foreach ($options as $nilaiOpsi => $labelOpsi)
            <option value="{{ $nilaiOpsi }}" @selected((string) $nilaiTerpilih === (string) $nilaiOpsi)>
                {{ $labelOpsi }}
            </option>
        @endforeach
    </select>

    <x-input-error :messages="$pesanError" class="mt-2" />
</div>
