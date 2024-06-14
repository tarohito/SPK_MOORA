<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianKaryawanM extends Model
{
    protected $table = 'penilaian_karyawan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['karyawan_id', 'k1', 'k2', 'k3', 'k4', 'k5'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getPenilaianKaryawan()
    {
        return $this->db->table('penilaian_karyawan')
        ->select('penilaian_karyawan.*, karyawan.name, sk1.keterangan as k1_ket, sk2.keterangan as k2_ket, sk3.keterangan as k3_ket, sk4.keterangan as k4_ket, sk5.keterangan as k5_ket')
        ->join('karyawan', 'karyawan.id = penilaian_karyawan.karyawan_id')
        ->join('sub_kriteria as sk1', 'sk1.nilai = penilaian_karyawan.k1')
        ->join('sub_kriteria as sk2', 'sk2.nilai = penilaian_karyawan.k2')
        ->join('sub_kriteria as sk3', 'sk3.nilai = penilaian_karyawan.k3')
        ->join('sub_kriteria as sk4', 'sk4.nilai = penilaian_karyawan.k4')
        ->join('sub_kriteria as sk5', 'sk5.nilai = penilaian_karyawan.k5')
        ->get()
            ->getResultArray();
    }

}
