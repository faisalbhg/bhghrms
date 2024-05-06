<?php

namespace App\Libraries;

class Api
{
    /**
     * 
     * Get Approval Matrix List API
     * 
     **/
    public function getApprovalMatrixList($postDataArray){
        $getApprovalMatrixListApiUrl = config('SiteConfig')->api_url['getApprovalMatrixList'];
        $aprovalMatrixListResponse = $this->getApiData($getApprovalMatrixListApiUrl,"GET",$postDataArray);
        $aprovalMatrixListResponse = (array)json_decode($aprovalMatrixListResponse);
        
        if(@$aprovalMatrixListResponse['StatusCode']!=404)
        {
            $data = $aprovalMatrixListResponse['data'];
        }
        else{
            $data = array();
        }
        return $data;
    }

    /**
     * 
     * Get Aproval List API
     * 
     **/
    public function getApprovalList(){
        $postDataAMLU=array();
        $getApprovalMasterListApiUrl = config('SiteConfig')->api_url['getApprovalMasterList'];
        $aprovalListResponse = $this->getApiData($getApprovalMasterListApiUrl,"GET",$postDataAMLU);
        $aprovalListResponse = (array)json_decode($aprovalListResponse);
        
        if(@$aprovalListResponse['StatusCode']!=404)
        {
            $data = $aprovalListResponse['data'];
        }
        else{
            $data = array();
        }
        return $data;
    }

    /**
     * 
     * Get Companies List API
     * 
     **/
    public function getCompany($id=null){
        $postData['companyId']=isset($id)?$id:0;
        $getUserlistApiUrl = config('SiteConfig')->api_url['populateCompanyList'];
        $userListResponse = $this->getApiData($getUserlistApiUrl,"GET",$postData);
        if(@$userListResponse['status']!=404)
        {
            $data = $userListResponse;
        }
        else{
            $data = array();
        }
        return $data;
    }

    /**
     * 
     * Get Grade List API
     * 
     **/
    public function getGradeList($companyId){
        $postData['companyId']=$companyId;
        $getGradelistApiUrl = config('SiteConfig')->api_url['getGradelist'];
        $gradeListResponse = $this->getApiData($getGradelistApiUrl,"GET",$postData);
        if(@$gradeListResponse['status']!=404)
        {
            $data = $gradeListResponse;
        }
        else{
            $data = array();
        }
        return $data;
    }

    /**
     * 
     * Get Grade Details API
     * 
     **/
    public function getGradesDetails($gradeId){
        $postData['gradeID']=$gradeId;
        $getGradelDetailApiUrl = config('SiteConfig')->api_url['getSalaryStructueDetails'];
        $gradeDetailsResponse = $this->getApiData($getGradelDetailApiUrl,"GET",$postData);
        //dd($gradeDetailsResponse);
        if(@$gradeDetailsResponse['status']!=404)
        {
            $data = $gradeDetailsResponse;
        }
        else{
            $data = array();
        }
        return $data;
    }


    public function getApiData($url,$methode,$data_post = array(''))
    {
        //echo $url;
        $data = array();
        $data_string = json_encode($data_post);  
        //echo '<pre>'; print_r($data_string);exit;
        $username = 'faisal@buhaleeba.ae';
        $password = 'faisal';

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);    
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $methode);  
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
        curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_HEADER, 0);//enable headers
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')
        );             
        
        /*if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }  */                                                                                                    
        $errors = curl_error($ch);
        $result = curl_exec($ch);
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);  

        if($returnCode==401)
        {
            $session = session();
            $session->setFlashdata('error', 'Access is denied due to invalid credentials');
            return redirect()->to(base_url('/'));
        }
        else
        {
            $result = json_decode($result, true);

        }
        $data = $result;
        return $data;
    }

    
    public function get_headers_from_curl_response($response)
    {
        $headers = array();

        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else
            {
                list ($key, $value) = explode(': ', $line);

                $headers[$key] = $value;
            }

        return $headers;
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