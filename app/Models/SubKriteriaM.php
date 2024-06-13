<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaM extends Model
{
    protected $table            = 'sub_kriteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['kriteria_id', 'keterangan', 'nilai'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function ambilNamaAndKodeDariKriteria()
    {
        return $this->select('sub_kriteria.*, kriteria.nama_kriteria, kriteria.kode_kriteria')
        ->join('kriteria', 'kriteria.id = sub_kriteria.kriteria_id')
        ->findAll();
    }
}
