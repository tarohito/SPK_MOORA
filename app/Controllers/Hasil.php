<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianKaryawanM;
use App\Models\SubKriteriaM;
use App\Models\HasilModel;

class Hasil extends BaseController
{
    public function index()
    {
        $uri = service('uri');

        $PenilaianKaryawanM = new PenilaianKaryawanM();
        $karyawanModel = new KaryawanModel();
        $subkriteriaModel = new SubKriteriaM();
        $kriteriaModel = new KriteriaModel();

        $kriteria = $kriteriaModel->findAll();

        $builder = $PenilaianKaryawanM
            ->select('penilaian_karyawan.*, karyawan.name')
            ->join('karyawan', 'karyawan.id = penilaian_karyawan.karyawan_id');

        foreach ($kriteria as $index => $k) {
            $alias = 'sk' . ($index + 1);
            $column = 'k' . ($index + 1);
            $builder = $builder->join("sub_kriteria as $alias", "$alias.nilai = penilaian_karyawan.$column AND $alias.kriteria_id = {$k['id']}", 'left')
                ->select("$alias.keterangan as {$column}_ket");
        }

        $data['penilaian_karyawan'] = $builder->findAll();
        $data['karyawan'] = $karyawanModel->orderBy('name', 'ASC')->findAll();
        $data['sub_kriteria'] = $subkriteriaModel->ambilNamaAndKodeDariKriteria();
        $data['kriteria'] = $kriteria;

        // HITUNG AKAR UNTUK K1 - K5
        $akar_k1 = $this->formatAngka($this->hitung_akar_k1($data['penilaian_karyawan'], 'k1'));
        $akar_k2 = $this->formatAngka($this->hitung_akar_k1($data['penilaian_karyawan'], 'k2'));
        $akar_k3 = $this->formatAngka($this->hitung_akar_k1($data['penilaian_karyawan'], 'k3'));
        $akar_k4 = $this->formatAngka($this->hitung_akar_k1($data['penilaian_karyawan'], 'k4'));
        $akar_k5 = $this->formatAngka($this->hitung_akar_k5($data['penilaian_karyawan'], 'k5'));

        $data['akar_k1'] = $akar_k1;
        $data['akar_k2'] = $akar_k2;
        $data['akar_k3'] = $akar_k3;
        $data['akar_k4'] = $akar_k4;
        $data['akar_k5'] = $akar_k5;

        // Mengambil bobot untuk setiap kriteria dan menyimpannya dalam array $data
        foreach ($kriteria as $k) {
            $kode_kriteria = $k['kode_kriteria'];
            $data['bobot_' . $kode_kriteria] = $this->getBobotKriteria($kriteria, $kode_kriteria);
        }

        helper(['format']);
        return view('hasil', $data);
    }


    // Fungsi untuk menghitung akar dari jumlah kuadrat nilai kolom 'k1'
    private function hitung_akar_k1($penilaian_karyawan, $kolom)
    {
        $jumlah_kuadrat = 0;

        foreach ($penilaian_karyawan as $nilai) {
            $nilai_k = $nilai[$kolom];
            $kuadrat_k = $nilai_k * $nilai_k;
            $jumlah_kuadrat += $kuadrat_k;
        }

        $akar_jumlah_kuadrat1 = sqrt($jumlah_kuadrat);
        $akar_jumlah_kuadrat = $this->formatAngka($akar_jumlah_kuadrat1);
        return $akar_jumlah_kuadrat;
    }

    private function hitung_akar_k5($penilaian_karyawan, $kolom)
    {
        $k5_values = array_column($penilaian_karyawan, $kolom);
        $jumlah_skor = 0;

        foreach ($k5_values as $k5_value) {
            if ($k5_value > 10) {
                $skor = 5;
            } elseif ($k5_value >= 6 && $k5_value <= 10) {
                $skor = 3;
            } else {
                $skor = 1;
            }

            // Menghitung kuadrat dari skor yang telah ditentukan
            $kuadrat_k5 = $skor * $skor;
            $jumlah_skor += $kuadrat_k5;
        }

        // Menghitung akar dari jumlah kuadrat dan mengembalikan nilai yang diformat
        $akar_jumlah_kuadrat5 = sqrt($jumlah_skor);
        $akar_jumlah_kuadrat = $this->formatAngka($akar_jumlah_kuadrat5);
        return $akar_jumlah_kuadrat;
    }




    private function getBobotKriteria($kriteria, $kode_kriteria)
    {
        foreach ($kriteria as $k) {
            if ($k['kode_kriteria'] === $kode_kriteria) {
                return $k['bobot'];
            }
        }
        return 0; // Mengembalikan 0 jika tidak ditemukan kode kriteria yang sesuai
    }

    function formatAngka($nilai)
    {
        $angka_sebelum_koma = floor($nilai); // Ambil angka sebelum koma
        $angka_dibelakang_koma = $nilai - $angka_sebelum_koma; // Ambil angka dibelakang koma

        // Tentukan jumlah digit dibelakang koma
        $jumlah_digit_dibelakang_koma = 9; // Default untuk 1 angka sebelum koma
        if ($angka_sebelum_koma >= 10) {
            $jumlah_digit_dibelakang_koma = 8; // Jika 2 angka sebelum koma
        }

        // Format angka dengan jumlah digit yang sesuai
        return number_format($nilai, $jumlah_digit_dibelakang_koma, '.', '');
    }

}
