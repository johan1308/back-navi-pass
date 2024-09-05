<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Credentials;

class SubCategories extends Model
{
    use HasFactory;

    protected $table = "sub_categories";
    protected $fillable = [
        "name",
        "category_id",
    ];

    public function credential()
    {
        return $this->hasMany(Credentials::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
