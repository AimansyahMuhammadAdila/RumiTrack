<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama', 'email', 'username', 'password'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nama' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama lengkap harus diisi.',
            'min_length' => 'Nama minimal 3 karakter.',
        ],
        'email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique' => 'Email sudah terdaftar.',
        ],
        'username' => [
            'required' => 'Username harus diisi.',
            'min_length' => 'Username minimal 3 karakter.',
            'is_unique' => 'Username sudah digunakan.',
        ],
        'password' => [
            'required' => 'Password harus diisi.',
            'min_length' => 'Password minimal 6 karakter.',
        ],
    ];
}
