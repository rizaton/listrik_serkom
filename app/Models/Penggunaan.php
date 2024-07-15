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
        'id_penggunaan' => 'required|numeric|max_length[6]',
        'id_pelanggan' => 'required|numeric|max_length[6]',
        'bulan' => 'required|numeric|max_length[2]',
        'tahun' => 'required|numeric|max_length[4]',
        'meter_awal' => 'required|numeric|max_length[20]',
        'meter_akhir' => 'required|numeric|max_length[20]',
    ];
    protected $validationMessages   = [
        'id_penggunaan' => [
            'required' => 'ID Penggunaan harus diisi',
            'numeric' => 'ID Penggunaan harus berupa angka',
            'max_length' => 'ID Penggunaan maksimal 6 karakter',
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
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
