<?php


use App\Models\admin\Category;
use App\Models\admin\Slider;
use App\Models\Shipping;
use App\Models\countryModel;
use App\Models\Country;
use App\Models\Wishlist;

   function formatPrice($price)
   {
      $formattedPrice = number_format($price, 2, ',', '.');
      return '€' . $formattedPrice;
   }

   function unforamtPrice($price){
      $price = str_replace('€','',$price);
      $price = str_replace(',','.',$price);

      // $unformattedPrice = str_replace('.', '', str_replace(',', '.', $price));
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

?>
