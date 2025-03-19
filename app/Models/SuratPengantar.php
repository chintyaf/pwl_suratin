<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPengantar extends Model
{
    protected $table = 'surat_pengantar_tugas_mata_kuliah';

    protected $primaryKey = 'surat_id_surat';

    public $incrementing = false; 
    
    protected $fillable = [
        'surat_id_surat',
        'ditujukan_kepada', 
        'mata_kuliah', 
        'periode',
        'nama_anggota_kelompok',
        'tujuan',
        'topik',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id_surat', 'id_surat');
    }
}
