<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    //
    protected $table="jy_article_content";
    public $timestamps=false;
    public function doAdd($data){
    	return self::insert($data);
    }
    
} 
