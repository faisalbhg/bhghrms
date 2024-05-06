<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailLogModel;
use App\Models\CrmReminderModel;



class Contact extends BaseController
{
    public function index()
    {
        //
        return view('contact');
    }

    public function view_template()
    {
        $data = [
            'name'=>'Muhammad Faisal',
            'message'=>'Using fluid structures, fluid images, and media queries, we can make email (nearly) as responsive as modern websites.'
        ];
       return view('emails/customerFollowup',$data);
    }

    
    public function crm_customer_email($id)
    {
        
        $emailPostData = $this->request->getVar();
        
        if(isset($emailPostData['sendToCustomer']))
        {
            $to = $emailPostData['customerEmail'];
        }
        else
        {
            $to = $emailPostData['sendEailOther'];
        }
        
        $session = session();
        if($to=='')
        {
            $session->setFlashdata('error', 'Email send address not found send failed..!');
            return redirect()->to(base_url('inquiry-update/'.$id));
        }
        

        
        $name = $emailPostData['customerName'];
        $subject = $emailPostData['sendEailSubject'];
        $message = $emailPostData['customerEmailMessage'];
        $newData = [
            'crm_id'=>$id,
            'subject'=>$subject,
            'message'=>$message,
            'toEmail'=>$to,
            'user_id' => session()->get('id'),
            'created_at'=> date('Y-m-d H:i:s')
        ];
        $cc=NULL;
        if(isset($emailPostData['addCC']))
        {
            $cc = $emailPostData['sendEailCC'];
            $newData['ccEmail']=$cc;
            
        }
        
        $bcc=NULL;
        if(isset($emailPostData['addBCC']))
        {
            $bcc = $emailPostData['sendEailBCC'];
            $newData['bccEmail']=$bcc;
        }


        $filename = NULL;
        if (!empty($_FILES['customerEmail_attachment']['name'])) {
            $img = $this->request->getFile('customerEmail_attachment');
            $newName = $img->getRandomName();
            $img->move(FCPATH  . 'uploads/email/',$newName);
            $qAImageData = [
               'name' =>  $img->getName(),
               'type'  => $img->getClientMimeType()
            ];
            $newData['attachment']=$newName;
            $filename = FCPATH  . 'uploads/email/'.$newName; //you can use the App patch 
            //$email->attach($filename);
        }
        
        $emailLogModel = new EmailLogModel();
        $emailLogModel->save($newData);//Inserting Inquiry Detaisl
        
        
        $data = array(
            'name'=> $name,
            'message'=> $message
        );
        $from_email = session()->get('email');
        $from_name = session()->get('name');
        if ($this->emailsend->send_mail($from_email,$from_name,$to,$name,$cc,$bcc,$subject,$data,$filename)) 
        {
            $msg = 'Email successfully sent';
            $session->setFlashdata('success', 'Email successfully sent..!');
        } 
        else 
        {
            //$data = $email->printDebugger(['headers']);
            //print_r($data);exit;
            $msg ='Email send failed';
            $session->setFlashdata('error', 'Email send failed..!');
        }
        return redirect()->to(base_url('crm-update/'.$id));
    }

    public function sendMail()
    { 
        $to = $this->request->getVar('email');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');
        
        $email = \Config\Services::email();
 
        $email->setTo($to);
        $email->setFrom('faisal@buhaleeba.ae', 'Contact Us');
        
        $email->setSubject($subject);
        $data = array(
            'name'=> 'Manoj Patil',
            'URL'=> 'http://manojpatial.com/login',
            'user_name'=> 'manojpatil',
            'password'=> 'welcome',

        );
        $message = view('emails/customerFollowup',$data);
        $email->setMessage($message);

        

        if ($email->send()) 
        {
            $msg = 'Email successfully sent';
        } 
        else 
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);exit;
            $msg ='Email send failed';
        }
        return redirect()->to( base_url('contact') )->with('msg', $msg);
    }

    public function notification_message()
    {
        $data['soundOn'] = false;
        $data['listItems'] = '';
        $data['listItemCount'] = 0;

        $crmReminderModel = new CrmReminderModel();
        $crmReminderDetails = $crmReminderModel->getWhere(['user_id'=>session()->get('id'),'is_open'=>0,'status'=>1,'date_on <='=>date('Y-m-d H:i:s')]);
        $crmReminderResult = $crmReminderDetails->getResult();
        
        $response='';
        $soundOn = false;
        $sessionNotification = json_decode(session()->get('notificationID'));
        if($sessionNotification=='')
        {
            $sessionNotification=array();
        }
        if(!empty($crmReminderResult)){
            foreach($crmReminderResult as $notificationResult)
            {
                $response.= '
                <li class="mb-2" id="notificationList'.$notificationResult->id.'">
                  <a class="dropdown-item border-radius-md" onclick="openNotification('.$notificationResult->id.')" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">'.$notificationResult->subject.'</span>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                         '.$notificationResult->message.'
                        </p>
                      </div>
                    </div>
                  </a>
                </li>';
                if(!in_array($notificationResult->id, $sessionNotification)){
                    $soundOn = true;
                    array_push($sessionNotification,$notificationResult->id);
                }
                //$soundOn = true;
                
            }
        }
        $sessionData=array();
        $sessionData['notificationID'] = json_encode($sessionNotification);
        session()->set($sessionData);
        $response.=view('crm/openNotificationLink');

        $data['soundOn'] = $soundOn;
        $data['listItems'] = $response;
        $data['listItemCount'] = count($crmReminderResult);
        if(count($crmReminderResult)==0)
        {
            $sessionData['notificationID'] = '';
            session()->set($sessionData);
        }
        
        $this->output_compressed_data($data);
    }

    public function open_notification($id)
    {
        $crmReminderModel = new CrmReminderModel();
        $updateData=['is_open'=>1];
        $crmReminderModel->update($id, $updateData);//Enquiry Update

        return '1';
    }


    /**
     * Compress and output data
     * @param array $data
     */
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

    public function sendReminderEmail()
    {
        $reminderInquiryModel = new ReminderInquiryModel();
        $notificationDetails = $reminderInquiryModel->getWhere(['is_open'=>0,'is_send'=>0,'status'=>1,'date_on <='=>date('Y-m-d H:i:s')]);
        $notificationResults = $notificationDetails->getResult();
        echo '<pre>';print_r($notificationResults);
        foreach($notificationResults as $notificationResult)
        {
            //
            $newData = [
                'enquiry_id'=>$notificationResult->id,
                'subject'=>$notificationResult->subject,
                'message'=>$notificationResult->message,
                'toEmail'=>$notificationResult->toEmail,
                'user_id' => session()->get('id'),
                'created_at'=> date('Y-m-d H:i:s')
            ];
            $emailModel = new EmailLogModel();
            $emailModel->save($newData);//Inserting Inquiry Detaisl
            $emailModel->insertID(); 
            
            $email = \Config\Services::email();
            
            $email->setTo($notificationResult->toEmail);
            
            $email->setFrom('lmishopinquiries@gmail.com', 'LMI Shop Enquiry');
            $email->setSubject($notificationResult->subject);
            $data = array(
                'name'=> session()->get('name'),
                'message'=> $notificationResult->message
            );
            $message = view('emails/customerFollowup',$data);
            $email->setMessage($message);
            $email->send();

            $notificationResult->id;
            $updateData=['is_open'=>1,'is_send'=>1];
            $reminderInquiryModel->update($notificationResult->id, $updateData);//Enquiry Update
        }
        return true;
    }

}
