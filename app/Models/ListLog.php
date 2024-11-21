<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLog extends Model
{
    //
    use HasFactory;

    protected $table = 'list_logs';

    protected $fillable = [
        'addon_id',
        'description',
        'date',
        'status',
        'bp_code',
    ];

    public function addOn()
    {
        return $this->belongsTo(AddOnMasterData::class, 'addon_id');
    }

    public function businessPartner()
    {
        return $this->belongsTo(BusinessPartner::class, 'bp_code');
    }
}
