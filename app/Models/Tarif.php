<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarif extends Model
{
    protected $table            = 'tarif';
    protected $primaryKey       = 'id_tarif';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_tarif', 'daya', 'tarifperkwh'
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
        'daya' => 'required|numeric|max_length[15]',
    ];
    protected $validationMessages   = [
        'daya' => [
            'required' => 'Daya harus diisi',
            'numeric' => 'Daya harus berupa angka',
            'max_length' => 'Daya maksimal 15 karakter',
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
