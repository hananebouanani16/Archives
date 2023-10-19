<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s';
    }
    protected $primaryKey = 'id_groupe';
    use HasFactory;
    protected $guarded = [];

    public function users()
    {


        return $this->belongsToMany(User::class, 'Group_users');
    }
    public function role()
    {
        return $this->belongsToMany(Module::class, 'groupe_modules');
    }
    public function perm()
    {
        return $this->belongsToMany(Objet::class, 'groupe_objects');
    }
}
