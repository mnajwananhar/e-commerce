<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md">
        <h2 class="text-2xl font-bold mb-6">Tambah Produk</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-sm font-medium text-gray-700">Berat (gram)</label>
                <input type="number" name="weight" id="weight"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="images[]" id="images"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" multiple required>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                    Tambah Produk
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
