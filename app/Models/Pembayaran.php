<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayaran extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pembayaran', 'id_user', 'id_tagihan', 'tanggal_pembayaran', 'bulan_bayar', 'biaya_admin', 'total_bayar'
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
        'id_user' => 'required|numeric|max_length[6]',
        'id_tagihan' => 'required|numeric|max_length[6]',
        'tanggal_pembayaran' => 'required',
        'bulan_bayar' => 'required|numeric|max_length[2]',
        'biaya_admin' => 'required|numeric|max_length[12]',
        'total_bayar' => 'required|numeric|max_length[12]',
    ];
    protected $validationMessages   = [
        'id_user' => [
            'required' => 'ID User harus diisi',
            'numeric' => 'ID User harus berupa angka',
            'max_length' => 'ID User maksimal 6 karakter',
        ],
        'id_tagihan' => [
            'required' => 'ID Tagihan harus diisi',
            'numeric' => 'ID Tagihan harus berupa angka',
            'max_length' => 'ID Tagihan maksimal 6 karakter',
        ],
        'tanggal_pembayaran' => [
            'required' => 'Tanggal Pembayaran harus diisi',
        ],
        'bulan_bayar' => [
            'required' => 'Bulan Bayar harus diisi',
            'numeric' => 'Bulan Bayar harus berupa angka',
            'max_length' => 'Bulan Bayar maksimal 2 karakter',
        ],
        'biaya_admin' => [
            'required' => 'Biaya Admin harus diisi',
            'numeric' => 'Biaya Admin harus berupa angka',
            'max_length' => 'Biaya Admin maksimal 12 karakter',
        ],
        'total_bayar' => [
            'required' => 'Total Bayar harus diisi',
            'numeric' => 'Total Bayar harus berupa angka',
            'max_length' => 'Total Bayar maksimal 12 karakter',
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
