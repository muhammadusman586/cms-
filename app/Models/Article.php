<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 
  
    protected $fillable=[
       'image',
       'postdate',
       'title',
       'content',
       'authorname',
       'authortitle',
       'category' 
    ];
}
