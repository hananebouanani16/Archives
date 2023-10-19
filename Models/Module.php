<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Module extends Model
{    // protected $primaryKey = 'num_module';

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function getDateFormat()
    {
        return 'Y-d-m H:i:s';
    }
    use HasFactory;
    public function permissions()
    {
        return $this->belongsToMany(Objet::class, 'module_objets');
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_modules');
    }
}
