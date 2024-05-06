<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Hrms extends BaseController
{
    public function companies_list()
    {
        $postData['companyId']=0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postData);
        $data['companies'] = $userListResponse;
        //echo '<pre>'; print_r($data);exit;
        return view('company/list', $data);
    }

    public function new_comapny()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postVal['companyID']=0;
            $postVal['companyName']=$postData['companyName'];
            $postVal['companyAddress']=$postData['companyAddress'];
            $manageCompanyApiUrl = config('SiteConfig')->api_url['manageCompany'];
            $manageCompany = $this->api->getApiData($manageCompanyApiUrl,"POST",$postVal);
            //dd($userListResponse);

            $session = session();
            $session->setFlashdata('success', 'Successfully Created company..!');
            return redirect()->to(base_url('hrms-companies'));
        }
        return view('company/create');
    }
    public function edit_comapny($companyId)
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postVal['companyID']=$companyId;
            $postVal['companyName']=$postData['companyName'];
            $postVal['companyAddress']=$postData['companyAddress'];
            $manageCompanyApiUrl = config('SiteConfig')->api_url['manageCompany'];
            $manageCompany = $this->api->getApiData($manageCompanyApiUrl,"POST",$postVal);
            //dd($userListResponse);

            $session = session();
            $session->setFlashdata('success', 'Successfully Created company..!');
            return redirect()->to(base_url('hrms-update-company/'.$companyId));
        }
        $postData['companyId']=$companyId;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postData);
        $data['company'] = $userListResponse[0];
        //echo '<pre>'; print_r($data);exit;
        return view('company/edit',$data);
    }

    public function divisions_list()
    {
        $postData['companyId']=0;
        $postData['divisionID']=0;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postData);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;
        return view('division/list', $data);
    }

    public function new_division()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postVal['divisionID']=0;
            $postVal['divisionName']=$postData['divisionName'];
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=session()->get('userId');
            $postVal['modified']=session()->get('userId');
            $manageDivisionsApiUrl = config('SiteConfig')->api_url['manageDivisions'];
            $manageDivisionsResponse = $this->api->getApiData($manageDivisionsApiUrl,"POST",$postVal);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created division..!');
            return redirect()->to(base_url('hrms-divisions'));
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
        return view('division/create',$data);
    }

    public function edit_division($divisionID)
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postVal['divisionID']=$divisionID;
            $postVal['divisionName']=$postData['divisionName'];
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=session()->get('userId');
            $postVal['modified']=session()->get('userId');
            $manageDivisionsApiUrl = config('SiteConfig')->api_url['manageDivisions'];
            $manageDivisionsResponse = $this->api->getApiData($manageDivisionsApiUrl,"POST",$postVal);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created division..!');
            return redirect()->to(base_url('hrms-update-division/'.$divisionID));
        }
        $postData['companyId']=0;
        $postData['divisionID']=$divisionID;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postData);
        if(@$divisionListResponse['status']!=404)
        {
            $data['division'] = $divisionListResponse[0];
        }
        else
        {
            $data['division'] = array();;
        }

        $postDataCmp['companyId']=0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postDataCmp);
        if(@$userListResponse['status']!=404)
        {
            $data['companies'] = $userListResponse;
        }
        else{
            $data['companies'] = array();
        }
        //echo '<pre>'; print_r($data);exit;
        return view('division/edit',$data);
    }

    public function get_division()
    {
        $postData = $this->request->getVar();
        
        $postDataDvt['companyId']=$postData['companyId'];
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDvt);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;    
        $return['divisionsData'] = view('general/divisions_list',$data); 
        
        $this->output_compressed_data($return);
    }



    public function departments_list()
    {
        $postData['divisionID']=0;
        $postData['deptid']=0;
        $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
        $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postData);
        //dd($departmentListResponse);
        if(@$departmentListResponse['status']!=404)
        {
            $data['departments'] = $departmentListResponse;
        }
        else
        {
            $data['departments'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;
        return view('department/list', $data);
    }

    
    public function new_department()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postVal['departmentId']=0;
            $postVal['departmentName']=$postData['departmentName'];
            $postVal['divisionID']=isset($postData['divisionID'])?$postData['divisionID']:0;
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=session()->get('userId');
            $postVal['modified']=session()->get('userId');
            $manageDepartmentApiUrl = config('SiteConfig')->api_url['manageDepartment'];
            $manageDepartmentResponse = $this->api->getApiData($manageDepartmentApiUrl,"POST",$postVal);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created department..!');
            return redirect()->to(base_url('hrms-departments'));
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

        $postData['companyId']=0;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postData);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }

        return view('department/create',$data);
    }

    public function edit_department($departmentId)
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            $postVal['departmentId']=$departmentId;
            $postVal['departmentName']=$postData['departmentName'];
            $postVal['divisionID']=isset($postData['divisionID'])?$postData['divisionID']:0;
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=session()->get('userId');
            $postVal['modified']=session()->get('userId');
            $manageDepartmentApiUrl = config('SiteConfig')->api_url['manageDepartment'];
            $manageDepartmentResponse = $this->api->getApiData($manageDepartmentApiUrl,"POST",$postVal);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created department..!');
            return redirect()->to(base_url('hrms-update-department/'.$departmentId));
        }

        $postDataDprt['divisionID']=0;
        $postDataDprt['deptid']=$departmentId;
        $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
        $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDprt);

        if(@$departmentListResponse['status']!=404)
        {
            $data['department'] = $departmentListResponse[0];
        }
        else
        {
            $session = session();
            $session->setFlashdata('error', 'Not found..!');
            return redirect()->to(base_url('hrms-departments'));
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

        $postData['companyId']=$departmentListResponse[0]['companyId'];
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postData);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;
        return view('department/edit',$data);
    }

    

    

    public function positions_list()
    {
        $postData['deptId']=0;
        $postData['companyId']=0;
        $postData['roleid']=0;
        $populatePositionListApiUrl = config('SiteConfig')->api_url['populatePositionList'];
        $positionListResponse = $this->api->getApiData($populatePositionListApiUrl,"GET",$postData);
        if(@$positionListResponse['status']!=404)
        {
            $data['positions'] = $positionListResponse;
        }
        else
        {
            $data['positions'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;
        return view('positions/list', $data);
    }

    public function new_position()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            
            $postVal['roleID']=0;
            $postVal['roleName']=$postData['roleName'];
            $postVal['departmentId']=$postData['departmentID'];
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=session()->get('userId');
            $postVal['modified']=session()->get('userId');
            $gradeIdPost='';
            foreach($postData['gradeSelect'] as $gradeSelectVal)
            {
                $gradeIdPost.= $gradeSelectVal.'^';
            }
            $postVal['grade']=$gradeIdPost;
            $postVal['modified']=session()->get('userId');

            
            $manageDepartmentApiUrl = config('SiteConfig')->api_url['manageRole'];
            //echo  $manageDepartmentApiUrl;
            //print_R(json_encode($postVal));exit;
            $manageDepartmentResponse = $this->api->getApiData($manageDepartmentApiUrl,"POST",$postVal);

            //dd($manageDepartmentResponse);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created department..!');
            return redirect()->to(base_url('hrms-positions'));
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

        $postDataDv['companyId']=0;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDv);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }

        $postDataDpt['divisionID']=0;
        $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
        $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDpt);
        if(@$departmentListResponse['status']!=404)
        {
            $data['departments'] = $departmentListResponse;
        }
        else
        {
            $data['departments'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;
        return view('positions/create',$data);
    }

    public function edit_position($positionId)
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            $postVal['roleID']=$positionId;
            $postVal['roleName']=$postData['roleName'];
            $postVal['departmentId']=$postData['departmentId'];
            $postVal['companyId']=$postData['companyId'];
            $postVal['created']=0;
            $postVal['modified']=session()->get('userId');
            $gradeIdPost='';
            foreach($postData['gradeSelect'] as $gradeSelectVal)
            {
                $gradeIdPost.= $gradeSelectVal.'^';
            }
            $postVal['grade']=$gradeIdPost;
            $postVal['modified']=session()->get('userId');

            
            $manageDepartmentApiUrl = config('SiteConfig')->api_url['manageRole'];
            /*echo  $manageDepartmentApiUrl;
            print_R(json_encode($postVal));exit;*/
            $manageDepartmentResponse = $this->api->getApiData($manageDepartmentApiUrl,"POST",$postVal);
            
            $session = session();
            $session->setFlashdata('success', 'Successfully Created department..!');
            return redirect()->to(base_url('hrms-positions'));
        }

        $postDataPs['deptId']=0;
        $postDataPs['companyId']=0;
        $postDataPs['roleid']=$positionId;
        $populatePositionListApiUrl = config('SiteConfig')->api_url['populatePositionList'];
        $positionListResponse = $this->api->getApiData($populatePositionListApiUrl,"GET",$postDataPs);
        //dd($positionListResponse);
        if(@$positionListResponse['status']!=404)
        {
            $data['position'] = $positionListResponse[0];
        }
        else
        {
            $data['position'] = array();;
        }
        $companyId = $positionListResponse[0]['companyId'];

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

        $postDataDv['companyId']=$companyId;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        //echo '<pre>'; print_r($populateDivisionslistApiUrl);print_r($postDataDv);exit;
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDv);
        //dd($divisionListResponse);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();
        }
        $data['departments'] = array();
        if(@$divisionListResponse[['status']!=404]){
            $divisionId = $data['position']['divisionId'];

            $postDataDpt['divisionID']=$divisionId;
            $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
            $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDpt);
            if(@$departmentListResponse['status']!=404)
            {
                $data['departments'] = $departmentListResponse;
            }
            else
            {
                $data['departments'] = array();
            }
        }

        $postDataGrade['companyId']=$companyId;
        $getGradeListForPositionApiUrl = config('SiteConfig')->api_url['getGradelist'];
        
        $getGradeListForPositionResponse = $this->api->getApiData($getGradeListForPositionApiUrl,"GET",$postDataGrade);
        if(@$getGradeListForPositionResponse['status']!=404)
        {
            $data['gradeList'] = $getGradeListForPositionResponse;
        }
        else
        {
            $data['gradeList'] = array();
        }
        //echo '<pre>'; print_r($data);exit;
        return view('positions/edit',$data);
    }

    public function get_department()
    {
        $postData = $this->request->getVar();
        $postDataDpt['divisionID']=$postData['divisionId'];
        $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
        $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDpt);
        //print_r($departmentListResponse);exit;
        if(@$departmentListResponse['status']!=404)
        {
            $data['departmentList'] = $departmentListResponse;
        }
        else
        {
            $data['departmentList'] = array();
        }
        

        $return['departmentListData'] = view('general/department_list',$data); 
        
        $this->output_compressed_data($return);
    }

    public function get_position_grade()
    {
        $postData = $this->request->getVar();
        if($postData['page']=='job')
        {
            $postDataposi['companyId']=$postData['comapnyId'];
            $postDataposi['deptId']=$postData['deptId'];
            $postDataposi['roleid']=0;
            $getPositionApiUrl = config('SiteConfig')->api_url['populatePositionList'];
            /*echo $getPositionApiUrl;
            print_r(json_encode($postDataposi));exit;*/
            $positionListResponse = $this->api->getApiData($getPositionApiUrl,"GET",$postDataposi);
            
            if(@$positionListResponse['status']!=404)
            {
                $data['positionList'] = $positionListResponse;
            }
            else
            {
                $data['positionList'] = array();
            }
            //echo '<pre>'; print_r($data);exit;

            $return['positionData'] = view('general/position_select',$data);
        }
        else
        {
            $postDataDpt['companyId']=$postData['comapnyId'];
            $getGradelistApiUrl = config('SiteConfig')->api_url['getGradelist'];
            $departmentListResponse = $this->api->getApiData($getGradelistApiUrl,"GET",$postDataDpt);
            //dd($departmentListResponse);
            if(@$departmentListResponse['status']!=404)
            {
                $data['gradeList'] = $departmentListResponse;
            }
            else
            {
                $data['gradeList'] = array();
            }
            //echo '<pre>'; print_r($data);exit;

            $return['gradeData'] = view('general/grade_info',$data); 
        }
        
        $this->output_compressed_data($return);
    }

    public function get_grade_position()
    {
        $postData = $this->request->getVar();
        $postDataGrade['positionID']=$postData['positionID'];
        $getGradeListForPositionApiUrl = config('SiteConfig')->api_url['getGradeListForPosition'];
        $getGradeListForPositionResponse = $this->api->getApiData($getGradeListForPositionApiUrl,"GET",$postDataGrade);
        //dd($getGradeListForPositionResponse);
        if(@$getGradeListForPositionResponse['status']!=404)
        {
            $data['gradeList'] = $getGradeListForPositionResponse;
        }
        else
        {
            $data['gradeList'] = array();
        }
        //echo '<pre>'; print_r($data);exit;

        $return['gradeSelectVal'] = view('general/grade_select',$data);
        $this->output_compressed_data($return);
    }

    public function get_user_group()
    {
        $postData = $this->request->getVar();
        $postDataVal['companyId']=$postData['companyId'];
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
        //echo '<pre>'; print_r($data);exit;

        $return['userGroupVal'] = view('general/user_group',$data);
        $this->output_compressed_data($return);
    }


    public function getpositionCompany()
    {
        $postData = $this->request->getVar();
        
        $postDataDvt['companyId']=$postData['companyId'];
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $divisionListResponse = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDvt);
        if(@$divisionListResponse['status']!=404)
        {
            $data['divisions'] = $divisionListResponse;
        }
        else
        {
            $data['divisions'] = array();;
        }
        //echo '<pre>'; print_r($data);exit;    
        $return['divisionsData'] = view('positions/ptsn_divisions_list',$data); 
        
        $this->output_compressed_data($return);
    }

    public function getpositionDepartment()
    {
        $postData = $this->request->getVar();
        $postDataDpt['divisionID']=$postData['divisionId'];
        $populateDepartmetListByDivisionsApiUrl = config('SiteConfig')->api_url['populateDepartmetListByDivisions'];
        $departmentListResponse = $this->api->getApiData($populateDepartmetListByDivisionsApiUrl,"GET",$postDataDpt);
        //print_r($departmentListResponse);exit;
        if(@$departmentListResponse['status']!=404)
        {
            $data['departmentList'] = $departmentListResponse;
        }
        else
        {
            $data['departmentList'] = array();
        }
        

        $return['departmentListData'] = view('positions/ptsn_department_list',$data); 
        
        $this->output_compressed_data($return);
    }

    public function getpositionGrade()
    {
        $postData = $this->request->getVar();
        $postDataGrade['companyId']=$postData['comapnyId'];
        $getGradeListForPositionApiUrl = config('SiteConfig')->api_url['getGradelist'];
        
        $getGradeListForPositionResponse = $this->api->getApiData($getGradeListForPositionApiUrl,"GET",$postDataGrade);
        //dd($getGradeListForPositionResponse);
        if(@$getGradeListForPositionResponse['status']!=404)
        {
            $data['gradeList'] = $getGradeListForPositionResponse;
        }
        else
        {
            $data['gradeList'] = array();
        }
        //echo '<pre>'; print_r($data);exit;

        $return['gradeSelectVal'] = view('positions/ptsn_grade_list',$data);
        $this->output_compressed_data($return);
    }



    public function output_compressed_data($data)
    {
        //debug($data);exit;
        while (ob_get_level() > 0) { ob_end_clean() ; }
        ob_start("ob_gzhandler");
        header('Content-type:application/json');
        echo json_encode($data);
        ob_end_flush();
        exit;
    }
}
