<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticky extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'sticky',
        'created_at',
        'updated_at'
    ];
}
