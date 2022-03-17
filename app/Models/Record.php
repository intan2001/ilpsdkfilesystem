<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'perkara',
        'rujukan_fail',
        'rujukan_surat',
        'tarikh_surat',
        'tarikh_terima',
        'daripada',
        'cacatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serahan()
    {
        return $this->belongsTo(Serahan::class);
    }
}
