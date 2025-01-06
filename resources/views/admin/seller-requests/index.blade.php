<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-gray-50">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Daftar Pengajuan Role Seller</h2>

        @if (session('success'))
            <div class="mb-6 p-4 text-green-700 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Toko</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">NIK</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nomor HP</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Alamat</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Foto KTP</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Foto Selfie
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($requests as $request)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $request->full_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $request->store_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $request->nik }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $request->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $request->address }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <a href="{{ asset('storage/' . $request->ktp_photo) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $request->ktp_photo) }}" alt="Foto KTP"
                                        class="w-20 h-20 object-cover rounded-md shadow-md border">
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <a href="{{ asset('storage/' . $request->selfie_photo) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $request->selfie_photo) }}" alt="Foto Selfie"
                                        class="w-20 h-20 object-cover rounded-md shadow-md border">
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <div class="flex space-x-2">
                                    <form method="POST"
                                        action="{{ route('admin.seller-requests.approve', $request->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-md hover:bg-green-700 focus:ring-2 focus:ring-green-500">
                                            Setujui
                                        </button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('admin.seller-requests.reject', $request->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak ada pengajuan yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
