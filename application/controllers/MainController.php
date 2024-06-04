<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller
{
    private $_departmentModel;
    private $_timeLogModel;
    private $_activeUser;
    private $_jsonHelper;

    //private $_model;

    public function __construct()
    {
        parent::__construct();

        $this->_departmentModel = new EntityManagementModel();
        $this->_timeLogModel = new TimeLogModel();
        $this->_jsonHelper = new Json();

        $this->_activeUser = $this->session->userdata('user_id');


        $this->load->model('DataManagementModel');
    }

    public function index()
    {
        $this->homePage();
    }

    public function homePage()
    {
        if($this->_activeUser == ""){
            redirect('login');
        } else {
            $data = $this->manageHomeContent();
            $function = $this->load->view('MainComponent/HomeComponent.php',$data);
            $this->SupportTemplate($function);
        }
    }

    public function homeDashboard()
    {
        if($this->_activeUser == ""){
            redirect('login');
        } else {

            $data = $this->manageHomeContent();
            $data['home'] = $this->load->view('TabComponent/dashboard.php',$data,true);

            $this->_jsonHelper->SetOutput($this->output,$data);
        }
    }

    //**UTILIES */

    private function manageHomeContent()
    {
        $employeeTable = 'employee';
        $userData = $this->DataManagementModel->getSingleData('id',$this->_activeUser,$employeeTable);
        $data=[
            'user_id'=>$this->_activeUser,
            'user_role'=>$this->DataManagementModel->fetchSpecific('id',$this->_activeUser,'role',$employeeTable),
            'timeLogs'=>$this->DataManagementModel->fetchFirstRecords($this->_activeUser,'employee_time_log',3,'employeeId'),
            'user_position'=>$this->session->userdata('user_position'),
            'user_department'=>$this->session->userdata('user_dept')
        ];

        $this->prepareManagementButtons($data);
        $this->prepareTimeLogButtons($data);
        $this->prepareTimeLogs($data);
        $this->prepareSidebarLogo($data,$userData);

        // $data['departments']=$this->DataManagementModel->GetDepartments();
        // $data['positions']=$this->_positionModel->GetPositions();
        // $data['users']=$this->_userModel2->getUsers();

        $data['departments']=$this->DataManagementModel->getData('departments');
        $data['positions']=$this->DataManagementModel->getData('positions');
        $data['users']=$this->DataManagementModel->getData('employee');

        $data['userTable'] = $this->load->view('MainComponent/Users',$data,true);
        $this->load->view("ModalComponent/UserManagementModal.php",$data);
        $this->load->view("ModalComponent/DepartmentManagementModal.php",$data);
        $this->load->view("ModalComponent/PositionManagementModal.php");

        return $data;
    }
    
    private function prepareManagementButtons(&$data)
    {
        $data['showTableBtn']="";
        $data['showUnderEmpBtn']="";
        $data['SetAnnounceMent']="";
        $data['ManagementSettings']="";

        if($this->_departmentModel->IsHeadDepartment($this->_activeUser)){
            $data['showUnderEmpBtn'] = $this->load->view('SupportComponent/HeadDepartment/departmentHead','',true);
        }
        if($data['user_role']=='admin'){
            $data['SetAnnounceMent'] = $this->load->view('SupportComponent/buttonAnnounce','',true);   
            $data['ManagementSettings'] =$this->load->view('SupportComponent/admin/management.php','',true);
        }
    }

    private function prepareTimeLogButtons(&$data)
    {
        //$IsTimedIn = $this->_logStatus->GetStatus($data['user_id']);
        $logStatus = $this->DataManagementModel->fetchSpecific('employee_id',$this->_activeUser,'log_status','timelogs_status');

        $data['ButtonTimeLog'] = ($logStatus == "1")?
            $this->load->view('SupportComponent/buttonTimeOut','',true):
            $this->load->view('SupportComponent/buttonTimeIn','',true);
    }

    private function prepareTimeLogs(&$data)
    {
        $data['currentTimeIn']="";
        $data['currentTimeOut'] = "";
        $fetchDateTime = $this->_timeLogModel->GetLatestTimeLog($this->_activeUser,"timeIn");
        $fetchDateTimeOut = $this->_timeLogModel->GetLatestTimeLog($this->_activeUser,"timeOut");

        if($fetchDateTime!=null){
            $TimeTo12hFormat = $this->ConvertTo12hFormat($fetchDateTime);
            $data['currentTimeIn'] = "Time in : ".$TimeTo12hFormat;
        }
        if($fetchDateTimeOut !=null){
            $TimeTo12hFormat = $this->ConvertTo12hFormat($fetchDateTimeOut);
            $data['currentTimeOut'] = "Time out : ".$TimeTo12hFormat;
            
            if($data['currentTimeOut']=="Time out : 12:00 AM"){
                $data['currentTimeOut']="";
            }
        }
    }

    private function prepareSidebarLogo(&$data,$userData)
    {
        $data['aliasName'] = strtoupper(substr($userData['firstName'],0,1).substr($userData['lastName'],0,1));
    }

    private function ConvertTo12hFormat($datetime)
    {
        return date("g:i A",strtotime($datetime));
    }

    private function SupportTemplate($function)
    {
        $this->load->view('SupportComponent/header.php');
        $function;
        $this->load->view('SupportComponent/footer.php');
    }
}