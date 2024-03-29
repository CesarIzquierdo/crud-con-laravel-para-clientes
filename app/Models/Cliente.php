<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='clientes';
    protected $primarykey = 'id';
    protected $fillabel = ['nombre', 'telefono', 'correo', 'imagen'];
    protected $guarded=[];
    public $timestamps = false;
}
