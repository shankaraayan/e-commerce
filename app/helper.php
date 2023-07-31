<?php


use App\Models\admin\Category;
use App\Models\admin\Slider;
use App\Models\Shipping;
use App\Models\countryModel;
use App\Models\Country;

   function formatPrice($price)
   {
      $formattedPrice = number_format($price, 2, ',', '.');
      return '€' . $formattedPrice;
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

?>
