<?php
  
namespace App\Models;

use App\Models\admin\ProductImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;
  
class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];

    protected $table = 'products';


    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }
    
    public function categories(){
        return $this->belongsTo(Category::class, 'categories');
    }
}
