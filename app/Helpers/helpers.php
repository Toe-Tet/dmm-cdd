<?php
/**
 * Created by PhpStorm.
 * User: damon
 * Date: 3/5/19
 * Time: 11:13 AM
 */
if (! function_exists('generateCode')) {
    /**
     * @param $permission
     * @return bool
     */
    function generateCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('generateNumber')) {
    /**
     * @param $permission
     * @return bool
     */
    function generateNumber($length = 8) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if ( ! function_exists('reduce_word'))
{
    function reduce_word($word, $limit)
    {
        if(strlen($word) > $limit){
            return substr($word,0,$limit)."...";
        }
        return $word;
    }
}

if ( ! function_exists('admin'))
{
    function admin()
    {
        if(auth('admin')->user()){
            return auth('admin')->user();
        }
        return false;
    }
}

if ( ! function_exists('staff'))
{
    function staff()
    {
        if(auth('staff')->user()){
            return auth('staff')->user();
        }
        return false;
    }
}

if ( ! function_exists('customer'))
{
    function customer()
    {
        if(auth('customer')->user()){
            return auth('customer')->user();
        }
        return false;
    }
}


if ( ! function_exists('auth_customer'))
{
    function auth_customer()
    {
        if(session()->exists('auth-customer')){
            return session()->get('auth-customer');
        }
        return false;
    }
}

if ( ! function_exists('calculatePromotionPrice'))
{

    function calculatePromotionPrice($price, $type, $amount)
    {
        if($type == 'percent'){
            $reduce_amount = ($price / 100) * $amount;
            $new_price = $price - $reduce_amount;
        } else {
            $new_price = $price - $amount;
        }
        return $new_price;
    }
}

if ( ! function_exists('fixedToPercent'))
{

    function fixedToPercent($promotion_price, $price)
    {
        $percent = ($promotion_price/$price) * 100;
        return round($percent);
    }
}

if ( ! function_exists('update_customer'))
{
    function update_customer($customer)
    {
        if(session()->exists('customer-token')){
            session()->forget('auth-customer');
            session()->put('auth-customer', $customer);
        }
        return false;
    }
}

if ( ! function_exists('success_alert'))
{
    function success_alert($title, $text = null)
    {
        \Brian2694\Toastr\Facades\Toastr::success($title, $text);
    }
}

if ( ! function_exists('error_alert'))
{
    function error_alert($title, $text = null)
    {
        \Brian2694\Toastr\Facades\Toastr::error($title, $text);
    }
}

if ( ! function_exists('image_name'))
{
    function image_name($type = null, $sub_type = null)
    {
        return date('Y-m-d_H-i-ss').'_'.$type.'_'.$sub_type.'_'.generateCode();
    }
}

if ( ! function_exists('cutLongString'))
{
    /**
     * @param $type string
     * @param $sub_type string
     * @return string
     */
    function cutLongString($string, $length = 50) {
        return strlen($string) > $length ? substr($string,0,$length)."..." : $string;
    }
}