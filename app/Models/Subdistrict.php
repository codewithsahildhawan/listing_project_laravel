<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Subdistrict extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subdistricts';
    protected $primaryKey = 'subdistrict_id';
    public $incrementing = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'subdistrict_name',
        'subdistrict_code',
        'district_id',
        'district_code',
        'status',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }
}
