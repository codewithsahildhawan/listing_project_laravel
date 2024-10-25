<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'states';
    protected $primaryKey = 'state_id';
    protected $keyType = 'int';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'state_name',
        'state_code',
        'state_ut',
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

    public function districts()
    {
        return $this->hasMany(District::class, 'state_id');
    }
}
