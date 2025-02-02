<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [
        'id_user', 'username', 'password', 'nama_admin', 'id_level'
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
    protected $validationRules = [
        'username' => 'required|max_length[25]',
        'password' => 'required|max_length[255]',
        'nama_admin' => 'required|max_length[100]',
        'id_level' => 'required|max_length[3]',
    ];
    protected $validationMessages   = [
        'username' => [
            'required' => 'Username harus diisi',
            'max_length' => 'Username maksimal 25 karakter',
        ],
        'password' => [
            'required' => 'Password harus diisi',
            'max_length' => 'Password maksimal 255 karakter',
        ],
        'nama_admin' => [
            'required' => 'Nama Admin harus diisi',
            'max_length' => 'Nama Admin maksimal 100 karakter',
        ],
        'id_level' => [
            'required' => 'Level harus diisi',
            'max_length' => 'Level maksimal 3 karakter',
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
