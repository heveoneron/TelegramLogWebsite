<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartner extends Model
{
    //
    use HasFactory;

    protected $table = 'business_partners';
    protected $primaryKey = 'bp_code';

    protected $fillable = [
        'bp_name',
        'address',
        'telegram_token',
    ];

    public function listLogs()
    {
        return $this->hasMany(ListLog::class, 'bp_code');
    }
}
