<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);

        // Hapus file gambar dari storage
        Storage::disk('public')->delete($image->image_path);

        // Hapus record dari database
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
