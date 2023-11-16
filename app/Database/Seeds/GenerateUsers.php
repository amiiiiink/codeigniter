<?php
namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
class GenerateUsers extends Seeder
{
    public function run()
    {
        $fabricator = new Fabricator(UserModel::class);

        $users = $fabricator->create(50000);


    }
}