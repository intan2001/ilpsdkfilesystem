<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_serahan'
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}