<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $loginModel = new AuthModel();
        $session = session();
        $username = $this->request->getPost('user');
        $password = $this->request->getPost('password');
        $this->request->getPost('password');
        $userkey = env('AES_KEY_USER');
        $passwordkey = env('AES_KEY_PASSWORD');
        $session->set('userKey', $userkey);
        $session->set('passwordKey', $passwordkey);
        $loginAdmin = $loginModel->login($username, $password, $userkey, $passwordkey);
        // $kd_dokter = $session->get('id_user');
        // $dataDokter = $loginModel->dataDokter($kd_dokter, $userkey);

        if ($loginAdmin) {

            $session->set('isLogin', true);
            $session->set('id_user', $loginAdmin->id_user);
            $session->set('password', $loginAdmin->password);
            // $session->set('nm_dokter', $dataDokter->nm_dokter);

            return redirect()->to('/riwayat/ralan');
        } else {
            $session->setFlashdata('error', '<div class="alert table-danger" role="alert">
            Username atau Password salah ! </div>');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
