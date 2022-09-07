<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitantes extends Model
{
    use HasFactory;
    protected $fillable = ['cedula', 'equipo_tecno', 'marca', 'modelo', 'observacion', 'razon_v', 'anunciar', 'sitio_r, estatus', 'created_at'];

    protected $primaryKey = 'visitantes_id';
    protected $table = 'visitantes';
    public    $timestamps = true;
}
