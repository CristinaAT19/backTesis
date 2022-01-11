<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfiles_sub_areas';
    protected $primaryKey = 'perfil_Id';
    public $timestamps = false;
    protected $fillable = [
        'perfil_nombre',
        'perfil_Id_Sub_Area_fk'
    ];
}
