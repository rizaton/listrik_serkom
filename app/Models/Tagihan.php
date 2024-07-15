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
        'id_tagihan', 'id_pelanggan', 'bulan', 'tahun', 'jumlah_meter', 'status', 'id_penggunaan'
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
        'id_tagihan' => 'required|numeric|max_length[6]',
        'id_pelanggan' => 'required|numeric|max_length[6]',
        'bulan' => 'required|numeric|max_length[2]',
        'tahun' => 'required|numeric|max_length[4]',
        'jumlah_meter' => 'required|numeric|max_length[20]',
        'status' => 'required|max_length[1]',
        'id_penggunaan' => 'required|numeric|max_length[6]',
    ];
    protected $validationMessages   = [
        'id_tagihan' => [
            'required' => 'ID Tagihan harus diisi',
            'numeric' => 'ID Tagihan harus berupa angka',
            'max_length' => 'ID Tagihan maksimal 6 karakter',
        ],
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
    ];
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
}
