<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($username, $password, $userkey, $passwordkey)
    {
        $builder = $this->db->query("select user.id_user,user.password from user where user.id_user = AES_ENCRYPT(?,?) and user.password = AES_ENCRYPT(?,?)", [$username, $userkey, $password, $passwordkey]);
        return $builder->getRow();
    }
}
