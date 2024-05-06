<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $arrayPost['userType'] = session()->get('userType');
        $arrayPost['companyId'] = session()->get('companyId');
        $arrayPost['userId'] = session()->get('userId');
        
        $jobsListApiUrl = config('SiteConfig')->api_url['getDashboardCounts'];
        $getJobsListResponse = $this->api->getApiData($jobsListApiUrl,"GET",$arrayPost);
        //echo '<pre>'; print_r($getJobsListResponse);exit;
        
        $data['totalpostedjobs'] = $getJobsListResponse['postedJobs'][0]['totalpostedjobs'];
        $data['totalpendingjobapprovals'] = $getJobsListResponse['jobPendingApprovals'][0]['totalpendingjobapprovals'];
        $data['applications'] = $getJobsListResponse['applications'][0]['totalapplication'];
        $data['jobProposalApprovals'] = $getJobsListResponse['jobProposalApprovals'][0]['totalproposalpending'];

        if(session()->get('userType')==1 || session()->get('userType')==2)
        {
            $calendarPost['companyId']=0;
        }
        else
        {
            $calendarPost['companyId']=session()->get('companyId');
            $calendarPost['userId']=session()->get('userId');
        }
        $getInterviewScheduledlist = config('SiteConfig')->api_url['getInterviewScheduledlist'];
        $getInterviewScheduledlistResponse = $this->api->getApiData($getInterviewScheduledlist,"GET",$calendarPost);
        if(@$getInterviewScheduledlistResponse['status']!=404)
        {
            $data['schedlDatas']=$getInterviewScheduledlistResponse;
        }
        else
        {
            $data['schedlDatas']=array();
        }
        
        
        return view("dashboard",$data);
    }
}
