<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $query = $this->builder->get();
        $data['users'] = $query->getResult();

        return view('user/index',$data);
    }
   
}
