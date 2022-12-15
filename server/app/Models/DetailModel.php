<?php

namespace App\Models;

use CodeIgniter\Model;

require __DIR__ . '../../../vendor/autoload.php';

class DetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_details';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'kelas', 'angkatan', 'alamat', 'avatar'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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
    public function getDetailModel()
    {
        $builder = $this->db->table("tbl_users");
        $builder->select('*');
        $builder->join('tbl_details', 'tbl_details.nim=tbl_users.nim');
        return $builder->get();
    }
}