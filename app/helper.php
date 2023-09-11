<?php

use App\Models\admin\Address;
use App\Models\admin\Category;
use App\Models\admin\Slider;
use App\Models\admin\AttributeTerm;
use App\Models\admin\PaymentGatway;
use App\Models\admin\Product;
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
      $headerCategories = Category::where('header',1)->orderBy('serial','ASC')->get();
      return $headerCategories;
   }

   function categories()   
   {
      $categories = Category::orderBy('serial','ASC')->get();
      return $categories;
   }

   function SingleCategory($id)
   {
      $categories = Category::where('id',$id)->pluck('name')->first();
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

 function getUserDefaultAddress()
 {
   return Address::where('user_id',auth()->user()->id)->first();
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

 function paymentDetail($name)
 {
    $PaymentGatway = PaymentGatway::where('status','1')->where('app_name',$name)->first();
    return $PaymentGatway;
 }


  function min_max_price($productId){
   $product  = Product::find($productId);
   $attributeIDs = ($product->attributes_id);
   
   $variations = explode(',', $attributeIDs);
   $options = explode(',',$product->attributesTerms_id);
   $attribute = [];
   foreach ($variations as $variation) {
    $attributeTerms = AttributeTerm::where('attributes_id', $variation)->pluck('id')->toArray();
    foreach($attributeTerms as $terms){
        if(in_array($terms,$options)){
            $attribute[$variation][] = $terms;
        }
    }   
}
$attributes =  ($attribute);
$allMaxPrices = [];
$total = 0;
 foreach ($attributes as $key => $attribute) {
    // dd($key);
    $groupPrices = AttributeTerm::where('attributes_id', $key)->whereIn('id',$attribute)
       ->pluck('price')
       ->toArray();
    if (!empty($groupPrices)) {
       $maxPrice = max($groupPrices);
       $total += $maxPrice;
    }
}  
 return  $total;

}


 function working_days($days){
   $datee = date('Y-m-d');
   $date = \Carbon\Carbon::createFromFormat('Y-m-d', $datee);
   return $date->addWeekdays($days)->format('d-m-Y');
}
 


?>
