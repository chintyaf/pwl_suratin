<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSurat extends Model
{
    protected $table = 'type_surat';


    protected $keyType = 'string';

    protected $primaryKey = 'id_type';

    protected $fillable = [
        'id_type',
        'name_type',
    ];

    public $timestamps = false;


    public $incrementing = false;
}
