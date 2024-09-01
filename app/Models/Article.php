<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model 
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title','description','price','category_id','user_id','titleEng','titleDe','descriptionEng','descriptionDe'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

  public function setAccepted($value){
    $this->is_accepted = $value;
    $this->save();
    return true;
  }

  public static function toBeRevisedCount(){
    return Article::where('is_accepted', null)->count();
  }

  public function toSearchableArray()
  {
    return [
      'id'=>$this->id,
      'title'=>$this->title,
      'description'=>$this->description,
      'category'=>$this->category
    ];
  }

  public function images(){
    return $this->hasMany(Image::class);
  }
}
