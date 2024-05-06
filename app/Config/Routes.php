<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'register', 'User::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'login', 'User::login', ['filter' => 'noauth']);
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('profile', 'User::profile', ['filter' => 'auth']);
$routes->get('logout', 'User::logout');
$routes->match(['get', 'post'], 'forgot-password', 'User::forgot_password', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'change-password/(:any)', 'User::change_password/$1', ['filter' => 'noauth']);

//JOB
$routes->get('jobs-list','Jobs::list',['filter'=>'auth']);
$routes->get('job/(:num)','Jobs::view/$1',['filter'=>'auth']);
$routes->match(['get', 'post'],'edit-job/(:num)','Jobs::edit/$1',['filter'=>'auth']);
$routes->match(['get', 'post'],'create-new-job','Jobs::create_job',['filter'=>'auth']);
$routes->get('post-job/(:num)','Jobs::postjob/$1',['filter'=>'auth']);
$routes->get('send-aprove-job/(:num)','Jobs::send_aprove_job/$1',['filter'=>'auth']);
$routes->get('getjobdivisions','Jobs::getjobdivisions',['filter'=>'auth']);
$routes->get('get-grade-position','Hrms::get_grade_position',['filter'=>'auth']);
$routes->get('open-job-applications','Jobs::open_job_applications',['filter'=>'auth']);
$routes->match(['post','get'],'categorize-application/(:num)','Jobs::categorize_application/$1',['filter'=>'auth']);

//Application
$routes->get('job-application/all/(:num)','Jobapplications::applications/$1',['filter'=>'auth']);
$routes->get('job-application/(:num)/(:num)','Jobapplications::applications/$1/$2',['filter'=>'auth']);
//$routes->get('job-application/(:num)/(:num)','Jobapplications::applications/$1/$2',['filter'=>'auth']);

$routes->get('job-applications','Jobapplications::applications',['filter'=>'auth']);

//$routes->get('job-applications/(:num)','Jobapplications::applications/$1',['filter'=>'auth']);
$routes->get('application-shortlist/(:num)/(:num)','Jobapplications::application_shortlist/$1/$2',['filter'=>'auth']);
$routes->get('application-reject/(:num)/(:num)','Jobapplications::application_reject/$1/$2',['filter'=>'auth']);
$routes->match(['get','post'],'application-details/(:num)','Jobapplications::application_details/$1',['filter'=>'auth']);
$routes->post('schedule-interview/(:num)','Jobapplications::schedule_interview/$1',['filter'=>'auth']);
$routes->post('interview-result/(:num)','Jobapplications::interview_result/$1',['filter'=>'auth']);

//Proposals
$routes->get('job-proposals','Jobapplications::proposal_applications',['filter'=>'auth']);
$routes->get('view-proposal/(:any)','Jobapplications::proposal_view/$1',['filter'=>'auth']);
$routes->match(['get','post'],'job-proposal/(:num)','Jobapplications::save_proposal/$1',['filter'=>'auth']);
$routes->match(['get','post'],'job-proposal/(:num)/(:num)','Jobapplications::proposal/$1/$2',['filter'=>'auth']);


//Job Offer
$routes->match(['get','post'],'job-offerletter/(:num)/(:num)/(:num)','Jobapplications::jobOfffer/$1/$2/$3',['filter'=>'auth']);
$routes->get('get-model-offer','Jobapplications::get_model_offer',['filter'=>'auth']);
$routes->get('offer-letters','Jobapplications::job_offer_letters',['filter'=>'auth']);
$routes->get('accept-offerletter/(:num)/(:num)','Jobapplications::offerletter_status/$1/$2',['filter'=>'auth']);
$routes->get('reject-offerletter/(:num)/(:num)','Jobapplications::offerletter_status/$1/$2',['filter'=>'auth']);

//JOB Aproval
$routes->get('aproval-jobs','Aprovals::job_aproval_list',['filter'=>'auth']);
$routes->get('aprovaljob/(:num)','Aprovals::jobview/$1',['filter'=>'auth']);
$routes->get('aprovejob/(:num)','Aprovals::job_aprove/$1',['filter'=>'auth']);
$routes->get('reject-job/(:num)','Aprovals::jobreject/$1',['filter'=>'auth']);
$routes->get('aproval-jobproposal','Aprovals::aproval_jobproposal',['filter'=>'auth']);
$routes->match(['get','post'],'aprove-proposal/(:num)','Aprovals::aproval_jobproposal_details/$1',['filter'=>'auth']);
$routes->get('aproved-proposal/(:num)','Aprovals::save_aproval_jobproposal/$1',['filter'=>'auth']);
$routes->get('reject-proposal/(:num)','Aprovals::reject_aproval_jobproposal/$1',['filter'=>'auth']);

//General
$routes->get('company-list','General::company_list',['filter'=>'auth']);
$routes->get('department-list','General::department_list');
$routes->get('positions-list','Jobs::positions_list',['filter'=>'auth']);
$routes->get('positions-data','Jobs::positions_data',['filter'=>'auth']);

#### HRMS USERS #####
//Users
$routes->get('hrms-users-list','User::hrms_users_list',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-new-user','User::new_user',['filter'=>'auth']);
//Companies
$routes->get('hrms-companies','Hrms::companies_list',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-new-company','Hrms::new_comapny',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-update-company/(:num)','Hrms::edit_comapny/$1',['filter'=>'auth']);
$routes->match(['get','post'],'edit-user/(:num)','User::edit_user/$1',['filter'=>'auth']);
//Divisions
$routes->get('hrms-divisions','Hrms::divisions_list',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-new-division','Hrms::new_division',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-update-division/(:num)','Hrms::edit_division/$1',['filter'=>'auth']);
$routes->get('get-user-group','Hrms::get_user_group',['filter'=>'auth']);

//Departments
$routes->get('hrms-departments','Hrms::departments_list',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-new-department','Hrms::new_department',['filter'=>'auth']);
$routes->get('get-divisions','Hrms::get_division',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-update-department/(:num)','Hrms::edit_department/$1',['filter'=>'auth']);

//Positions
$routes->get('hrms-positions','Hrms::positions_list',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-new-position','Hrms::new_position',['filter'=>'auth']);
$routes->match(['get','post'],'hrms-update-position/(:num)','Hrms::edit_position/$1',['filter'=>'auth']);
$routes->get('get-department','Hrms::get_department',['filter'=>'auth']);
$routes->get('get-position-grade','Hrms::get_position_grade',['filter'=>'auth']);

$routes->match(['get','post'],'pstn-get-divisions','Hrms::getpositionCompany',['filter'=>'auth']);
$routes->match(['get','post'],'ptsn-get-department','Hrms::getpositionDepartment',['filter'=>'auth']);
$routes->match(['get','post'],'ptsn-get-position-grade','Hrms::getpositionGrade',['filter'=>'auth']);

//Grade
$routes->get('hrms-grades','Grade::index',['filter'=>'auth']);
$routes->get('get-grades','Grade::getlist',['filter'=>'auth']);
$routes->get('gradeEdit/(:num)/(:num)','Grade::getGradeDetails/$1/$2',['filter'=>'auth']);

//Aproval Master
$routes->match(['get','post'],'approvals-select','Grade::approval_select',['filter'=>'auth']);
$routes->match(['get','post'],'update-approvals','Grade::update_approvals',['filter'=>'auth']);
$routes->match(['get','post'],'get-grade-salary-details','Grade::getGradeSalaryDetails',['filter'=>'auth']);
$routes->match(['get','post'],'save-grade-salary-details','Grade::saveGradeSalaryDetails',['filter'=>'auth']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
