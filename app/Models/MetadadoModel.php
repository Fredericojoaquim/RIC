<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetadadoModel extends Model
{
    use HasFactory;
    protected $table='metadados';
    protected $guarded=[];
}
