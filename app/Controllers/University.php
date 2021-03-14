<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;//ทำAPI
use CodeIgniter\API\ResponseTrait;//จัดเป็น json เอง
use App\Models\UniversityModel;

use ResourceBundle;

class University extends ResourceController
{
    use ResponseTrait;

    public function getUniversity()
    {
        $model = new UniversityModel();
        $studentdata['university'] = $model->orderBy('id_university')->findAll();
        return $this->respond($studentdata);
    }   
}