<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model{
    protected $table = 'course';
    protected $primaryKey = 'id_course' ;
    protected $allowedFields = ['id_course','name_course'];
   
}
