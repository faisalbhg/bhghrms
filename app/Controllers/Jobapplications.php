<?php

namespace App\Controllers;

use App\Controllers\BaseController;

namespace Ngekoding\CodeIgniterDataTables;


class Jobapplications extends BaseController
{
    public function applications($stat=null,$jobId=null)
    {

        $postData = $this->request->getVar();
        if($jobId==null)
        {
            $jobId=0;
        }
        else
        {
            
        }
        if($stat!=0)
        {
            $arrayPost["applicationStatus"]=$stat;
        }

        $arrayPost["jobId"]=$jobId;

        /*if(session()->get('userType')==5)
        {
            $arrayPost["userId"]=session()->get('userId');
        }*/
        
        $jobApplyListApiUrl = config('SiteConfig')->api_url['job_application_listStatus'];
        
        /*echo '<pre>';
        print_r(json_encode($arrayPost));
        print_r($jobApplyListApiUrl);
        exit;*/

        $getPositionData = $this->api->getApiData($jobApplyListApiUrl,"GET",$arrayPost);

        $db = db_connect();
        $queryBuilder = $db->from('posts p')
                           ->select('p.*, c.name category')
                           ->join('categories c', 'c.id=p.category_id');
        $datatables = new Ngekoding\CodeIgniterDataTables\DataTables($queryBuilder, '4');
        dd($datatables->generate()); // done



        //dd($getPositionData);
        if(@$getPositionData['status']!=404)
        {
            $data['jobApplication'] = $getPositionData;
        }
        else
        {
            $data['jobApplication'] = array();
        }
        //echo '<pre>'; print_R($data);exit;
        return view("jobsapplication/job_applications",$data);
          
    }

    public function proposal_applications()
    {

        $postVal['applicationId']=0;
        $getProposalListApiUrl = config('SiteConfig')->api_url['getProposalList'];
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
        return view("jobsapplication/proposalList",$data);
    }

    public function proposal_view($proposalId)
    {
        //$postVal['userid']=session()->get('userId');
        $postVal['proposalID']=$proposalId;

        $getProposalDetailsApiUrl = config('SiteConfig')->api_url['getProposalDetails'];
        $getProposalDetailsResponse = $this->api->getApiData($getProposalDetailsApiUrl,"GET",$postVal);

        //echo '<pre>'; print_r($getProposalDetailsResponse);exit;
        if(@$getProposalDetailsResponse['status']!=404)
        {
            $data['applicantDetails'] = $getProposalDetailsResponse['proposal'][0];
            $data['screening'] = $getProposalDetailsResponse['screening'];
            $data['gradedetails'] = $getProposalDetailsResponse['table12'];
            $data['aprovalHistory'] = $getProposalDetailsResponse['table13'];

        }
        else
        {
            $data['applicantDetails'] = array();
            $data['screening'] = array();
            $data['gradedetails'] = array();
            $data['aprovalHistory'] = array();

        }
        
        //echo '<pre>'; print_r($data); exit;

        return view('jobsapplication/viewProposalAfterUpdate',$data);
    }

    public function job_offer_letters()
    {

        $postVal['applicationId']=0;
        $getProposalListApiUrl = config('SiteConfig')->api_url['getProposalList'];
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
        return view("jobsapplication/offerletters",$data);
    }


    public  function application_shortlist($applId,$status)
    {
        $arrayPost['jobApplicationId']=$applId;
        $arrayPost['jobApplicationStatusType']=$status;
        $arrayPost['userId']=session()->get('userId');
        $shortlistUrl = config('SiteConfig')->api_url['shortlistUrl'];

        //echo '<pre>'; echo $shortlistUrl; print_r(json_encode($arrayPost));exit;
        $shortlistData = $this->api->getApiData($shortlistUrl,"POST",$arrayPost);
        
        if($status==2)
        {
            echo '2';
        }
        else
        {
            echo '3';
        }

    }

