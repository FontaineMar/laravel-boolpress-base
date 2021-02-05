<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table = 'posts';
  
   protected $fillable = [ 'category_id' , 'author', 'title'];
   
   public function information(){
      return $this->hasOne('App\Information');
   }
   public function category(){
      return $this->belongsTo('App\Categorie');
   }
   public function tags(){
      return $this->belongsToMany('App\Tag', 'post_tag','post_id','tag_id');
   }
}
