<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-bold mb-4">Ajukan Role Seller</h2>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('seller-request.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="full_name" name="full_name" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Nomor HP -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input id="phone" name="phone" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="address" name="address" rows="3" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Nama Toko -->
            <div class="mb-4">
                <label for="store_name" class="block text-sm font-medium text-gray-700">Nama Toko</label>
                <input id="store_name" name="store_name" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- NIK -->
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input id="nik" name="nik" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Foto KTP -->
            <div class="mb-4">
                <label for="ktp_photo" class="block text-sm font-medium text-gray-700">Foto KTP</label>
                <input id="ktp_photo" name="ktp_photo" type="file" accept=\"image/*\" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Foto Selfie -->
            <div class="mb-4">
                <label for="selfie_photo" class="block text-sm font-medium text-gray-700">Foto Selfie</label>
                <input id="selfie_photo" name="selfie_photo" type="file" accept=\"image/*\" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Informasi Bank -->
            <h3 class="text-lg font-semibold mt-6">Informasi Bank</h3>
            <div class="mb-4">
                <label for="bank_name" class="block text-sm font-medium text-gray-700">Nama Bank</label>
                <input id="bank_name" name="bank_name" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="bank_account" class="block text-sm font-medium text-gray-700">Nomor Rekening</label>
                <input id="bank_account" name="bank_account" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="bank_account_name" class="block text-sm font-medium text-gray-700">Nama Pemilik
                    Rekening</label>
                <input id="bank_account_name" name="bank_account_name" type="text" required
                    class="block w-full mt-1 p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Kirim Pengajuan
            </button>
        </form>
    </div>
</x-app-layout>
