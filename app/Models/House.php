<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Phone;
use App\Models\Bill;

class House extends Model
{
    protected $table = 'House';
    protected $primaryKey = 'hid';
    protected $keyType = 'int';
    public $timestamps = false;

    public function own(): HasMany{
        return $this->hasMany(
        Phone::class,
        'hid',
        'hid'
        );
    }

    public function showBills(): HasManyThrough{
        return $this->hasManyThrough(
            Bill::class, // 目標
            Phone::class, // 經過
            'hid', //phone.hid
            'tel', //bill.tel
            'hid', //house.hid
            'tel' //phone.tel
        );
    }
}
