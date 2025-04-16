<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';


    protected $keyType = 'string';

    protected $primaryKey = 'kode_mk';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'id_prodi'
    ];

    public $timestamps = false;

    public $incrementing = false;

    public function getProdi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi', 'id_prodi');
    }

    public function getNamaFormattedAttribute()
    {
        return $this->nama_mk . ' - ' . $this->kode_mk;
    }

}
