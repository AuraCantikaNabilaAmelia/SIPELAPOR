<x-app-layout title="Data Sekolah">
    <x-table :headings="['Nama Sekolah', 'NPSN', 'Dabin', 'Alamat']">
        @foreach ($sekolah as $satuSekolah)
            <tr class="hover:bg-paper-100">
                <td class="px-4 py-3">
                    <a href="{{ route('sekolah.show', $satuSekolah->id) }}" class="font-medium text-primary-700 hover:underline">
                        {{ $satuSekolah->nama }}
                    </a>
                </td>
                <td class="px-4 py-3 text-ink-700">{{ $satuSekolah->npsn }}</td>
                <td class="px-4 py-3 text-ink-700">{{ $satuSekolah->dabin }}</td>
                <td class="px-4 py-3 text-ink-500">{{ $satuSekolah->alamat }}</td>
            </tr>
        @endforeach
    </x-table>
</x-app-layout>
