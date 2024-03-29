<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','published_at','category_id'];

    /**
     * delete post image from storage
     *
     * @return void
     */

    public function deleteImage(){

        Storage::delete($this->image);

    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @param $tagId
     * @return bool
     * check if post has tag
     */

    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }
}
