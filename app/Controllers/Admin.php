<?php

namespace App\Controllers;
use Myth\Auth\Models\UserModel;
class Admin extends BaseController
{
    protected $db, $builder, $usermodel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'User List';


        $this->builder->select('users.id as userid, username, email, name, deleted_at');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';


        $this->builder->select('users.id as userid, username, email, name, created_at, deleted_at');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if(empty($data['user']))
        {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }

    public function delete($id = 0)
    {
        $this->usermodel->delete($id);
        return redirect()->to('/admin');
    }
}
