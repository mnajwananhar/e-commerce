<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-bold mb-4">Daftar Pengajuan Role Seller</h2>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Toko</th>
                    <th class="border border-gray-300 px-4 py-2">NIK</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->full_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->store_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $request->nik }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span
                                class="px-2 py-1 text-sm font-semibold rounded-md {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-600' : ($request->status === 'approved' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600') }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form method="POST" action="{{ route('admin.seller-requests.approve', $request->id) }}"
                                class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none">Setujui</button>
                            </form>
                            <form method="POST" action="{{ route('admin.seller-requests.reject', $request->id) }}"
                                class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
