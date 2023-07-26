<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attribute_name',
        'attribute_description',
        'image',
        'attribute_status',
        'attribute_type'         
    ];

    public function attributeTerms()
    {
        return $this->hasMany(AttributeTerm::class, 'attributes_id');
    }
}
