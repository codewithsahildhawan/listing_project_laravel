<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $incrementing = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'category_title',
        'cat_short_desc',
        'cat_long_desc',
        'cat_image',
        'parent_id',
        'order_by',
        'meta_title',
        'meta_short_desc',
        'meta_desc',
        'meta_keywords',
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
