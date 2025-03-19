<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    public $incrementing = false;

    protected $fillable = [
        'id_surat',
        'dokumen',
        'status',
        'nip',
        'type_surat',
    ];

    public function suratPengantar()
    {
        return $this->hasOne(SuratPengantar::class, 'surat_id_surat', 'id_surat');
    }
}
