<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class General extends BaseController
{

    public function department_list()
    {
        $postData = $this->request->getVar();
        $arrayPost["companyId"]=$postData['companyId'];
        $departmentListApiUrl = config('SiteConfig')->api_url['department_list'];
        $departmentApiResponse = $this->api->getApiData($departmentListApiUrl,"GET",$arrayPost);
        //echo '<pre>';print_r($departmentApiResponse);exit;
        if(@$departmentApiResponse['status']!=404)
        {
            $data['departmentList'] = $departmentApiResponse;
        }
        else
        {
            $data['departmentList'] = array();
        }
        

        $return['departmentListData'] = view('general/department_list',$data); 
        
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
