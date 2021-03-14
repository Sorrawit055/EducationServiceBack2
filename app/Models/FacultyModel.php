<?php

namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model{
    protected $table = 'faculty';
    protected $primaryKey = 'id_faculty' ;
    protected $allowedFields = ['id_faculty','name_faculty'];
   
}
