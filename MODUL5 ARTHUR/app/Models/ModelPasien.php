<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPasien extends Model
{
    protected $table = "patients";
    protected $fillable = [
        'vaccine_id', 'name', 'nik', 'alamat', 'image_ktp', 'no_hp'
    ];
    use HasFactory;
}
