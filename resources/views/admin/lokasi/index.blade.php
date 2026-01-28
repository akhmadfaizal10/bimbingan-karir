<x-layouts.admin>
    <div class="p-6">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Manajemen Lokasi</h1>
        </div>

        {{-- FORM TAMBAH LOKASI --}}
        <form action="{{ route('admin.lokasi.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input
                type="text"
                name="nama_lokasi"
                placeholder="Nama Lokasi"
                class="input input-bordered w-full"
                required
            >
            <button class="btn btn-primary">Tambah</button>
        </form>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lokasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_lokasi }}</td>
                        <td class="flex gap-2">

                            {{-- UPDATE --}}
                            <form action="{{ route('admin.lokasi.update', $item->id) }}" method="POST" class="flex gap-1">
                                @csrf
                                @method('PUT')
                                <input
                                    type="text"
                                    name="nama_lokasi"
                                    value="{{ $item->nama_lokasi }}"
                                    class="input input-sm input-bordered"
                                    required
                                >
                                <button class="btn btn-sm btn-warning">Update</button>
                            </form>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.lokasi.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="btn btn-sm btn-error"
                                    onclick="return confirm('Hapus lokasi ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500">
                            Belum ada data lokasi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.admin>
