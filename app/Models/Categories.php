<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    use Searchable;
    public $columnsSearch = ['name'];
    protected $table = "categories";
    protected $fillable = [
        "name"
    ];


    public function sub_category()
    {
        return $this->hasMany(SubCategories::class);
    }
}
