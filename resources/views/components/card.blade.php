@props(['title' => null, 'padded' => true])

<div {{ $attributes->merge(['class' => 'card '.($padded ? 'p-6' : '')]) }}>
    @if ($title)
        <h2 class="mb-4 text-base font-semibold text-ink-900">{{ $title }}</h2>
    @endif

    {{ $slot }}
</div>
