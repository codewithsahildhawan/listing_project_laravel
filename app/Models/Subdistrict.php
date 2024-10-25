<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdistrict_name',
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
