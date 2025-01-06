<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md">
        <h2 class="text-2xl font-bold mb-6">Daftar Produk</h2>

        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Harga</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Stok</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Gambar</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">Rp
                                {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->stock }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                        alt="Gambar Produk" class="w-20 h-20 object-cover rounded-md shadow-md">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="px-4 py-2 bg-yellow-500 text-white rounded-md shadow-md hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
