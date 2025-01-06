<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'reason',
        'full_name',
        'phone',
        'address',
        'store_name',
        'nik',
        'ktp_photo',
        'selfie_photo',
        'bank_name',
        'bank_account',
        'bank_account_name',
        'approved_at',
        'approved_by',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
