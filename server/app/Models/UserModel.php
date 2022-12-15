<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;


class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields =
    ['id_mhs', 'email', 'password', 'role'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
    // function getEmail($email)
    // {
    //     $builder = $this->table("users");
    //     $data = $builder->where("email", $email)->first();
    //     if (!$data) {
    //         throw new Exception("Data otentikasi tidak ditemukan");
    //     }
    //     return $data;
    // }
}