<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelVaksin extends Model
{
    protected $table = "vaccine";
    public $timestamps = FALSE;
    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];
    use HasFactory;
}
