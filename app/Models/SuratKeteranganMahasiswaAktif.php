<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeteranganMahasiswaAktif extends Model
{
    protected $table = 'surat_keterangan_mahasiswa_aktif';

    protected $primaryKey = 'surat_id_surat';

    public $incrementing = false;

    protected $fillable = [
        'surat_id_surat',
        'periode',
        'alamat_bandung',
        'keperluan_pengajuan',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id_surat', 'id_surat');
    }
}
