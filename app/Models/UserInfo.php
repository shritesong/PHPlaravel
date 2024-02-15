<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserInfo extends Model
{
    protected $table = 'UserInfo';
    protected $primaryKey = 'uid';
    protected $keyType = 'string';
    public $timestamps = false;

    public function lives(): BelongsToMany{
        return $this->belongsToMany(
                House::class,
                'live',
                'uid', //live.uid
                'hid'  //live.hid
        );
    }
}

