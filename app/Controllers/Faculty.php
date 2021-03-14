<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\FacultyModel;

use ResourceBundle;

class Faculty extends ResourceController
{
    use ResponseTrait;

    public function getFaculty()
    {
        $model = new FacultyModel();
        $studentdata['faculty'] = $model->orderBy('id_faculty')->findAll();
        return $this->respond($studentdata);
    }   
}