    public  function application_reject($applId,$jobId)
    {
        $arrayPost['jobApplicationId']=$applId;
        $arrayPost['jobApplicationStatusType']=3;
        $arrayPost['userId']=session()->get('userId');
        $shortlistUrl = config('SiteConfig')->api_url['shortlistUrl'];

        //echo '<pre>'; echo $shortlistUrl; print_r(json_encode($arrayPost));exit;
        $shortlistData = $this->api->getApiData($shortlistUrl,"POST",$arrayPost);
        $session = session();
        $session->setFlashdata('success', 'Application Shortlisted..!');
        return redirect()->to(base_url('job-applications/'.$jobId));

    }

    public function application_details($appUserId)
    {
        $arrayPost["jobAppID"]=$appUserId;
            
        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['getJobApplicatDetails'];
        $jobApplicatDetails = $this->api->getApiData($jobApplicatDetailsApiUrl,"GET",$arrayPost);
        //echo '<pre>';print_r($jobApplicatDetails); exit;
        if(@$jobApplicatDetails['status']!=404)
        {
            $data['applicantDetails'] = $jobApplicatDetails['applicant'][0];
            $data['history'] = $jobApplicatDetails['history'];
            //$data['schedule'] = $jobApplicatDetails['schedule'];
        }
        else
        {
            $data['applicantDetails'] = array();
            $data['history'] = array();
            //$data['schedule'] = array();
        }
        //echo '<pre>';print_r($data); exit;

        return view("jobsapplication/application_details",$data);
    }

    public function schedule_interview($appUserId)
    {
        $postData = $this->request->getVar();
        //dd($postData);
        $arrayPost["userId"]=session()->get('userId');
        $arrayPost["interviewDate"]=date("Y-m-d\TH:i:s.000\Z", strtotime($postData['schedule_date_time']));
        $arrayPost["interviewWith"]=$postData['interviewWith'];
        $arrayPost["locationAttachment"]="";
        $arrayPost["mailSubject"]="Job Interiew Schedule::".$postData['companyName'];
        $arrayPost["mailBody"]=$postData['mailBody'];
        $arrayPost["toEmail"]=$postData['toEmail'];
        $arrayPost["bccEmail"]="";
        $arrayPost["ccEmail"]=$postData['ccEmail'];
        $arrayPost["jobApplicantId"]=$appUserId;
        $arrayPost["isEmailsend"]=false;


        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['jobApplicantInterviewSchedule'];
        $jobApplicatDetailsResponse = $this->api->getApiData($jobApplicatDetailsApiUrl,"POST",$arrayPost);

        $arrayPostDtl["jobAppID"]=$appUserId;
        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['getJobApplicatDetails'];
        $jobApplicatDetails = $this->api->getApiData($jobApplicatDetailsApiUrl,"GET",$arrayPostDtl);
        
        $from_email = session()->get('userName');
        $from_name = session()->get('fullName');
        
        $name = $jobApplicatDetails['applicant'][0]['applicantName'];
        $to = $jobApplicatDetails['applicant'][0]['email'];
        //$to = 'shafeeq@buhaleeba.ae';
        if($postData['ccEmail'])
        {
            $cc=$postData['ccEmail'];
        }
        else
        {
            $cc='';
        }
        $bcc='';
        $subject = "Job Interiew Schedule::".$postData['companyName'];
        $data = array(
            'name'=> $postData['applicantName'],
            'message'=> $postData['mailBody'],
            'interiewWith'=>$postData['interviewWith'],
            'dateTime'=>$postData['schedule_date_time'],
            'jobTitle'=>$postData['jobTitle'],
            'companyName'=>$postData['companyName'],

        );
        $filename='';
        $type=1;
        $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);

        //echo '<pre>';print_r($jobApplicatDetailsResponse); exit;
        
