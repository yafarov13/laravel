<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table="categories";

    protected $fillable=['title', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query) {
        return $query->where('is_active', true) ;   
    }

    //protected $guarded = ['id']; от обратного - не обновлять только ID

    //Relations 
    public function news(): hasMany 
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }    
    
}
