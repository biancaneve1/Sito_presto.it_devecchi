<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public static function getUrlByFilePath($filePath,$w = NULL, $h = NULL){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $fileName = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$fileName}";
        return Storage::url($file);
    }
    public function getUrl($w = NULL,$h = NULL){
        return self::getUrlByFilePath($this->path,$w,$h);
    }
  
    protected function casts() :array
    {
        return [
            'labels' => 'array'
        ];
    }
}
