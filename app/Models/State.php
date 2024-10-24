<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states'; // Define the table name if it's not the plural of the model name
    protected $primaryKey = 'state_id'; // Custom primary key

    protected $fillable = [
        'state_name',
        'state_code',
        'status', 
        'deleted',
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
}
