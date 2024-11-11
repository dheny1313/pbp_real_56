<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mnote extends Model
{
    use HasFactory;
    protected $table = 'mnotes';
    protected $fillable = ["judul", "deskripsi", "status"];
}
