<section class="space-y-4">
    <header>
        <h2 class="text-base font-semibold text-ink-900">Hapus Akun</h2>
        <p class="mt-1 text-sm text-ink-500">
            Setelah akun dihapus, seluruh data terkait akan dihapus secara permanen. Unduh data yang ingin Anda simpan sebelum melanjutkan.
        </p>
    </header>

    <x-button
        variant="danger"
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Hapus Akun</x-button>

    <x-modal-confirm
        name="confirm-user-deletion"
        title="Yakin ingin menghapus akun Anda?"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <x-slot:description>
            Setelah akun dihapus, seluruh data terkait akan dihapus secara permanen. Masukkan kata sandi untuk mengonfirmasi.
        </x-slot:description>

        <form method="post" action="{{ route('profile.destroy') }}" id="form-hapus-akun">
            @csrf
            @method('delete')

            <x-input name="password" label="Kata sandi" type="password" error-bag="userDeletion" placeholder="Kata sandi" />
        </form>

        <x-slot:footer>
            <x-button variant="secondary" type="button" x-on:click="$dispatch('close')">Batal</x-button>
            <x-button variant="danger" type="submit" form="form-hapus-akun">Hapus Akun</x-button>
        </x-slot:footer>
    </x-modal-confirm>
</section>
