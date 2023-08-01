<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'products';

    protected $casts = [
        'estimate_deliver_date' => 'date'
    ];

    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'best_selling',
        'featured',
        'easy_peak_power',
        'mp_option1',
        'mp_option2',
        'best_selling',
        'article_number',
        'thumb_image',
        'type',
        'sale_price',
        'offer_price',
        'sku',
        'product_availability',
        'categories',
        'slug',
        'categories_id',
        'attributes_id',
        'attributesTerms_id',
        'status',
        'subcategory_id',
        'shipping_class',
        'estimate_deliver_date',

    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }
}
