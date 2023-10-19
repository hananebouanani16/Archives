<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['title', 'type', 'filter', 'creation_date', 'file_path'];
}
