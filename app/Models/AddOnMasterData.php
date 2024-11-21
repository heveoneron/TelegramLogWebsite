<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnMasterData extends Model
{
    //
    use HasFactory;

    protected $table = 'addon_master_data';
    protected $primaryKey = 'addon_id';

    protected $fillable = [
        'addon_name',
    ];

    public function listLogs()
    {
        return $this->hasMany(ListLog::class, 'addon_id');
    }
}
