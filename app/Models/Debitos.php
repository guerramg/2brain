<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitos extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'favorecido',
        'vencimento',
        'valor',
        'dpgto',
        'descricao',
        'created_at',
        'updated_at'
    ];
}
