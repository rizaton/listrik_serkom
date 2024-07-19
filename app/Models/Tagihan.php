<?php

namespace App\Models;

use CodeIgniter\Model;

class Tagihan extends Model
{
    protected $table            = 'tagihan';
    protected $primaryKey       = 'id_tagihan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_tagihan', 'id_pelanggan', 'bulan', 'tahun', 'jumlah_meter', 'id_penggunaan', 'id_status'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_pelanggan' => 'required|numeric|max_length[6]',
        'bulan' => 'required|numeric|max_length[2]',
        'tahun' => 'required|numeric|max_length[4]',
        'jumlah_meter' => 'required|numeric|max_length[20]',
        'status' => 'required|max_length[1]',
        'id_penggunaan' => 'required|numeric|max_length[6]',
        'id_status' => 'required|numeric|max_length[6]',
    ];
    protected $validationMessages   = [
        'id_pelanggan' => [
            'required' => 'ID Pelanggan harus diisi',
            'numeric' => 'ID Pelanggan harus berupa angka',
            'max_length' => 'ID Pelanggan maksimal 6 karakter',
        ],
        'bulan' => [
            'required' => 'Bulan harus diisi',
            'numeric' => 'Bulan harus berupa angka',
            'max_length' => 'Bulan maksimal 2 karakter',
        ],
        'tahun' => [
            'required' => 'Tahun harus diisi',
            'numeric' => 'Tahun harus berupa angka',
            'max_length' => 'Tahun maksimal 4 karakter',
        ],
        'jumlah_meter' => [
            'required' => 'Jumlah Meter harus diisi',
            'numeric' => 'Jumlah Meter harus berupa angka',
            'max_length' => 'Jumlah Meter maksimal 20 karakter',
        ],
        'status' => [
            'required' => 'Status harus diisi',
            'max_length' => 'Status maksimal 1 karakter',
        ],
        'id_penggunaan' => [
            'required' => 'ID Penggunaan harus diisi',
            'numeric' => 'ID Penggunaan harus berupa angka',
            'max_length' => 'ID Penggunaan maksimal 6 karakter',
        ],
        'id_status' => [
            'required' => 'ID Status harus diisi',
            'numeric' => 'ID Status harus berupa angka',
            'max_length' => 'ID Status maksimal 6 karakter',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['tambah_pembayaran'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private function tambah_pembayaran(array $data)
    {
        $tb_pembayaran = new Pembayaran();
        $tb_tarif = new Pelanggan();
        $tb_tarif = $tb_tarif
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif')
            ->where('id_pelanggan', $data['id_pelanggan'])
            ->select('tarifperkwh')
            ->findAll() ?? '';
        $subtotal_bayar = $data['jumlah_meter'] * $tb_tarif;
        $biaya_admin = $subtotal_bayar * 0.01;
        $total_bayar = $subtotal_bayar + $biaya_admin;
        $data_pembayaran = [
            'tanggal_pembayaran' => date('Y-m-d'),
            'bulan_bayar' => $data['bulan'],
            'biaya_admin' => $biaya_admin,
            'total_bayar' => $total_bayar,
            'id_tagihan' => $data['id_tagihan'],
            'id_pelanggan' => $data['id_pelanggan'],
            'id_user' => session()->get('id_user'),
        ];
        $tb_pembayaran->insert($data_pembayaran);
    }
}
