@props(['name', 'title', 'show' => false, 'maxWidth' => 'md'])

<x-modal :name="$name" :show="$show" :max-width="$maxWidth" {{ $attributes }}>
    <div class="p-6">
        <h2 class="text-base font-semibold text-ink-900">{{ $title }}</h2>

        @isset($description)
            <p class="mt-1 text-sm text-ink-500">{{ $description }}</p>
        @endisset

        @if ($slot->isNotEmpty())
            <div class="mt-4">
                {{ $slot }}
            </div>
        @endif

        @isset($footer)
            <div class="mt-6 flex justify-end gap-3">
                {{ $footer }}
            </div>
        @endisset
    </div>
</x-modal>
