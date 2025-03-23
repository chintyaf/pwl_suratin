<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeteranganLulus extends Model
{
    protected $table = 'surat_keterangan_lulus';

    protected $primaryKey = 'surat_id_surat';

    public $incrementing = false;

    protected $fillable = [
        'surat_id_surat',
        'tanggal_kelulusan',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id_surat', 'id_surat');
    }
}
