<?php 
namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Http;
use App\Models\admin\AttributeTerm;

class MinMaxPrice{
    
    public function minmaxPrice(array $attribute)
    {
     
      $allMaxprices = [];
      $allMinprices = [];
      $min = 0;
      foreach ($attribute as $id) {
         $groupPrices = AttributeTerm::whereIn('attributes_id', [$id])
         ->pluck('price')
         ->toArray();
         if (!empty($groupPrices)) {
            $maxPrice = max($groupPrices);
            $allMinprices[] = min($groupPrices);
            $allMaxprices[] = $maxPrice;
         }
      }
   
   $max_total = array_sum($allMaxprices);
      if (!empty($allMinprices)) {
         $min = min($allMinprices);
      }
   
      return [
         'sum_of_max_prices' => $max_total,
         'min_price' =>  $min,
     ];
   
    }
    
}

?>