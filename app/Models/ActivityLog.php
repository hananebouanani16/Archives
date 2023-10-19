<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s';
    }
    protected $table = 'activity_logs';
    protected $fillable = [
        'user_id',
        'activity',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
