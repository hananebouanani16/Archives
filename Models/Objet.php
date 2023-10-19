<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objet extends Model
{
    //protected $primaryKey = 'NUM_OBJECT';
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s';
    }
    use HasFactory;

    public function role()
    {
        return $this->belongsToMany(Module::class, 'module_objets');
    }
}
