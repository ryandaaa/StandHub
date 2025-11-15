<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stand extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_stand',
        'lokasi',
        'ukuran',
        'harga',
        'fasilitas',
        'status',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];

    /**
     * Relationship: Stand memiliki banyak Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Booking aktif (yang statusnya approved)
     */
    public function activeBooking()
    {
        return $this->hasOne(Booking::class)->where('status', 'approved');
    }
}
