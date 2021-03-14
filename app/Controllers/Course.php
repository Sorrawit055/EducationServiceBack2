<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\CourseModel;

use ResourceBundle;

class Course extends ResourceController
{
    use ResponseTrait;

    public function getCourse()
    {
        $model = new CourseModel();
        $studentdata['course'] = $model->orderBy('id_course')->findAll();
        return $this->respond($studentdata);
    }   
}