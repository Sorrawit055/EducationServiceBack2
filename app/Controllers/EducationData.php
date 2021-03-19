<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EducationDataModel;
use ResourceBundle;

class EducationData extends ResourceController
{
    use ResponseTrait;

    public function getAllEducationData()
    {
        $edumodel = new EducationDataModel();
        $educationdata = $edumodel->join('education', 'education.id_education = education_detail.id_education')
        ->join('course', 'course.id_course = education_detail.id_course')
        ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
        ->join('edu_condition', 'edu_condition.id_condition = education_detail.id_condition')
        ->join('university', 'university.id_university = education.id_university')
        ->join('round', 'round.id_round = education.id_round')
        ->join('group_major', 'group_major.id_major = course.id_major')
        ->select('group_major.*')
        ->select('round.*')
        ->select('university.*')
        ->select('faculty.*')
        ->select('course.*')
        ->select('edu_condition.*')
        ->select('education.*')
        ->select('education_detail.*')
        ->orderBy('education_detail.id_edu_detail')->findAll();
        return $this->respond($educationdata);
    }

    public function getEducationdataid($educationID = null){
        $edumodel = new EducationDataModel();
        $educationdata = $edumodel->join('education', 'education.id_education = education_detail.id_education')
        ->join('course', 'course.id_course = education_detail.id_course')
        ->join('faculty', 'faculty.id_faculty = education_detail.id_faculty')
        ->join('edu_condition', 'edu_condition.id_condition = education_detail.id_condition')
        ->join('university', 'university.id_university = education.id_university')
        ->join('round', 'round.id_round = education.id_round')
        ->join('group_major', 'group_major.id_major = course.id_major')
        ->select('group_major.*')
        ->select('round.*')
        ->select('university.*')
        ->select('faculty.*')
        ->select('course.*')
        ->select('edu_condition.*')
        ->select('education.*')
        ->select('education_detail.*')
        ->where('education.id_education',$educationID)->first();
        return $this->respond($educationdata);
    }

    // public function SearchEducation($educationdata = null)
    // {
    //     $model = new EducationDataModel();
    //     $educationdata = $model->like('id_edu_detail', $this->request->getVar('id_edu_detail'))
    //     ->orLike('id_course', $this->request->getVar('id_course'))->get();
    //     return $this->respond($educationdata);
    // }
    
    
}