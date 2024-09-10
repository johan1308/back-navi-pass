<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;

class Credentials extends Model
{
    use HasFactory;

    protected $table = "credentials";

    protected $fillable = [
        'user',
        'password',
        'description',
        'sub_category_id',
    ];

    





    public function sub_category()
    {
        return $this->belongsTo(SubCategories::class);
    }

    public function additional_information()
    {
        return $this->hasMany(Additional_information::class,);
    }
}
