<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'stand_id',
        'nama_usaha',
        'jenis_usaha',
        'kontak',
        'status',
        'catatan_admin',
        'bukti_pembayaran' // untuk alasan penolakan
    ];

    protected $casts = [
        'vendor_id' => 'integer',
        'stand_id' => 'integer',
    ];

    /**
     * Relationship: Booking milik Vendor (User)
     */
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    /**
     * Relationship: Booking milik Stand
     */
    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}
