<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Aprovals extends BaseController
{
    public function job_aproval_list()
    {
        $arrayPost = array('userid'=>session()->get('userId'),'stagecode'=>'HR-JOBC');
        $aprovalJobsListApiUrl = config('SiteConfig')->api_url['aprovaljoblist'];
        $getJobsListResponse = $this->api->getApiData($aprovalJobsListApiUrl,"GET",$arrayPost);
        if(@$getJobsListResponse['status']!=404)
        {
           $data['joblists'] = $getJobsListResponse; 
        }
        else
        {
           $data['joblists'] = array();
        }
        //echo '<pre>'; print_r($data);exit;
        
        return view("aprovals/aprovaljoblist",$data);
    }

    public function aproval_jobproposal()
    {

        $postVal['userid']=session()->get('userId');
        //echo '<pre>'; 
        //print_r(json_encode($postVal));
        //$postVal['stagecode']='HR-JOFF';
        $getProposalListApiUrl = config('SiteConfig')->api_url['getProposalApprovalList'];
        //print_r($getProposalListApiUrl);exit;
        $getProposalListResponse = $this->api->getApiData($getProposalListApiUrl,"GET",$postVal);

        //dd($getProposalListResponse);
        if(@$getProposalListResponse['status']!=404)
        {
            $data['proposalLList'] = $getProposalListResponse;
        }
        else
        {
            $data['proposalLList'] = array();
        }
        //echo '<pre>'; print_r($data);exit;
        return view("aprovals/jobproposal_list",$data);
    }

    public function save_aproval_jobproposal($dataId)
    {
        $arrayPost["dataId"]=$dataId;
        $arrayPost["stageCode"]='HR-JOFF';
        $arrayPost["isApprove"]=true;
        $arrayPost["isForce"]=false;
        $arrayPost["comments"]="approve";
        $arrayPost["userId"]=session()->get('userId');

        //echo '<pre>';
        //print_r(json_encode($arrayPost));


        $proposalAprovalApiUrl = config('SiteConfig')->api_url['proposal_aproval'];
        //print_r($proposalAprovalApiUrl);exit;
        $proposalAprovalResponse = $this->api->getApiData($proposalAprovalApiUrl,"POST",$arrayPost);

        $aprovalNotificatio = (array)json_decode($proposalAprovalResponse);

        //echo '<pre>';print_r($aprovalNotificatio);exit;

        //$responseData = (array)$aprovalNotificatio['data'];
        
        if(count((array)$aprovalNotificatio['data'])!=0)
        {
            $responseData = (array)$aprovalNotificatio['data'][0];
            $proposalID = $responseData['ProposalID'];
                
            $from_email = session()->get('userName');
            $from_name = session()->get('fullName');

            $name = $responseData['AddressName'];
            $to = $responseData['Email'];
            //$to = 'moath.zaghlol@buhaleeba.ae';
            //$cc='faisal@buhaleeba.ae';
            $cc='';
            $bcc='faisal@buhaleeba.ae';
            $subject = "New Proposal Approval";
            $emailBody = "You have new proposal to approve. Please note the URL to proceed the Approval. <br>http://hrms.bhguae.ae/aproval-jobproposal/";
            $data = array(
                'name'=> $name,
                'message'=>$emailBody,
            );
            $type=2;
            $filename='';
            $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
        }

        $session = session();
        $session->setFlashdata('success', 'Aproved Successfully..!');
        return redirect()->to(base_url('aproval-jobproposal'));

    }

    public function reject_aproval_jobproposal($dataId)
    {
        $arrayPost["dataId"]=$dataId;
        $arrayPost["stageCode"]='HR-JOFF';
        $arrayPost["isApprove"]=false;
        $arrayPost["isForce"]=false;
        $arrayPost["comments"]="reject";
        $arrayPost["userId"]=session()->get('userId');

        //echo '<pre>';
        //print_r(json_encode($arrayPost));


        $proposalAprovalApiUrl = config('SiteConfig')->api_url['proposal_aproval'];
        //print_r($proposalAprovalApiUrl);exit;
        $proposalAprovalResponse = $this->api->getApiData($proposalAprovalApiUrl,"POST",$arrayPost);
        $aprovalNotificatio = (array)json_decode($proposalAprovalResponse);
        //echo '<pre>';print_r($aprovalNotificatio);exit;
        if(count((array)$aprovalNotificatio['data'])!=0)
        {
            $data['proposalDetails'] = (array)$aprovalNotificatio['data'][0];
        }
        else
        {
            $data['proposalDetails'] = array();
        }

        $session = session();
        $session->setFlashdata('success', 'Rejected Successfully..!');
        return redirect()->to(base_url('aproval-jobproposal'));

    }
    

    public function aproval_jobproposal_details($aprId)
    {
        if($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();

            
            $arrayPost["dataId"]=$postData['dataId'];
            $arrayPost["stageCode"]='HR-JOFF';
            $arrayPost["isApprove"]=true;
            $arrayPost["isForce"]=false;
            $arrayPost["comments"]="approve";
            $arrayPost["userId"]=session()->get('userId');

            //echo '<pre>';
            //print_r(json_encode($arrayPost));


            $proposalAprovalApiUrl = config('SiteConfig')->api_url['proposal_aproval'];
            //print_r($proposalAprovalApiUrl);exit;
            $proposalAprovalResponse = $this->api->getApiData($proposalAprovalApiUrl,"POST",$arrayPost);
        }
        $postVal['userid']=session()->get('userId');
        $postVal['proposalID']=$aprId;

        $getProposalDetailsApiUrl = config('SiteConfig')->api_url['getProposalDetails'];
        $getProposalDetailsResponse = $this->api->getApiData($getProposalDetailsApiUrl,"GET",$postVal);

        //echo '<pre>'; print_r($getProposalDetailsResponse);exit;
        if(@$getProposalDetailsResponse['status']!=404)
        {
            $data['applicantDetails'] = $getProposalDetailsResponse['proposal'][0];
            $data['screening'] = $getProposalDetailsResponse['screening'];
            $data['gradedetails'] = $getProposalDetailsResponse['table12'];
        }
        else
        {
            $data['applicantDetails'] = array();
            $data['screening'] = array();
            $data['gradedetails'] = array();
        }
        //echo '<pre>'; print_r($data);exit;
        return view("aprovals/aprovalProposalDetails",$data);
    }

    public function jobview($jobId)
    {
        $userId = session()->get('userId');
        $arrayPost = array(
            "jobId"=>$jobId,
            "userId"=>$userId
        );
        $jobDetailsApiUrl = config('SiteConfig')->api_url['job_details'];
        $jobDetailsResponse = $this->api->getApiData($jobDetailsApiUrl,"GET",$arrayPost);
        if(@$jobDetailsResponse['status']==404)
        {
           $session = session();
           $session->setFlashdata('error', 'You are not authorized to access..!');
           return redirect()->to(base_url('aproval-jobs'));
        }
        $data['job'] = $jobDetailsResponse['jobDetails'][0];
        
        return view("aprovals/jobview",$data);
    }

    public function job_aprove($dataId)
    {
        $arrayPost["dataId"]=$dataId;
        $arrayPost["stageCode"]='HR-JOBC';
        $arrayPost["isApprove"]=true;
        $arrayPost["isForce"]=false;
        $arrayPost["comments"]="approve";
        $arrayPost["userId"]=session()->get('userId');

        
        $jobAprovalApiUrl = config('SiteConfig')->api_url['job_aproval'];
        $jobAprovalResponse = $this->api->getApiData($jobAprovalApiUrl,"POST",$arrayPost);

        //echo '<pre>'; print_r($jobAprovalResponse); echo '<pre>';exit;
        
        $aprovalNotificatio = (array)json_decode($jobAprovalResponse);
        //echo '<pre>'; print_r($aprovalNotificatio);exit;
        
        if(count((array)$aprovalNotificatio['data'])!=0)
        {
            
            $responseData = (array)$aprovalNotificatio['data'][0];
            //dd($responseData);
            $from_email = session()->get('userName');
            $from_name = session()->get('fullName');


            $jobid = $responseData['JobID'];
            
            $name = $responseData['AddressName'];
            $to = $responseData['Email'];
            //$to = 'faisal@buhaleeba.ae';
            $cc='';
            $bcc='faisal@buhaleeba.ae';
            $subject = "New Vacancy Approval";
            $emailBody = "You have new vacancy approval. Please note the URL to proceed the Approval. <br>http://hrms.bhguae.ae/aproval-jobs/";
            $data = array(
                'name'=> $name,
                'message'=>$emailBody,
            );
            $type=2;
            $filename='';
            $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
        }
        else
        {
            $data['positionList'] = array();
        }
        $session = session();
        $session->setFlashdata('success', 'Job Aproved Successfully..!');
        return redirect()->to(base_url('aproval-jobs'));
    }

    public function jobreject($dataId)
    {
        $arrayPost["dataId"]=$dataId;
        $arrayPost["stageCode"]='HR-JOBC';
        $arrayPost["isApprove"]=false;
        $arrayPost["isForce"]=false;
        $arrayPost["comments"]="Reject";
        $arrayPost["userId"]=session()->get('userId');

        $jobAprovalApiUrl = config('SiteConfig')->api_url['job_aproval'];
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
        $session->setFlashdata('success', 'Job Rejected Successfully..!');
        return redirect()->to(base_url('aproval-jobs'));
    }
}
