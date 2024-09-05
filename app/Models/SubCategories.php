<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Credentials;

class SubCategories extends Model
{
    use HasFactory;

    public function credential()
    {
        return $this->hasMany(Credentials::class);
    }
}
