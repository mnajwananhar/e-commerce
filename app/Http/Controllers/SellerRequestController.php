<?php

namespace App\Http\Controllers;

use App\Models\SellerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerRequestController extends Controller
{
    public function index()
    {
        // Halaman pengajuan seller untuk customer
        return view('seller-request.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'store_name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'ktp_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'selfie_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bank_name' => 'required|string|max:255',
            'bank_account' => 'required|string|max:20',
            'bank_account_name' => 'required|string|max:255',
        ]);

        $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
        $selfiePhotoPath = $request->file('selfie_photo')->store('selfie_photos', 'public');

        SellerRequest::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'store_name' => $request->store_name,
            'nik' => $request->nik,
            'ktp_photo' => $ktpPhotoPath,
            'selfie_photo' => $selfiePhotoPath,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'bank_account_name' => $request->bank_account_name,
            'reason' => $request->reason,
        ]);

        return redirect()->route('seller-request.index')->with('success', 'Pengajuan seller berhasil dikirim.');
    }
}
