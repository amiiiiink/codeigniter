<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email'];

    public function search($name, $email)
    {
        // Perform the search based on 'name' and 'email'
        return $this->like('name', $name)
            ->like('email', $email);
    }
}