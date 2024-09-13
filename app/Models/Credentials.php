<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Credentials extends Model
{
    use HasFactory;
    use Searchable;


    protected $table = "credentials";
    protected $fillable = [
        'user',
        'password',
        'description',
        'sub_category_id',
    ];

    public $columnsSearch = ['user', 'description'];


    public function sub_category()
    {
        return $this->belongsTo(SubCategories::class);
    }

    public function additional_information()
    {
        return $this->hasMany(Additional_information::class, 'credential_id', 'id');
    }
}
