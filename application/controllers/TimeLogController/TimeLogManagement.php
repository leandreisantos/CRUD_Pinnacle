<?php
defined('BASEPATH') or die('No direct script access allowed');

class TimeLogManagement extends CI_Controller
{
    private $_timeZone = 'Asia/Manila';
    private $_timeLogModel;
    private $_logStatus;
    private $_jsonHelper;
    private $_activeUserId;
    private $_dateTimeHelper;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set($this->_timeZone);
        $this->load->model(array('DatabaseModel/TimeLogModel','DatabaseModel/LogStatusModel'));
        $this->load->helper(array('ManageOutput/Json_helper','DateTime/Datetime_helper'));

        $this->_timeLogModel = new TimeLogModel();
        $this->_logStatus = new LogStatusModel();
        $this->_jsonHelper = new Json();

        $this->_dateTimeHelper = new DateTimeUtils();

        $this->_activeUserId = $this->session->userdata('user_id');
    }
    public function TimeIn()
    {
        $timeInRecords = $this->GetTimeInData();
        $this->_timeLogModel->SetTimeIn($timeInRecords);
        $getLogId = $this->_timeLogModel->GetLastInsertedId();

        $timelogData = $this->GetTimeLogData($getLogId);
        $this->_logStatus->UpdateStatus($timelogData,$timelogData['employee_id']);

        $result = $this->SetOutput("Successfully Time In!",true,"SupportComponent/buttonTimeOut");

        $fetchDateTime = $this->GetLatestTimeLog("timeIn");
        $result['currentTimeIn'] = "";
        $result['currentTimeOut'] = "";

        if($fetchDateTime!=null)
        {
            $result['currentTimeIn'] = $this->_dateTimeHelper->ConvertTo12hFormat($fetchDateTime,"Time in");
        }
        $this->_jsonHelper->SetOutput($this->output,$result);
    }

    public function TimeOut()
    {
        $logId = $this->_logStatus->GetLogId($this->_activeUserId);

        $timeOutRecords = $this->GetTimeOutData();
        $reult = $this->_timeLogModel->SetTimeOut($timeOutRecords,$logId);

        $updatedLogData = $this->UpdateTimeLogData();
        $this->_logStatus->UpdateStatus($updatedLogData,$updatedLogData['employee_id']);

        $result = $this->SetOutput("Successfully Time out!",false,"SupportComponent/buttonTimeIn");

        $fetchDateTimeOut = $this->GetLatestTimeLog("timeOut");
        $result['currentTimeOut'] = $this->_dateTimeHelper->ConvertTo12hFormat($fetchDateTimeOut,"Time out");;

        $this->_jsonHelper->SetOutput($this->output,$result);
    }

    public function ShowTimeLogs()
    {
        $fetchTimeLog = $this->_timeLogModel->GetTimeLog($this->_activeUserId);
        
        $data['timelogs'] = $fetchTimeLog;
        $componentData['timeLogTable'] = $this->load->view('SupportComponent/TimeLogsTable',$data,true);

        $this->_jsonHelper->SetOutput($this->output,$componentData);
    }

    //** TIMELOG MANAGEMENT UTILS */

    private function GetLatestTimeLog($desireData)
    {
        return $this->_timeLogModel->GetLatestTimeLog($this->_activeUserId,$desireData);
    }

    private function GetTimeLogData($logId)
    {
        return $result = array(
            'employee_id' => $this->session->userdata('user_id'),
            'log_status' => true,
            'log_id'=> $logId
        );
    }
    private function UpdateTimeLogData()
    {
        return $result = array(
            'employee_id' => $this->session->userdata('user_id'),
            'log_status' => false,
            'log_id'=> null
        );
    }

    private function GetTimeInData()
    {
        $result = $this->GetDateTime('timeIn');
        $result['employeeId'] = $this->session->userdata('user_id');

        return $result;
    }

    private function GetTimeOutData()
    {
        $result = $this->GetDateTime('timeOut');
        $result['employeeId'] = $this->session->userdata('user_id');

        return $result;
    }

    private function SetOutput($message,$status,$btnComponent)
    {
        return $result = array(
            'message' => $message,
            "status" => $status,
            "btnTimeLog" => $this->load->view($btnComponent,'',true)
        );
    }

    private function GetDateTime($timeStatus)
    {
        return $result= array(
            $timeStatus => date('Y-m-d H:i:s')
        );
    }
}