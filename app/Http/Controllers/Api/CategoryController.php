<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
class CategoryController extends Controller
{
    //获取分类列表接口
    public  function getCategory(){
    	$category= new Category();
    	$list = $category->getCategory();
    }
}
