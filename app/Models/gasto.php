<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos';
    protected $primaryKey = 'id_gst';
    protected $fillable = [
        'id_gst',
        'codigo_gst',
        'fecha_gst',
        'valorTotalSinIva_gst',
        'ivaTotal_gst',
        'lugar_gst',
        'descripcion_gst',
        'valorTotalConIva_gst',
        'nombreUsuario_gst',
        'id_usr_gst',
        'updated_at',
        'created_at'        
    ];
    protected $guarded = ['id_gst'];
    public $timestamps = false;
}
