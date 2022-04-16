<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table="categories";

    public function getCategories(): array
    {
       return DB::table($this->table)->select("id", "title", "description")->get()->toArray();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }

    public function getCategoryByTitle($title): mixed
    {
        return DB::table($this->table)->where("title", "=", $title)->get()->toArray();
    }
}
