<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            

            $rules = [
                'username' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[4]|max_length[255]',
                //'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $userAccessApiUrl = config('SiteConfig')->api_url['user_access'];
                $userDetails = $this->api->getApiData($userAccessApiUrl,"POST",$postData);
                $userDetails = $userDetails;
                //echo '<pre>'; print_R($userDetails);exit;
                if(@$userDetails['status'] !=404)
                {
                    $this->setUserSession($userDetails[0]);
                    return redirect()->to(base_url('/'));
                }
                else
                {
                    // Redirecting to login
                    $session = session();
                    $session->setFlashdata('error', 'Authentication Failed');
                    return redirect()->to(base_url('login'));
                }
                
                
            }
        }
        return view('auth/login');
    }

    private function setUserSession($user)
    {
        $data = $user;
        $data['isLoggedIn'] = true;
        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'phone_no' => 'required|min_length[9]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {

                return view('register', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to(base_url('login'));
            }
        }
        return view('register');
    }

    public function profile()
    {

        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function hrms_users_list()
    {
        $postData['userId'] = 0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['getUserlist'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postData);
        $data['usersList'] = $userListResponse;
        //echo '<pre>'; print_r($data);exit;
        return view('users/list', $data);
    }

    public function new_user()
    {
        if ($this->request->getMethod() == 'post') {
            $postVal = $this->request->getVar();
            $postData['userId'] = 0;
            $postData['userName'] = $postVal['userName'];
            $postData['fullName'] = $postVal['fullName'];
            $postData['companyId'] = $postVal['companyId'];
            $postData['roleId'] = $postVal['positionID'];
            $postData['userGroupId'] = $postVal['userGroupId'];
            $postData['departmentId'] = $postVal['departmentID'];
            $postData['createdBy'] = session()->get('userId');
            $postData['modifiedBy'] = session()->get('userId');
            $postData['userType'] = $postVal['userType'];
            
            $manageUserApiUrl = config('SiteConfig')->api_url['manageUser'];
            $manageUser = $this->api->getApiData($manageUserApiUrl,"POST",$postData);
            $session = session();
            $session->setFlashdata('success', 'User Created Successful');
            return redirect()->to(base_url('hrms-users-list'));
        }
        $postData['companyId']=0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postData);
        if(@$userListResponse['status']!=404)
        {
            $data['companies'] = $userListResponse;
        }
        else{
            $data['companies'] = array();
        }



        return view('users/create',$data);
    }

    public function edit_user($userId)
    {
        if ($this->request->getMethod() == 'post') {
            $postVal = $this->request->getVar();
            //dd($postVal);
            $postData['userId'] = $userId;
            $postData['userName'] = $postVal['userName'];
            $postData['fullName'] = $postVal['fullName'];
            $postData['companyId'] = $postVal['companyId'];
            $postData['roleId'] = $postVal['positionID'];
            $postData['userGroupId'] = $postVal['userGroupId'];
            $postData['departmentId'] = $postVal['departmentID'];
            $postData['createdBy'] = session()->get('userId');
            $postData['modifiedBy'] = session()->get('userId');
            $postData['userType'] = $postVal['userType'];
            
            $manageUserApiUrl = config('SiteConfig')->api_url['manageUser'];
            $manageUser = $this->api->getApiData($manageUserApiUrl,"POST",$postData);
            $session = session();
            $session->setFlashdata('success', 'User Updated Successful');
            return redirect()->to(base_url('edit-user/'.$userId));
        }

        $postUser['userId'] = $userId;
        $getUserlistApiUrl = config('SiteConfig')->api_url['getUserlist'];
        $usersResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postUser);
        if(@$usersResponse['status']!=404)
        {
            $data['user'] = $usersResponse[0];
        }
        else
        {
            $data['user'] = array();
        }

        $postData['companyId']=0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postData);
        if(@$userListResponse['status']!=404)
        {
            $data['companies'] = $userListResponse;
        }
        else{
            $data['companies'] = array();
        }

        $companyId = $data['user']['companyId'];
        $divisionId = $data['user']['divisionId'];
        $departmentId = $data['user']['departmentId'];
        $roleId = $data['user']['roleId'];

        $postDataDv['companyId']=$companyId;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDv);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();
        }
        
        $data['departmentList'] = array();;
        if(@$divisionListResponse[['status']!=404]){
            $divisionId = $divisionId;

            $postDataDpt['divisionID']=$divisionId;
            $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
            $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDpt);
            if(@$departmentListResponse['status']!=404)
            {
                $data['departmentList'] = $departmentListResponse;
            }
            else
            {
                $data['departmentList'] = array();
            }
        }

        

        $postDataPs['deptId']=$departmentId;
        $postDataPs['companyId']=$companyId;
        $postDataPs['roleid']=0;
        $populatePositionListApiUrl = config('SiteConfig')->api_url['populatePositionList'];
        $positionListResponse = $this->api->getApiData($populatePositionListApiUrl,"GET",$postDataPs);
        if(@$positionListResponse['status']!=404)
        {
            $data['positionList'] = $positionListResponse;
        }
        else
        {
            $data['positionList'] = array();;
        }

        $postDataVal['companyId']=$companyId;
        $getUserGroupApiUrl = config('SiteConfig')->api_url['getUserGroupList'];
        $getUserGroupResponse = $this->api->getApiData($getUserGroupApiUrl,"GET",$postDataVal);
        //dd($getGradeListForPositionResponse);
        if(@$getUserGroupResponse['status']!=404)
        {
            $data['userGroups'] = $getUserGroupResponse;
        }
        else
        {
            $data['userGroups'] = array();
        }


        //echo '<pre>';print_r($data);exit;


        return view('users/edit',$data);
    }

    public function forgot_password()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            

            $rules = [
                'username' => 'required|min_length[6]|max_length[50]|valid_email',
                //'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/forgot_password', [
                    "validation" => $this->validator,
                ]);

            } else {
                

                $emailExistCheckApiUrl = config('SiteConfig')->api_url['userEmailExist'];
                $arrayPostData['email'] = $postData['username'];
                $userDetails = $this->api->getApiData($emailExistCheckApiUrl,"POST",$arrayPostData);
                //dd($userDetails);
                if($userDetails==1)
                {

                    $encrypter = \Config\Services::encrypter();
                    $cipherEmail = bin2hex($encrypter->encrypt($postData['username']));
                    

                    $from_email = 'hrms@buhaleeba.ae';
                    $from_name = 'HR Admin';

                    $name = $postData['username'];
                    $to = $postData['username'];
                    //$to = 'moath.zaghlol@buhaleeba.ae';
                    $cc='';
                    $bcc='';
                    $subject = "Forgot Password Request";
                    $emailBody = "Please click the below uel to reset your password. <br>".base_url('change-password/'.$cipherEmail);
                    $data = array(
                        'name'=> $postData['username'],
                        'message'=>$emailBody,
                    );
                    $type=2;
                    $filename='';
                    $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
                    $session = session();
                    $session->setFlashdata('success', 'Reset link is send to the given user email..!');
                    return redirect()->to(base_url('forgot-password'));
                }
                else
                {  
                    $session = session();
                    $session->setFlashdata('error', 'Username not exist..!');
                    return redirect()->to(base_url('forgot-password'));

                }
                
                
            }
        }
        else
        {
            return view('auth/forgot_password');
        }

    }

    public function change_password($val)
    {
        $encrypter = \Config\Services::encrypter();
        $userEMail = $encrypter->decrypt(hex2bin($val));
        //echo $userEMail;exit;
        $data['value'] = $val;
        if(!empty($userEMail))
        {
            if ($this->request->getMethod() == 'post') {
                //let's do the validation here
                $rules = [
                    'password' => 'required|min_length[6]|max_length[255]',
                    'password_confirm' => 'matches[password]',
                ];

                if (!$this->validate($rules)) {
                    $data["validation"] = $this->validator;

                    return view('auth/reset_password',$data);
                } else {
                    $newData = $this->request->getVar();
                    unset($newData['password_confirm']);

                    $resetUserPasswordApiUrl = config('SiteConfig')->api_url['resetUserPassword'];
                    $postData['email'] = $userEMail;
                    $postData['newpassword'] = $newData['password'];
                    $resetPassword = $this->api->getApiData($resetUserPasswordApiUrl,"POST",$postData);
                    if($resetPassword==1)
                    {
                        $session = session();
                        $session->setFlashdata('success', 'Password changes successful, Please login here..!');
                        return redirect()->to(base_url('login'));
                    }
                    else
                    {
                        $session = session();
                        $session->setFlashdata('error', 'Error, try again later..1');
                        return view('auth/reset_password',$data);
                    }
                }
            }
            $data['value'] = $val;
            //echo '<pre>';print_r($data);exit;
            return view('auth/reset_password',$data);
        }
        else
        {
            $session = session();
            $session->setFlashdata('error', 'Reset link already expired..!');
            return redirect()->to(base_url('login'));
        }
    }
}
