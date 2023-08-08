<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTerm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attribute_term_name',
        'attributes_id',
        'price',
        'attribute_term_description',
        'image',
        'attribute_term_kWh_name',
        'supported_wh',
        'component_description',
        'component_priority',
        'sku',
        'quantity',
    ];

    protected $table = 'attribute_terms';


    public function attribute()
    {
        return $this->hasMany(Attribute::class,'attributes_id');
    }
}
