@props(['headings' => []])

<div {{ $attributes->merge(['class' => 'card overflow-x-auto']) }}>
    <table class="w-full text-left text-sm">
        @if (count($headings))
            <thead class="border-b border-border bg-paper-100 text-ink-500">
                <tr>
                    @foreach ($headings as $judulKolom)
                        <th class="px-4 py-3 font-medium">{{ $judulKolom }}</th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody class="divide-y divide-border">
            {{ $slot }}
        </tbody>
    </table>
</div>
