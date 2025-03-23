<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Status
    const STATUS_LABELS = [
        'pending' => 'Menunggu Persetujuan',
        'rejected' => 'Ditolak',
        'waiting_docs' => 'Disetujui - Menunggu Dokumen',
        'doc_available' => 'Dokumen Sudah Tersedia',
        'completed' => 'Selesai',
    ];

    public function getStatusLabelAttribute()
    {
        return self::STATUS_LABELS[$this->status] ?? 'Unknown';
    }

    public function suratPengantar()
    {
        return $this->hasOne(SuratPengantar::class, 'surat_id_surat', 'id_surat');
    }

    public function suratKeteranganMahasiswaAktif()
    {
        return $this->hasOne(SuratKeteranganMahasiswaAktif::class, 'surat_id_surat', 'id_surat');
    }

    // Mengambil data mahasiswa
    public function getNIP(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
}
