<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';


    protected $keyType = 'string';

    protected $primaryKey = 'id_prodi';

    protected $fillable = [
        'id_prodi',
        'name_prodi',
    ];


    public $incrementing = false;
}
