<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanHasilStudi extends Model
{
    protected $table = 'surat_laporan_hasil_studi';

    protected $primaryKey = 'surat_id_surat';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'surat_id_surat',
        'keperluan_pembuatan',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id_surat', 'id_surat');
    }


}
