<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup      = 'default';
    protected $table        = 'users';
    protected $primaryKey   = 'id';
    protected $useAutoIncrement = true;
    protected $insertID     = 0;
    protected $returnType   = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];
    protected $allowedFields = ['nom', 'prenom', 'email', 'password'];

    protected function hashPassword(array $data): array
    {
        if (!empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}