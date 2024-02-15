<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'Phone';
    protected $primaryKey = 'tel';
    protected $keyType = 'int';
    public $timestamps = false;
}
