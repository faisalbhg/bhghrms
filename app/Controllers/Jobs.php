<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jobs extends BaseController
{
    public function list()
    {
        if(session()->get('userType')==5)
        {
            $arrayPost = array('companyId'=>session()->get('companyId'),'userId'=>session()->get('userId'));
        }
        else
        {
            $arrayPost = array('companyId'=>0,'userId'=>0);
        }
        //$arrayPost = array('companyId'=>0);
        $jobsListApiUrl = config('SiteConfig')->api_url['jobs_list'];
        $getJobsListResponse = $this->api->getApiData($jobsListApiUrl,"GET",$arrayPost);
        //echo '<pre>'; print_r($getJobsListResponse);exit;
        if(@$getJobsListResponse['status']!=404)
        {
           $data['joblists'] = $getJobsListResponse; 
        }
        else
        {
           $data['joblists'] = array();
        }
        
        return view("jobs/list",$data);
    }

    public function open_job_applications()
    {
        $arrayPost=array();
        $jobsListApiUrl = config('SiteConfig')->api_url['getOpenJobApplicantsList'];
        $getJobsListResponse = $this->api->getApiData($jobsListApiUrl,"GET",$arrayPost);
        //echo '<pre>'; print_r($getJobsListResponse);exit;
        if(@$getJobsListResponse['status']!=404)
        {
           $data['openJobApplicants'] = $getJobsListResponse; 
        }
        else
        {
           $data['openJobApplicants'] = array();
        }
        
        return view("jobsapplication/openjoblist",$data);
    }

    public function categorize_application($id)
    {
        $data = array();

        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            $arrayPostCatgzBy["applicationId"]=$id;
            $arrayPostCatgzBy["gradeId"]=$postData['gradeSelect'];
            $arrayPostCatgzBy["companyID"]=$postData['companyId'];
            $arrayPostCatgzBy["roleId"]=$postData['positionID'];
            $arrayPostCatgzBy["categorizedBy"]=session()->get('userId');
            
            $categorizeOpenJobApplicationsUrl = config('SiteConfig')->api_url['categorizeOpenJobApplications'];
            $categorizeOpenJobApptnResponse = $this->api->getApiData($categorizeOpenJobApplicationsUrl,"POST",$arrayPostCatgzBy);
            if(@$categorizeOpenJobApptnResponse['status']!=500)
            {
                return redirect()->to(base_url('open-job-applications'));
            }
        }

        $arrayPost["jobAppID"]=$id;
        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['getJobApplicatDetails'];
        $jobApplicatDetails = $this->api->getApiData($jobApplicatDetailsApiUrl,"GET",$arrayPost);
        ///echo '<pre>';print_r($jobApplicatDetails); exit;
        if(@$jobApplicatDetails['status']!=404)
        {
            $data['applicantDetails'] = $jobApplicatDetails['applicant'][0];
        }
        else
        {
            $data['applicantDetails'] = array();
        }

        $data['history'] = array();

        $postComVal['companyId'] = 0;
        $comapnyListApiUrl = config('SiteConfig')->api_url['company_list'];
        $comapnyListResponse = $this->api->getApiData($comapnyListApiUrl,"GET",$postComVal);
        $data['companyList'] = $comapnyListResponse;

        $data['divisions']=array();
        $data['departmentList'] = array();
        $data['positionList'] = array();
        $data['gradeList'] = array();
        $data['positionData'] = array();
        if(!empty($data['applicantDetails']['oCompanyID']))
        {

            //Company List
            $companyId = $data['applicantDetails']['oCompanyID'];
            $departmentID = $data['applicantDetails']['oDepartmentID'];
            $postDataDivi['companyId']=$companyId;
            $postDataDivi['divisionID']=0;
            $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
            $data['divisions'] = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDivi);
            
            //Department List
            $arrayPostDl["companyId"]=$companyId;
            $departmentListApiUrl = config('SiteConfig')->api_url['department_list'];
            $departmentApiResponse = $this->api->getApiData($departmentListApiUrl,"GET",$arrayPostDl);
            $data['departmentList'] = $departmentApiResponse;

            //Position List
            $deptId = $departmentID;
            $companyId = $companyId;
            $arrayPostPl["deptId"]= $deptId;
            $arrayPostPl["companyId"]=$companyId;
            $jobPositionsListApiUrl = config('SiteConfig')->api_url['job_positions_list'];
            $getPositionResponse = $this->api->getApiData($jobPositionsListApiUrl,"GET",$arrayPostPl);
            $data['positionList'] = $getPositionResponse;

            //Grade List
        
            $postDataGrade['positionID']=$getPositionResponse[0]['roleId'];
            $getGradeListForPositionApiUrl = config('SiteConfig')->api_url['getGradeListForPosition'];
            $data['gradeList'] = $this->api->getApiData($getGradeListForPositionApiUrl,"GET",$postDataGrade);

            $arrayPost["gradeID"]=$data['applicantDetails']['oGradeID'];
            $jobPositionsDataApiUrl = config('SiteConfig')->api_url['job_position_data'];
            $getPositionData = $this->api->getApiData($jobPositionsDataApiUrl,"GET",$arrayPost);
            //echo '<pre>'; print_r($getPositionData);exit;
            if(@$getPositionData['status']!=404)
            {
                $data['positionData'] = $getPositionData[0];
            }
            else
            {
                $data['positionData'] = array();
            }

        }
        //echo '<pre>';print_r($data); exit;
        return view("jobsapplication/categorizeJobDetails",$data);
    }

    public function view($jobId)
    {
        $userId = session()->get('userId');
        $arrayPost = array(
            "jobId"=>$jobId,
            "userId"=>0
        );
        $jobDetailsApiUrl = config('SiteConfig')->api_url['job_details'];
        $jobDetailsResponse = $this->api->getApiData($jobDetailsApiUrl,"GET",$arrayPost);
        //echo '<pre>';print_r($jobDetailsResponse);exit;
        $data['job'] = $jobDetailsResponse['jobDetails'][0];
        $data['histories'] = $jobDetailsResponse['approval'];
        //echo '<pre>'; print_r($data);exit;
        
        return view("jobs/view",$data);
    }

    public function edit($jobId)
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            $display_message = 'Job Updated Successfully..!';
            if($postData['forApproval']==1)
            {
                $display_message = 'Job Send for approval Successfully..!';
                $forApproval=true;
            }
            else
            {
                $display_message = 'Job Updated Successfully..!';
                $forApproval=false;
            }
            $arrayPost = array(
                "jobId"=>$jobId,
                "jobTitle"=>$postData['jobTitle'],
                "jobDecription"=>$postData['jobDecription'],
                "companyId"=>$postData['companyId'],
                "roleId"=>$postData['positionID'],
                "createdBy"=>0,
                "modifiedBy"=>session()->get('userId'),
                "lastDateToApply"=> date("Y-m-d\TH:i:s.000\Z", strtotime($postData['lastDateToApply'])),
                "postedDate"=>date("Y-m-d\TH:i:s.000\Z", strtotime($postData['postedDate'])),
                "closeDate"=>date("Y-m-d\TH:i:s.000\Z", strtotime($postData['closeDate'])),
                "experienceDetails"=>$postData['experienceDetails'],
                "qualification"=>$postData['qualification'],
                "gender"=>$postData['gender'],
                "jobType"=>$postData['jobType'],
                "noVacant"=>$postData['noVacant'],
                "departmentID"=>$postData['departmentID'],
                "gradeId"=>$postData['gradeSelect'],
                "forApproval"=>$forApproval,
                "recruitmentType"=>$postData['recruitmentType'],
                "reason"=>$postData['reason'],
                "employeeNumber"=>isset($postData['employeeNumber'])?$postData['employeeNumber']:'',
                "employeeName"=>isset($postData['employeeName'])?$postData['employeeName']:'',
                "workLocation"=>$postData['workLocation'],
            );

            //echo '<pre>'; print_r(json_encode($arrayPost));
            
            $jobCreationApiUrl = config('SiteConfig')->api_url['job_creation'];
            $jobcreationResponse = $this->api->getApiData($jobCreationApiUrl,"POST",$arrayPost);
            //dd($jobcreationResponse);

            if($postData['forApproval']==1)
            {
                $jobcreationResponse[0]['email'];
                $from_email = session()->get('userName');
                $from_name = session()->get('fullName');

                $jobid = $jobcreationResponse[0]['jobID'];
                
                $name = $jobcreationResponse[0]['addressName'];
                $to = $jobcreationResponse[0]['email'];
                //$to = 'moath.zaghlol@buhaleeba.ae';
                $cc='';
                $bcc='mohamed.u@buhaleeba.ae';
                $subject = "New Vacancy Approval";
                $emailBody = "You have new vacancy approval. Please note the URL to proceed the Approval. <br>http://hrms.bhguae.ae/aproval-jobs/";
                $data = array(
                    'name'=> $jobcreationResponse[0]['addressName'],
                    'message'=>$emailBody,
                );
                $type=2;
                $filename='';
                $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
            }
            else
            {
                //$forApproval=false;
            }

            if(@$jobcreationResponse['status']!=404)
            {
                $session = session();
                $session->setFlashdata('success', $display_message);
            }
            else
            {
                $session = session();
                $session->setFlashdata('error', 'Try again later..!');
            }

            //echo '<pre>'; print_r($jobcreationResponse);exit;
            return redirect()->to(base_url('job/'.$jobId));
        }
        
        $arrayPost['jobId'] =  $jobId;
        $jobDetailsApiUrl = config('SiteConfig')->api_url['job_details'];
        $jobDetailsResponse = $this->api->getApiData($jobDetailsApiUrl,"GET",$arrayPost);
        $data['job'] = $jobDetailsResponse['jobDetails'][0];
        $companyId = $data['job']['companyId'];
        $jobRoleId = $jobDetailsResponse['jobDetails'][0]['roleId'];

        //Company List
        $postDataComp['companyId']=0;
        $comapnyListApiUrl = config('SiteConfig')->api_url['company_list'];
        $data['companyList'] = $this->api->getApiData($comapnyListApiUrl,"GET",$postDataComp);

        //Company List
        $postDataDivi['companyId']=$companyId;
        $postDataDivi['divisionID']=0;
        $populateDivisionslistApiUrl = config('SiteConfig')->api_url['populateDivisionslist'];
        $data['divisions'] = $this->api->getApiData($populateDivisionslistApiUrl,"GET",$postDataDivi);
        
        //Department List
        $arrayPostDl["companyId"]=$companyId;
        $departmentListApiUrl = config('SiteConfig')->api_url['department_list'];
        $departmentApiResponse = $this->api->getApiData($departmentListApiUrl,"GET",$arrayPostDl);
        $data['departmentList'] = $departmentApiResponse;

        //Position List
        $deptId = $data['job']['deptId'];
        $companyId = $data['job']['companyId'];
        $arrayPostPl["deptId"]= $deptId;
        $arrayPostPl["companyId"]=$companyId;
        $jobPositionsListApiUrl = config('SiteConfig')->api_url['job_positions_list'];
        $getPositionResponse = $this->api->getApiData($jobPositionsListApiUrl,"GET",$arrayPostPl);
        $data['positionList'] = $getPositionResponse;

        //Grade List
        $postDataGrade['positionID'] = $jobRoleId;
        $getGradeListForPositionApiUrl = config('SiteConfig')->api_url['getGradeListForPosition'];
        $data['gradeList'] = $this->api->getApiData($getGradeListForPositionApiUrl,"GET",$postDataGrade);
        //echo '<pre>'; print_r($data);exit;

        return view("jobs/edit",$data);
    }

    

    public function postjob($jobId)
    {
        $arrayPost["jobId"]=$jobId;
        $arrayPost["jobStatusType"]=3;

        $jobAprovalApiUrl = config('SiteConfig')->api_url['job_posting_url'];
        
        $jobAprovalResponse = $this->api->getApiData($jobAprovalApiUrl,"POST",$arrayPost);
        
        if(@$jobAprovalResponse['status']==200)
        {
            $data['positionList'] = $jobAprovalResponse;
        }
        else
        {
            $data['positionList'] = array();
        }
        $session = session();
        $session->setFlashdata('success', 'Job Posted Successfully..!');
        return redirect()->to(base_url('job/'.$jobId));
    }

    


    public function create_job()
    {
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            //dd($postData);
            
            if($postData['forApproval']==1)
            {
                $forApproval=true;
            }
            else
            {
                $forApproval=false;
            }

           
            if(session()->get('userType')==5)
            {
                $companyId = session()->get('companyId');
                $departmentId = session()->get('departmentId');
            }
            else
            {
                if(empty($postData['companyId']))
                {
                    $companyId = $postData['companyIdHide'];
                }
                else
                {
                    $companyId = $postData['companyId'];
                }
                if(empty($postData['departmentID']))
                {
                    $departmentId = $postData['departmentIdHide'];
                }
                else
                {
                    $departmentId = $postData['departmentID'];
                }
                
            }
            //echo '<pre>';print_r($postData);exit;

            /*companyIdHide
            if(!empty($postData['departmentIdHide']))
                {
                    $departmentId = $postData['departmentIdHide'];
                }
                else
                {
                    $departmentId = $postData['departmentID'];
                }*/
            $arrayPost = array(
                "jobId"=>0,
                "jobTitle"=>$postData['jobTitle'],
                "jobDecription"=>$postData['jobDecription'],
                "companyId"=>$companyId,
                "roleId"=>$postData['positionID'],
                "createdBy"=>session()->get('userId'),
                "modifiedBy"=>0,
                "lastDateToApply"=> date("Y-m-d\TH:i:s.000\Z", strtotime($postData['lastDateToApply'])),
                "postedDate"=>date("Y-m-d\TH:i:s.000\Z", strtotime($postData['postedDate'])),
                "closeDate"=>date("Y-m-d\TH:i:s.000\Z", strtotime($postData['closeDate'])),
                "experienceDetails"=>$postData['experienceDetails'],
                "qualification"=>$postData['qualification'],
                "gender"=>$postData['gender'],
                "jobType"=>$postData['jobType'],
                "noVacant"=>$postData['noVacant'],
                "departmentID"=>$departmentId,
                "gradeId"=>$postData['gradeSelect'],
                "forApproval"=>$forApproval,
                "recruitmentType"=>$postData['recruitmentType'],
                "reason"=>$postData['reason'],
                "employeeNumber"=>isset($postData['employeeNumber'])?$postData['employeeNumber']:'',
                "employeeName"=>isset($postData['employeeName'])?$postData['employeeName']:'',
                "workLocation"=>$postData['workLocation'],
            );

            //echo '<pre>'; print_r($arrayPost);exit;
            
            $jobCreationApiUrl = config('SiteConfig')->api_url['job_creation'];
            $jobcreationResponse = $this->api->getApiData($jobCreationApiUrl,"POST",$arrayPost);
            //dd($jobcreationResponse);


            if($postData['forApproval']==1)
            {
                $jobcreationResponse[0]['email'];
                $from_email = session()->get('userName');
                $from_name = session()->get('fullName');


                $jobid = $jobcreationResponse[0]['jobID'];
                
                $name = $jobcreationResponse[0]['addressName'];
                $to = $jobcreationResponse[0]['email'];
                //$to = 'faisal@buhaleeba.ae';
                $cc='';
                $bcc='faisal@buhaleeba.ae';
                $subject = "New Vacancy Approval";
                $emailBody = "You have new vacancy approval. Please note the URL to proceed the Approval. <br>http://hrms.bhguae.ae/aproval-jobs/";
                $data = array(
                    'name'=> $jobcreationResponse[0]['addressName'],
                    'message'=>$emailBody,
                );
                $type=2;
                $filename='';
                $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
            }

            //echo '<pre>';print_r($jobcreationResponse);exit;
            $session = session();
            $session->setFlashdata('success', 'Vacancy Created Successfully..!');
            return redirect()->to(base_url('jobs-list'));
            
        }

        $postComVal['companyId'] = 0;
        $comapnyListApiUrl = config('SiteConfig')->api_url['company_list'];
        $comapnyListResponse = $this->api->getApiData($comapnyListApiUrl,"GET",$postComVal);
        $data['companyList'] = $comapnyListResponse;

        $postDataposi['companyId']=session()->get('companyId');

        if(session()->get('userType')==6)
        {
            $postDataposi['deptId']=0;
        }
        else
        {
            $postDataposi['deptId']=session()->get('departmentId');
        }

        $postDataposi['roleid']=0;
        $getPositionApiUrl = config('SiteConfig')->api_url['populatePositionList'];
        $positionListResponse = $this->api->getApiData($getPositionApiUrl,"GET",$postDataposi);
        //echo '<pre>'; print_r($positionListResponse); echo '</pre>';exit;
        if(@$positionListResponse['status']!=404)
        {
            $data['positionList'] = $positionListResponse;
        }
        else
        {
            $data['positionList'] = array();
        }
        

        return view("jobs/create_job",$data);
    }

    public function positions_list()
    {
        $postData = $this->request->getVar();
        $arrayPost["deptId"]=$postData['deptId'];
        $arrayPost["companyId"]=$postData['comapnyId'];
        
        $jobPositionsListApiUrl = config('SiteConfig')->api_url['job_positions_list'];
        $getPositionResponse = $this->api->getApiData($jobPositionsListApiUrl,"GET",$arrayPost);
        //echo '<pre>'; print_r($getPositionResponse);exit;
        if(@$getPositionResponse['status']!=404)
        {
            $data['positionList'] = $getPositionResponse;
        }
        else
        {
            $data['positionList'] = array();
        }
        
        $return['positionListData'] = view('jobs/position_list',$data);
        //$return['salaryData'] = view('jobs/salaries_list',$data);
        
        $this->output_compressed_data($return);
    }

    public function positions_data()
    {
        $postData = $this->request->getVar();
        $arrayPost["gradeID"]=$postData['gradeID'];
        
        $jobPositionsDataApiUrl = config('SiteConfig')->api_url['job_position_data'];
        $getPositionData = $this->api->getApiData($jobPositionsDataApiUrl,"GET",$arrayPost);
        //echo '<pre>'; print_r($getPositionData);exit;
        if(@$getPositionData['status']!=404)
        {
            $data['positionData'] = $getPositionData[0];
        }
        else
        {
            $data['positionData'] = array();
        }
        
        $return['BudgetDetailsData'] = view('jobs/position_data',$data);
        //$return['salaryData'] = view('jobs/salaries_list',$data);
        
        $this->output_compressed_data($return);
    }


    public function send_aprove_job($jobId)
    {
        $arrayPost = array(
            "jobId"=>$jobId
        );
        $jobDetailsApiUrl = config('SiteConfig')->api_url['job_details'];
        $jobDetailsResponse = $this->api->getApiData($jobDetailsApiUrl,"GET",$arrayPost);
        $postData = $jobDetailsResponse[0];
        

        $arrayPost = array(
                "jobId"=>$postData['jobId'],
                "jobTitle"=>$postData['jobTitle'],
                "jobDecription"=>$postData['jobDescription'],
                "companyId"=>$postData['companyId'],
                "roleId"=>$postData['roleId'],
                "createdBy"=>0,
                "modifiedBy"=>session()->get('userId'),
                "lastDateToApply"=> $postData['lastDateToApply'],
                "postedDate"=>$postData['postedDate'],
                "closeDate"=>$postData['closeDate'],
                "experienceDetails"=>$postData['experienceDetails'],
                "qualification"=>$postData['qualification'],
                "gender"=>$postData['gender'],
                "jobType"=>$postData['jobType'],
                "noVacant"=>$postData['noVacant'],
                "departmentID"=>$postData['deptId'],
                "forApproval"=>true
            );

            //echo '<pre>'; print_r($arrayPost);exit;
            
            $jobCreationApiUrl = config('SiteConfig')->api_url['job_creation'];
            $jobAprovalResponse = $this->api->getApiData($jobCreationApiUrl,"POST",$arrayPost);

        
        if(@$jobAprovalResponse['status']==200)
        {
            $data['positionList'] = $jobAprovalResponse;
        }
        else
        {
            $data['positionList'] = array();
        }
        $session = session();
        $session->setFlashdata('success', 'Job Posted Successfully..!');
        return redirect()->to(base_url('job/'.$jobId));
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
