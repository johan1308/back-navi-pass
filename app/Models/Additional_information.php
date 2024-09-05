<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional_information extends Model
{
    use HasFactory;

    protected $table = "additional_informations";
    protected $fillable = [
        "title",
        "values",
        "credential_id",
    ];


    public function sub_category()
    {
        return $this->belongsTo(Credentials::class);
    }
}
