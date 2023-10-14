<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
        'description',
        'isActive',
        'isDeleted',
        'note'
    ];
    // protected $appends = [
    //     'logo_url'
    // ];

    public function scopeActive($query)
    {
        return $query->where('isActive', 1);
    }

    public function scopeDeleted($query)
    {
        return $query->where('isDeleted', 1);
    }

    public function scopeNonDeleted($query)
    {
        return $query->where('isDeleted', 0);
    }



    // public function getLogoUrlAttribute()
    // {
    //     if($this->image &&  Storage::disk('public')->exists($this->image)){
    //        return  Storage::disk('public')->url($this->image);
    //     }
    //     return asset('default_logo.png');
    // }

    public function getLogoUrlAttribute($value)
    {

           $logo_url = asset('storage/logo/'.$this->image);


        return $logo_url;
    }


}
