<?php
use App\Models\Category;

if(!function_exists('category')){
    function category(){
        $categories = Category::all();
        
        return $categories;
    }
}

?>