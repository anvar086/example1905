<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class Category extends Model
{
    protected $guarded = [];

    public const STORAGE_URL = 'public/category/images';

    public static function uploadPhoto($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_URL,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
