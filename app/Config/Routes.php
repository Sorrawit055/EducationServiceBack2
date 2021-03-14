<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Student');
$routes->setDefaultController('EducationStudent');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/students', 'student::getAllStudent');
$routes->get('/students/(:num)', 'student::getStudent/$1');
$routes->post('/students', 'student::addStudent');
$routes->put('/students/(:num)', 'student::updateProfileStudent/$1');

$routes->get('/EducationStudent', 'EducationStudent::getAllEducation');
$routes->get('/EducationStudent/(:num)', 'EducationStudent::getEducation/$1');
$routes->post('/EducationStudent', 'EducationStudent::addEducationStudent');
$routes->put('/EducationStudent/(:num)', 'EducationStudent::updateEducationStudent/$1');



$routes->post("/Login", "Login::index");

$routes->post("/Title", "Title::getTitle");

$routes->post("/Curriculum", "Curriculum::getCurriculum");

$routes->post("/University", "University::getUniversity");
$routes->post("/Faculty", "Faculty::getFaculty");
$routes->post("/Course", "Course::getCourse");

$routes->post("/GroupMajor", "GroupMajor::getGroupMajor");

$routes->post("/EducationData", "EducationData::getAllEducationData");
$routes->get('/EducationData/(:num)', 'EducationData::getEducationdataid/$1');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