        $session = session();
        $session->setFlashdata('success', 'Interiew Scheduled successfully..!');
        return redirect()->to(base_url('application-details/'.$appUserId));
    }

    public function interview_result($appUserId)
    {
        $postData = $this->request->getVar();
        //dd($postData['chkinterviewResult']);
        
        
        $arrayPost["jobApplicationId"]=$appUserId;
        $arrayPost["jobApplicationStatusType"]=$postData['chkinterviewResult'];
        $arrayPost["userId"]=session()->get('userId');
        $arrayPost["comments"]=$postData['comments'];

        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['shortlistUrl'];
        
        /*echo '<pre>';print_R($jobApplicatDetailsApiUrl);
        print_r(json_encode($arrayPost));exit;*/

        $jobApplicatDetailsResponse = $this->api->getApiData($jobApplicatDetailsApiUrl,"POST",$arrayPost);

        //echo '<pre>';print_r($jobApplicatDetailsResponse); exit;
        
        $session = session();
        $session->setFlashdata('success', 'Interiew Scheduled successfully..!');
        return redirect()->to(base_url('application-details/'.$appUserId));
    }

    public function proposal($appUserId,$proposalId)
    {
        if ($this->request->getMethod() == 'post')
        {
            $postData = $this->request->getVar();
            //dd($postData);
            
            
            $screen1=false;
            $screen2=false;
            $screen3=false;
            $screen4=false;
            $screen5=false;
            $screen6=false;

            if(@$postData['screen1'])
            {
                $screen1=true;
            }
            if(@$postData['screen2'])
            {
                $screen2=true;
            }
            if(@$postData['screen3'])
            {
                $screen3=true;
            }
            if(@$postData['screen4'])
            {
                $screen4=true;
            }
            if(@$postData['screen5'])
            {
                $screen5=true;
            }
            if(@$postData['screen6'])
            {
                $screen6=true;
            }

            $postVal['proposalID'] = $proposalId;
            $postVal['jobId'] = $postData['jobId'];
            $postVal['applicantionId'] = $postData['applicantionId'];
            $postVal['basicPerc'] = $postData['basiccheck'];
            $postVal['homeRentAllowPerc'] = 0;
            $postVal['transportAllowPerc'] = 0;
            $postVal['othersAllowPerc'] = 0;
            $postVal['mobileAllowPerc'] = 0;
            $postVal['basicSalary'] = $postData['basicSalary'];
            $postVal['homeRentAllow'] = $postData['homeRentAllownace'];
            $postVal['totalSalary'] = $postData['totalSalary'];
            $postVal['transportAllow'] = $postData['transportAllownace'];
            if($postData['taskAllowance'])
            {
                $postData['taskAllowance']=$postData['taskAllowance'];
            }
            else
            {
                $postData['taskAllowance']=0;
            }
            $postVal['othersAllow'] = $postData['taskAllowance'];//task allowance 
            if($postData['mobileAllowance'])
            {
                $postData['mobileAllowance']=$postData['mobileAllowance'];
            }
            else
            {
                $postData['mobileAllowance']=0;
            }
            $postVal['mobileAllow'] = $postData['mobileAllowance'];
            $postVal['joiningDate'] = $postData['joiningDate'];
            $postVal['companyID'] = $postData['companyId'];
            $postVal['created'] = session()->get('userId');
            $postVal['modified'] = session()->get('userId');
            $postVal['logActivity'] = '';
            $postVal['forApproval'] = true;
            $postVal['dtScreening'] = '';
            $postVal['screen1'] = $screen1;
            $postVal['screen2'] = $screen2;
            $postVal['screen3'] = $screen3;
            $postVal['screen4'] = $screen4;
            $postVal['screen5'] = $screen5;
            $postVal['screen6'] = $screen6;
            $postVal['companycar'] = isset($postData['carAllowance'])?true:false;
            $postVal['companyAccomotation'] = isset($postData['companyAccomodation'])?true:false;
            $postVal['companyTransport'] = isset($postData['companyTransport'])?true:false;
            if(isset($postData['companyFuel']) || ($postData['fuelAllowance']!=null))
            {
                $postVal['fuel'] = true;
            }
            else
            {
                $postVal['fuel'] = false;
            }
            
            $postVal['fuelFixed'] = isset($postData['companyFuel'])?false:true;
            $postVal['FuelAllow'] = isset($postData['fuelAllowance'])?$postData['fuelAllowance']:'0';
            if(($postData['foodAllowance']!=null) || (isset($postData['foodValOptn'])))
            {
                $postVal['food'] = true;
            }
            else
            {
                $postVal['food'] = false;
            }
            $postVal['foodFixed'] = isset($postData['companyFood'])?false:true;
            $postVal['FoodAllow'] = isset($postData['foodAllowance'])?$postData['foodAllowance']:0;
            $postVal['Overtime'] = isset($postData['overtime'])?true:false;
            //echo '<pre>'; print_r(json_encode($postVal));exit;
            



            /*$postVal['dtScreening'] = array(
                "ScreeningStepID"=>array(1,2,3,4),
                "ScreeningStepDesc"=>array($postData['screen1Val'],$postData['screen2Val'],$postData['screen3Val'],$postData['screen4Val']),
                "ScreenStepReply"=>array($screen1,$screen2,$screen3,$screen4),
            );*/
            
            $manageProposalApiUrl = config('SiteConfig')->api_url['manageProposal'];
            //echo $manageProposalApiUrl;exit;
            /*echo '<pre>'; print_r($manageProposalApiUrl);
            echo '<pre>'; print_r(json_encode($postVal));exit;*/
            $manageProposalResponse = $this->api->getApiData($manageProposalApiUrl,"POST",$postVal);
            

            if(@$$manageProposalResponse['status']!=404)
            {
                $proposalID = $manageProposalResponse['proposal'][0]['proposalID'];
                
                $from_email = session()->get('userName');
                $from_name = session()->get('fullName');

                $name = $manageProposalResponse['email'][0]['addressName'];
                $to = $manageProposalResponse['email'][0]['email'];
                //$to = 'moath.zaghlol@buhaleeba.ae';
                //$cc='faisal@buhaleeba.ae';
                $cc='';
                $bcc='faisal@buhaleeba.ae';
                $subject = "New Proposal Approval";
                $emailBody = "You have new proposal to approve. Please note the URL to proceed the Approval. <br>http://hrms.bhguae.ae/aproval-jobproposal";
                $data = array(
                    'name'=> $manageProposalResponse['email'][0]['addressName'],
                    'message'=>$emailBody,
                );
                $type=2;
                $filename='';
                $this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename,$type);
            }


            //dd($manageProposalResponse);
            $session = session();
            $session->setFlashdata('success', 'Proposal Updated successfully..!');
            return redirect()->to(base_url('job-proposals'));

            //dd($manageProposalResponse);
            
        }
        $arrayPost["proposalID"]=$proposalId;
        $arrayPost["userId"]=0;
                
        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['getProposalDetails'];
        $jobApplicatDetails = $this->api->getApiData($jobApplicatDetailsApiUrl,"GET",$arrayPost);
        //echo '<pre>';print_r($jobApplicatDetails); exit;
        if(@$jobApplicatDetails['status']!=404)
        {
            $data['applicantDetails'] = $jobApplicatDetails['proposal'][0];
            $data['screening'] = $jobApplicatDetails['screening'];
            //$data['history'] = $jobApplicatDetails['history'];
            //$data['schedule'] = $jobApplicatDetails['schedule'];
        }
        else
        {
            $data['applicantDetails'] = array();
            $data['screening'] = array();
            //$data['history'] = array();
            //$data['schedule'] = array();
        }
        //echo '<pre>'; print_r($data['applicantDetails']['grade']);exit;
        $roleID = $data['applicantDetails']['roleId'];

        $arrayPostSB["gradeID"]=$data['applicantDetails']['grade'];
        $getSalaryBreakDownListAPIUrl = config('SiteConfig')->api_url['getSalaryBreakDownList'];
        $getSalaryBreakDownList = $this->api->getApiData($getSalaryBreakDownListAPIUrl,"GET",$arrayPostSB);
        $data['getSalaryBreakDown'] = $getSalaryBreakDownList;
        
        //echo '<pre>'; print_r($data); exit;

        return view('jobsapplication/update_proposal',$data);
            

    }

    public function save_proposal($appUserId)
    {
        $arrayPost["jobAppID"]=$appUserId;
            
        $jobApplicatDetailsApiUrl = config('SiteConfig')->api_url['getJobApplicatDetails'];
        $jobApplicatDetails = $this->api->getApiData($jobApplicatDetailsApiUrl,"GET",$arrayPost);
        $applicantDetails = $jobApplicatDetails['applicant'][0];
        //echo '<pre>';print_r($jobApplicatDetails['applicant']);exit;
        if(@$jobApplicatDetails['status']!=404)
        {
            $data['applicantDetails'] = $applicantDetails;
        }
        else
        {
            $data['applicantDetails'] = array();
        }

        //Salary Break Down
        $gradeId = $applicantDetails['grade'];
        $postSalBrak['gradeID'] = $gradeId;
        $getSalaryBreakDownAPIUrl = config('SiteConfig')->api_url['getSalaryBreakDownList'];
        $getSalaryBreakDown = $this->api->getApiData($getSalaryBreakDownAPIUrl,"GET",$postSalBrak);
        $data['getSalaryBreakDown'] = $getSalaryBreakDown;
        $proposalID = $this->createProposal($appUserId,$data);
        return redirect()->to(base_url('job-proposal/'.$appUserId.'/'.$proposalID));
        
        //echo '<pre>'; print_r($data); exit;

        return view('jobsapplication/proposal_process',$data);
            

    }

    public function createProposal($appUserId,$data)
    {
        
        $screen1=false;
        $screen2=false;
        $screen3=false;
        $screen4=false;
        $screen5=false;
        $screen6=false;

        $postVal['proposalID'] = 0;
        $postVal['jobId'] = isset($data['applicantDetails']['jobId'])?$data['applicantDetails']['jobId']:0;
        $postVal['applicantionId'] = $data['applicantDetails']['applicationId'];
        $postVal['basicPerc'] = $data['getSalaryBreakDown'][0]['perc'];
        $postVal['homeRentAllowPerc'] = $data['getSalaryBreakDown'][1]['perc'];
        $postVal['transportAllowPerc'] = $data['getSalaryBreakDown'][2]['perc'];
        $postVal['othersAllowPerc'] = $data['getSalaryBreakDown'][3]['perc'];//task allowance
        $postVal['mobileAllowPerc'] = $data['getSalaryBreakDown'][4]['perc'];
        $postVal['basicSalary'] = 0;
        $postVal['homeRentAllow'] = 0;
        $postVal['totalSalary'] = 0;
        $postVal['transportAllow'] = 0;
        $postVal['othersAllow'] = 0;//task allowance 
        $postVal['mobileAllow'] = 0;
        $postVal['joiningDate'] = date('Y-m-d');
        $postVal['companyID'] = $data['applicantDetails']['companyId'];
        $postVal['created'] = session()->get('userId');
        $postVal['modified'] = session()->get('userId');
        $postVal['logActivity'] = '';
        $postVal['forApproval'] = false;
        $postVal['dtScreening'] = '';
        $postVal['screen1'] = $screen1;
        $postVal['screen2'] = $screen2;
        $postVal['screen3'] = $screen3;
        $postVal['screen4'] = $screen4;
        $postVal['screen5'] = $screen5;
        $postVal['screen6'] = $screen6;
        $postVal['companycar'] = false;

        $postVal['fuel'] = false;
        $postVal['fuelFixed'] = false;
        $postVal['FuelAllow'] = 0;
        $postVal['food'] = false;
        $postVal['foodFixed'] = false;
        $postVal['FoodAllow'] = 0;
        $postVal['Overtime'] = false;

        /*$postVal['dtScreening'] = array(
            "ScreeningStepID"=>array(1,2,3,4),
            "ScreeningStepDesc"=>array($postData['screen1Val'],$postData['screen2Val'],$postData['screen3Val'],$postData['screen4Val']),
            "ScreenStepReply"=>array($screen1,$screen2,$screen3,$screen4),
        );*/
        $manageProposalApiUrl = config('SiteConfig')->api_url['manageProposal'];
        /*echo '<pre>'; print_r($manageProposalApiUrl);
        echo '<pre>'; print_r(json_encode($postVal));exit;*/
        
        //echo $manageProposalApiUrl;exit;
        $manageProposalResponse = $this->api->getApiData($manageProposalApiUrl,"POST",$postVal);
        $proposalId = $manageProposalResponse['proposal'][0]['proposalID'];
        return $proposalId;
    }

    public function get_model_offer()
    {
        $postData = $this->request->getVar();
        $companyId = $postData['companyId'];
        $jobApplicatId = $postData['jobApplicatId'];
        $proposalId = $postData['proposalId'];

        $postSalBrak['companyId'] = $companyId;
        $postSalBrak['jobAppId'] = $jobApplicatId;
        $postSalBrak['created'] = session()->get('userId');
        $postSalBrak['proposalID'] = $proposalId;
        $getSalaryBreakDownAPIUrl = config('SiteConfig')->api_url['createJobOffer'];

        $getSalaryBreakDown = $this->api->getApiData($getSalaryBreakDownAPIUrl,"GET",$postSalBrak);
        //echo '<pre>'; print_R($getSalaryBreakDown);exit;
        if(@$getSalaryBreakDown['status']!=404)
        {
            $data['offerDetails'] = $getSalaryBreakDown[0];
            $offerDetails = $getSalaryBreakDown[0];
        }
        else
        {
            $data['offerDetails'] = array();
        }

        $postData = $this->request->getVar();
        $offerDetails['passport'] = $postData['passport'];

        //$offerDetails['nationality'] = $postData['nationality'];
        $offerDetails['nationality'] = config('SiteConfig')->nationalities[$postData['nationality']];
        $offerDetails['country'] = config('SiteConfig')->countries[$postData['nationality']];
        $offerDetails['probation'] = $postData['probation'];
        //echo '<pre>'; print_r($offerDetails);echo '</pre>';exit;
        $header =   $offerDetails['header'];
        $footer =   $offerDetails['footer'];
        $path = $header;// Modify this part (your_img.png
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $offerDetails['letterhead'] = $base64;
        $offerDetails['footer'] = $footer;

        $ajSignaturePath = 'http://hrms.bhguae.ae/assets/images/profile/aj-signature1.png';
        $ajSignatureType = pathinfo($ajSignaturePath, PATHINFO_EXTENSION);
        $ajSignatureData = file_get_contents($ajSignaturePath);
        $ajSignatureImage = 'data:image/' . $ajSignatureType . ';base64,' . base64_encode($ajSignatureData);
        $offerDetails['ajsignature'] = $ajSignatureImage;

        $return['offerLetter'] = view('users/offerletter',$offerDetails);
        $this->output_compressed_data($return);

    }

    public function jobOfffer($companyId,$jobApplicatId,$proposalId)
    {
        $postSalBrak['companyId'] = $companyId;
        $postSalBrak['jobAppId'] = $jobApplicatId;
        $postSalBrak['created'] = session()->get('userId');
        $postSalBrak['proposalID'] = $proposalId;
        $getSalaryBreakDownAPIUrl = config('SiteConfig')->api_url['createJobOffer'];
        //echo $getSalaryBreakDownAPIUrl;
        //print_r(json_encode($postSalBrak));exit;
        $getSalaryBreakDown = $this->api->getApiData($getSalaryBreakDownAPIUrl,"GET",$postSalBrak);
        //echo '<pre>'; print_r($getSalaryBreakDown);exit;
        if(@$getSalaryBreakDown['status']!=404)
        {
            $data['offerDetails'] = $getSalaryBreakDown[0];
            $offerDetails = $getSalaryBreakDown[0];
        }
        else
        {
            $data['offerDetails'] = array();
        }

        $data['companyId'] = $companyId;
        $data['jobApplicatId'] = $jobApplicatId;
        $data['proposalId'] = $proposalId;

        if ($this->request->getMethod() == 'post')
        {
            //ini_set('memory_limit','5256M');

            $postData = $this->request->getVar();
            $offerDetails['passport'] = $postData['passport'];
            $offerDetails['nationality'] = config('SiteConfig')->nationalities[$postData['nationality']];
            $offerDetails['country'] = config('SiteConfig')->countries[$postData['nationality']];
            $offerDetails['probation'] = $postData['probation'];

            $header =   $offerDetails['header'];
            $footer =   $offerDetails['footer'];
            $path = $header;
            //$path = 'https://frenchbakery.cafe/wp-content/uploads/fb-header.jpg';// Modify this part (your_img.png
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $offerDetails['letterhead'] = $path;
            $offerDetails['footer'] = $footer;
            
            $ajSignaturePath = 'http://hrms.bhguae.ae/assets/images/profile/aj-signature1.png';
            $ajSignatureType = pathinfo($ajSignaturePath, PATHINFO_EXTENSION);
            $ajSignatureData = file_get_contents($ajSignaturePath);
            $ajSignatureImage = 'data:image/' . $ajSignatureType . ';base64,' . base64_encode($ajSignatureData);
            $offerDetails['ajsignature'] = $ajSignaturePath;


           /* $filename = $offerDetails['applicantName'].'-offerletter.pdf';
            $file_location = $_SERVER['DOCUMENT_ROOT']."/bhghr/pdfReports/".$filename.".pdf";
            $fp = fopen($file_location, 'w+');
            $str = view('users/offerletter',$offerDetails);
            fwrite($fp, $str);
            fclose($fp);*/

            
            $filename = $offerDetails['applicantName'].'-offerletter.doc';
            header("Content-Type: application/force-download");
            header( "Content-Disposition: attachment; filename=".basename($filename));
            header( "Content-Description: File Transfer");
            @readfile($filename);
            $content = view('users/offerletter',$offerDetails);
            echo $content;

            /*$filename = $offerDetails['applicantName'].'-offerletter.pdf';
            header("Content-Type: application/pdf");
            header( "Content-Disposition: attachment; filename=".basename($filename));
            header( "Content-Description: File Transfer");
            @readfile($filename);
            $content = view('users/offerletter',$offerDetails);
            echo $content;*/
            


            //echo '<pre>'; print_r($offerDetails);exit;

            /*$filename = $offerDetails['applicantName'].rand(0,100).'-offerletter.pdf';
            $dompdf = new \Dompdf\Dompdf(); 
            $dompdf->loadHtml(view('users/offerletter',$offerDetails));
            $dompdf->setPaper('A4', 'portrite');
            $dompdf->render();
            $dompdf->stream();
            $pdf = $dompdf->output();
            $file_location = $_SERVER['DOCUMENT_ROOT']."/bhghr/pdfReports/".$filename.".pdf";*/
            //echo $file_location;exit;
            //file_put_contents($file_location,$pdf); 
            //return redirect()->to($file_location);
            
        }
        else
        {
            //echo '<pre>'; print_r($data);echo '</pre>';exit;
            return view('jobsapplication/jobOffer',$data);
        }
    }

    public function offerletter_status($proposalId,$userId)
    {
        $arrayPost["proposalId"]=$proposalId;
        $arrayPost["statusType"]=$userId;
        $arrayPost["userId"]=session()->get('userId');


        $updateOfferStatusUrl = config('SiteConfig')->api_url['updateOfferStatus'];
        $proposalAprovalResponse = $this->api->getApiData($updateOfferStatusUrl,"POST",$arrayPost);

        return redirect()->to(base_url('offer-letters'));
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
