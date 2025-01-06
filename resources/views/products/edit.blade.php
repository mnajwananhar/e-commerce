<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-sm font-medium text-gray-700">Berat (gram)</label>
                <input type="number" name="weight" id="weight" value="{{ $product->weight }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Gambar Baru (Opsional)</label>
                <input type="file" name="images[]" id="images"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" multiple>
                <p class="text-sm text-gray-500 mt-2">Upload gambar baru jika ingin mengganti gambar.</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                <div class="flex space-x-4 mt-2">
                    @foreach ($product->images as $image)
                        <div>
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Produk"
                                class="w-20 h-20 object-cover rounded-md shadow-md">
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                    Update Produk
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
