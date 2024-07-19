<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pelanggan', 'nama_pelanggan', 'alamat', 'id_tarif', 'username', 'password', 'nomor_kwh'
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
        'nama_pelanggan' => 'required|max_length[100]',
        'alamat' => 'required|max_length[255]',
        'id_tarif' => 'required|numeric|max_length[6]',
        'username' => 'required|max_length[25]',
        'password' => 'required|max_length[255]',
        'nomor_kwh' => 'required|max_length[50]',
    ];
    protected $validationMessages   = [
        'nama_pelanggan' => [
            'required' => 'Nama Pelanggan harus diisi',
            'max_length' => 'Nama Pelanggan maksimal 100 karakter',
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi',
            'max_length' => 'Alamat maksimal 255 karakter',
        ],
        'id_tarif' => [
            'required' => 'ID Tarif harus diisi',
            'numeric' => 'ID Tarif harus berupa angka',
            'max_length' => 'ID Tarif maksimal 6 karakter',
        ],
        'username' => [
            'required' => 'Username harus diisi',
            'max_length' => 'Username maksimal 25 karakter',
        ],
        'password' => [
            'required' => 'Password harus diisi',
            'max_length' => 'Password maksimal 255 karakter',
        ],
        'nomor_kwh' => [
            'required' => 'Nomor KWH harus diisi',
            'max_length' => 'Nomor KWH maksimal 50 karakter',
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
