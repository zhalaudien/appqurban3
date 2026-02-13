<?php

namespace App\Models;

use CodeIgniter\Model;

class PequrbanModel extends Model
{
    protected $table            = 'pequrban';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'cabang_id',
        'nama',
        'jenis_hewan',        // sapi | kambing
        'sumber',       // mandiri | bumm
        'harga',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /* =====================================================
     | QUERY HELPER (UNTUK DASHBOARD)
     ===================================================== */

    public function totalByCabang(int $cabangId): int
    {
        return $this->where('cabang_id', $cabangId)
            ->countAllResults();
    }

    public function totalByJenis(int $cabangId, string $jenis): int
    {
        return $this->where('cabang_id', $cabangId)
            ->where('jenis', $jenis)
            ->countAllResults();
    }

    public function totalBySumber(int $cabangId, string $sumber): int
    {
        return $this->where('cabang_id', $cabangId)
            ->where('sumber', $sumber)
            ->countAllResults();
    }

    public function totalByJenisDanSumber(
        int $cabangId,
        string $jenis,
        string $sumber
    ): int {
        return $this->where('cabang_id', $cabangId)
            ->where('jenis', $jenis)
            ->where('sumber', $sumber)
            ->countAllResults();
    }

    /* =====================================================
     | LIST DATA (CRUD)
     ===================================================== */

    public function getByCabang(int $cabangId)
    {
        return $this->where('cabang_id', $cabangId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
