<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\GroupMajorModel;

use ResourceBundle;

class GroupMajor extends ResourceController
{
    use ResponseTrait;

    public function getGroupMajor()
    {
        $model = new GroupMajorModel();
        $studentdata['groupmajor'] = $model->orderBy('id_major ')->findAll();
        return $this->respond($studentdata);
    }   
}