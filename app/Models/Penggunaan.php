<?php

namespace App\Models;

use CodeIgniter\Model;

class Penggunaan extends Model
{
    protected $table            = 'penggunaan';
    protected $primaryKey       = 'id_penggunaan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_penggunaan', 'id_pelanggan', 'bulan', 'tahun', 'meter_awal', 'meter_akhir'
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
        'meter_awal' => 'required|numeric|max_length[20]',
        'meter_akhir' => 'required|numeric|max_length[20]',
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
        'meter_awal' => [
            'required' => 'Meter awal harus diisi',
            'numeric' => 'Meter awal harus berupa angka',
            'max_length' => 'Meter awal maksimal 20 karakter',
        ],
        'meter_akhir' => [
            'required' => 'Meter akhir harus diisi',
            'numeric' => 'Meter akhir harus berupa angka',
            'max_length' => 'Meter akhir maksimal 20 karakter',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['tambah_tagihan'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function tambah_tagihan(array $data)
    {
        $data_tagihan = [
            'bulan' => $data['data']['bulan'],
            'tahun' => $data['data']['tahun'],
            'jumlah_meter' => (int) ($data['data']['meter_akhir'] - $data['data']['meter_awal']),
            'id_status' => 1,
            'id_penggunaan' => $data['id'],
            'id_pelanggan' => (int) $data['data']['id_pelanggan'],
        ];
        $jumlah_meter = $data['data']['meter_akhir'] - $data['data']['meter_awal'];
        $tb_pelanggan = $this->db->table('pelanggan')
            ->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif')
            ->where('id_pelanggan', $data['data']['id_pelanggan'],)
            ->select('tarifperkwh')
            ->get()->getFirstRow() ?? '';
        $this->db->table('tagihan')->insert($data_tagihan);
        $subtotal_bayar = $jumlah_meter * $tb_pelanggan->tarifperkwh;
        $biaya_admin = $subtotal_bayar * 0.01;
        $total_bayar = $subtotal_bayar + $biaya_admin;
        $data_pembayaran = [
            'tanggal_pembayaran' => date('Y-m-d'),
            'bulan_bayar' => $data['data']['bulan'],
            'biaya_admin' => $biaya_admin,
            'total_bayar' => $total_bayar,
            'id_tagihan' => $this->db->insertID(),
            'id_pelanggan' => $data['data']['id_pelanggan'],
            'id_user' => session()->get('id_user'),
        ];
        $this->db->table('pembayaran')->insert($data_pembayaran);
        return $data;
    }
}
