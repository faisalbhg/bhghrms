<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Grade extends BaseController
{
    public function index()
    {
        $data['companies'] = $this->api->getCompany();
        //echo '<pre>'; print_r($data);exit;
        return view("grade/list",$data);
    }

    public function getlist(){
        $postData = $this->request->getVar();
        $companyId = $postData['companyId'];
        $data['grades'] = $this->api->getGradeList($companyId);
        $return['gradeList'] = view('grade/getlist',$data);
        $this->api->output_compressed_data($return);
    }

    public function getGradeDetails($id,$companyId)
    {
        $data['grade'] = $id;
        $data['companyId'] = $companyId;
        $gradesDetails = $this->api->getGradesDetails($id);
        $data['getApprovalMasterList'] = $this->api->getApprovalList();
        $postDataArray['companyid']=$companyId;

        $postUserData['userId'] = 0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['getUserlist'];
        $userListResponse = $this->api->getApiData($getUserlistApiUrl,"GET",$postUserData);
        $data['usersList'] = $userListResponse;
        foreach($data['getApprovalMasterList'] as $getApprovalMasterList)
        {
            $postDataArray['gradeid']=$id;
            $postDataArray['stageid']=$getApprovalMasterList->StageId;
            $data['StageTitle'][$getApprovalMasterList->StageId] = $getApprovalMasterList->StageTitle;
            $data['getApprovalMatrixList'][$getApprovalMasterList->StageId] = $this->api->getApprovalMatrixList($postDataArray);
        }
        
        if(!empty($gradesDetails['salaryBreakdown']))
        {
            $data['salaryBreakdowns'] = $gradesDetails['salaryBreakdown'];
            $data['salaryDetail'] = $gradesDetails['salaryDetail'][0];
            //echo '<pre>'; print_r($data); exit;
            return view('grade/getDetails',$data);
        }
        else
        {
            //echo '<pre>'; print_r($data); exit;
            return view('grade/addGradeDetails',$data);
        }
            
    }


    public function approval_select()
    {
        $data['companies'] = $this->api->getCompany();
        $data['getApprovalMasterList'] = $this->api->getApprovalList();
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            
            $postDataArray['companyid']=$postData['companyId'];
            $postDataArray['gradeid']=$postData['gradeSelect'];
            $postDataArray['stageid']=$postData['StageId'];
            $getApprovalMatrixListUrl = config('SiteConfig')->api_url['getApprovalMatrixList'];
            $getApprovalMatrixListResponse = $this->api->getApiData($getApprovalMatrixListUrl,"GET",$postDataArray);
            $getApprovalMasterList = (array)json_decode($getApprovalMatrixListResponse);
            //dd($getApprovalMatrixListResponse);
            $data['getApprovalMatrixList'] = $getApprovalMasterList['data'];
            //echo '<pre>'; print_r($data);exit;
            return view('hrmsapprovals/search',$data);
        }
        else
        {
            $data['getApprovalMatrixList'] = array();
            return view('hrmsapprovals/search',$data);
        }
    }

    public function update_approvals()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //echo '<pre>'; print_r($postData);exit;
            $postValData['companyid'] = $postData['companyid'];
            $postValData['gradeid'] = $postData['gradeid'];
            $postValData['stageid'] = $postData['stageid'];
            
            $userId='';
            $aproval='Approval ';
            foreach($postData['user'][$postData['stageid']] as $key => $postVal)
            {
                $countVal = $key+1;
                if(count($postData['user'][$postData['stageid']]) == $countVal)
                {
                    $aproval='Final Approval';
                }
                else
                {
                    $aproval='Approval '.$countVal;
                }
                $userId.= $postVal.'^'.$aproval.'^'.$countVal.'^#';
            }
            $postValData['data'] = $userId;
            $getUserlistApiUrl = config('SiteConfig')->api_url['manageApprovalMatrix'];
            $userListResponse = $this->api->getApiData($getUserlistApiUrl,"POST",$postValData);
            return redirect()->to(base_url('gradeEdit/'.$postData['gradeid'].'/'.$postValData['companyid']));
        }   
    }

    public function saveGradeSalaryDetails(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //echo '<pre>'; print_r($postData);
            $postSDData['budgetId'] = 0;
            $postSDData['roleId'] = 0;
            $postSDData['companyId'] = $postData['companyId'];
            $postSDData['departmentId'] = 0;
            $postSDData['grade'] = $postData['grade'];
            $postSDData['salaryFrom'] = $postData['salaryFrom'];
            $postSDData['salaryTo'] = $postData['salaryTo'];
            $postSDData['basicSalaryMin'] = $postData['basicSalaryMin'];
            $postSDData['basicSalaryMax'] = $postData['basicSalaryMax'];
            $postSDData['basicSalPerc'] = $postData['BasicPer'];
            $postSDData['basicSalFixed'] = $postData['BasicFix'];
            $postSDData['hrAallowPerc'] = $postData['HomeRentAllownacePer'];
            $postSDData['hrAallowFixed'] = $postData['HomeRentAllownaceFix'];
            $postSDData['trAallowPerc'] = $postData['TransportAllownacePer'];
            $postSDData['trAallowFixed'] = $postData['TransportAllownaceFix'];
            $postSDData['taskAllowPerc'] = $postData['TaskAllowancePer'];
            $postSDData['taskAllowFixed'] = $postData['TaskAllowanceFix'];
            $postSDData['mobileAllowPerc'] = $postData['MobileAllowancePer'];
            $postSDData['mobileAllowFixed'] = $postData['MobileAllowanceFix'];
            $postSDData['foodAllowPerc'] = $postData['FoodAllowancePer'];
            $postSDData['foodAllowFixed'] = $postData['FoodAllowanceFix'];
            $postSDData['fuelAllowPerc'] = $postData['FuelAllowancePer'];
            $postSDData['fuelAllowFixed'] = $postData['FuelAllowanceFix'];
            $postSDData['foodAllow'] = isset($postData['foodAllow'])?$postData['foodAllow']:0;
            $postSDData['joiningFare'] = $postData['joiningFare'];
            $postSDData['airTicketFreq'] = $postData['airTicketFreq'];
            $postSDData['airTicketEnti'] = $postData['airTicketEntilt'];
            $postSDData['healthInsurance'] = $postData['healthInsurance'];
            //$postSDData['allowFood'] = $postData['allowFood'];
            $postSDData['currentCount'] = 0;
            $postSDData['coreCount'] = 0;
            $postSDData['createdby'] = session()->get('userId');
            $postSDData['modifiedby'] = 0;
            
            //echo '<pre>'; print_r($postSDData);
        
            $manageSalaryStructureApiUrl = config('SiteConfig')->api_url['manageSalaryStructure'];

            $manageSalaryStructureResponse = $this->api->getApiData($manageSalaryStructureApiUrl,"POST",$postSDData);
            //echo '<pre>'; print_r($manageSalaryStructureResponse);exit;
            return redirect()->to(base_url('gradeEdit/'.$postData['grade'].'/'.$postData['companyId']));
        }
    }

    public function getGradeSalaryDetails()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //echo '<pre>'; print_r($postData);
            $postSDData['budgetId'] = $postData['budgetId'];
            $postSDData['roleId'] = 0;
            $postSDData['companyId'] = $postData['companyId'];
            $postSDData['departmentId'] = 0;
            $postSDData['grade'] = $postData['grade'];
            $postSDData['salaryFrom'] = $postData['salaryFrom'];
            $postSDData['salaryTo'] = $postData['salaryTo'];
            $postSDData['basicSalaryMin'] = $postData['basicSalaryMin'];
            $postSDData['basicSalaryMax'] = $postData['basicSalaryMax'];
            $postSDData['basicSalPerc'] = $postData['BasicPer'];
            $postSDData['basicSalFixed'] = $postData['BasicFix'];
            $postSDData['hrAallowPerc'] = $postData['HomeRentAllownacePer'];
            $postSDData['hrAallowFixed'] = $postData['HomeRentAllownaceFix'];
            $postSDData['trAallowPerc'] = $postData['TransportAllownacePer'];
            $postSDData['trAallowFixed'] = $postData['TransportAllownaceFix'];
            $postSDData['taskAllowPerc'] = $postData['TaskAllowancePer'];
            $postSDData['taskAllowFixed'] = $postData['TaskAllowanceFix'];
            $postSDData['mobileAllowPerc'] = $postData['MobileAllowancePer'];
            $postSDData['mobileAllowFixed'] = $postData['MobileAllowanceFix'];
            $postSDData['foodAllowPerc'] = $postData['FoodAllowancePer'];
            $postSDData['foodAllowFixed'] = $postData['FoodAllowanceFix'];
            $postSDData['fuelAllowPerc'] = $postData['FuelAllowancePer'];
            $postSDData['fuelAllowFixed'] = $postData['FuelAllowanceFix'];
            $postSDData['foodAllow'] = isset($postData['foodAllow'])?$postData['foodAllow']:0;
            $postSDData['joiningFare'] = $postData['joiningFare'];
            $postSDData['airTicketFreq'] = $postData['airTicketFreq'];
            $postSDData['airTicketEnti'] = $postData['airTicketEntilt'];
            $postSDData['healthInsurance'] = $postData['healthInsurance'];
            //$postSDData['allowFood'] = $postData['allowFood'];
            $postSDData['currentCount'] = 0;
            $postSDData['coreCount'] = 0;
            $postSDData['createdby'] = 0;
            $postSDData['modifiedby'] = session()->get('userId');
            
            //echo '<pre>'; print_r($postSDData);exit;
        
            $manageSalaryStructureApiUrl = config('SiteConfig')->api_url['manageSalaryStructure'];
            $manageSalaryStructureResponse = $this->api->getApiData($manageSalaryStructureApiUrl,"POST",$postSDData);
            //echo '<pre>'; print_r($manageSalaryStructureResponse);exit;
            return redirect()->to(base_url('gradeEdit/'.$postData['grade']));
        }
        $postData = $this->request->getVar();
        $gradeId = $postData['gradeId'];
        $gradesDetails = $this->api->getGradesDetails($gradeId);
        $data['salaryBreakdowns'] = $gradesDetails['salaryBreakdown'];
        $data['salaryDetail'] = $gradesDetails['salaryDetail'][0];
        $return['getGradeSalaryDetails'] = view('grade/getSalaryDetails',$data);
        $this->api->output_compressed_data($return);
    }
    
}
