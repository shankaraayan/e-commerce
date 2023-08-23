<?php

use App\Models\admin\Category;
use App\Models\admin\Slider;
use App\Models\admin\AttributeTerm;
use App\Models\admin\PaymentGatway;
use App\Models\Shipping;
use App\Models\countryModel;
use App\Models\Country;
use App\Models\Wishlist;
use Carbon\Carbon;

   function formatPrice($price)
   {
      $formattedPrice = number_format($price, 2, ',', '.');
      return '€' . $formattedPrice;
   }

   function unforamtPrice($price){
      $price = str_replace('€','',$price);
      $price = str_replace(',','.',$price);
      $price = floor(floatval($price));
      return  $price;
   }

   function headerCategories()
   {
      $headerCategories = Category::where('header',1)->get();
      return $headerCategories;
   }

   function categories()
   {
      $categories = Category::get();
      return $categories;
   }

   function shippingClass()
   {
      $shippingClass = Shipping::get();
      return $shippingClass;
   }

   function shippingCountry()
   {
      $shippingClass = countryModel::get();
      return $shippingClass;
   }

   function sliders(){
      $sliders = Slider::get();
      return $sliders;
   }
  
   function globalBanner(){
      $sliders = Slider::where('global_banner',1)->get();
      return $sliders;
   }

   function country(){
    $country = Country::get();
    return $country;
 }

 function getTaxCountry($id)
 {
    $result = Country::where('id',$id)->first();
    return $result ;
 }

 function getShippingPrice($id)
 {
    $shippingClass = countryModel::where('id',$id)->first();
    return $shippingClass;
 }

 function getCountrybyShippingCountry($id)
 {
    $result = getShippingPrice($id);
    return getTaxCountry($result['country']);
 }

 function wishlist()
 {
    $wishlist = Wishlist::get();
    return $wishlist;
 }

 function paypalDetail()
 {
    $PaymentGatway = PaymentGatway::where('status','1')->first();
    return $PaymentGatway;
 }


 function minmaxPrice(array $attribute)
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


 function working_days($days){
   $datee = date('Y-m-d');
   $date = \Carbon\Carbon::createFromFormat('Y-m-d', $datee);
   return $date->addWeekdays($days)->format('d-m-Y');
}
 


?>
