<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const STORAGE_URL = 'public/product/images';

    public static function uploadPhoto($uploadFile){
        $filename = time().$uploadFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            self::STORAGE_URL,
            $uploadFile,
            $filename
        );
        return $filename;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
