<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';


    protected $keyType = 'string';

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_role',
        'name_role',
    ];


    public $incrementing = false;
}
