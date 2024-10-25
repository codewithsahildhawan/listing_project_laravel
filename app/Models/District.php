<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'districts'; // Define the table name if it's not the plural of the model name
    protected $primaryKey = 'district_id'; // Custom primary key
    public $incrementing = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'district_name',
        'state_id',
        'state_code',
        'district_code',
        'status',
    ];

    public $timestamps = true; // Enable timestamps

    // Optionally, you can override the save method if you want to control when updated_at is set
    public function save(array $options = [])
    {
        if ($this->exists && !$this->isDirty()) {
            // Don't update the updated_at timestamp if the state hasn't changed
            $this->updated_at = null;
        }
        return parent::save($options);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id'); // Assuming 'state_id' is the foreign key
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class, 'district_id');
    }
}
