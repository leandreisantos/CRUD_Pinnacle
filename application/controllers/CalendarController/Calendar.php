<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller
{

    private $_jsonHelper;

    public function __construct()
    {
        parent::__construct();
        $this->_jsonHelper = new Json();
    }

    public function showCurrentMonth(){
        $dateToday = new DateTime();
        $currentMonth = $dateToday->format('F');
        $currentYear = $dateToday->format('Y');
        $totalDays = $dateToday->format('t');

        //Get the starting day of the month
        $cloneDateToday = clone $dateToday;
        $firstDayOfMonth = $cloneDateToday->modify('first day of this month');
        $weekStart = $firstDayOfMonth->format('w');


        $calendarData =[
            'currentMonth' => $currentMonth,
            'currentYear'=> $currentYear,
            'currentDay' => $dateToday->format('d')
        ];

        $dayInMonth = array();

        
        //Check the extra day in week before starting a day for a month
        $count = 0;
        while($count!=$weekStart){
            array_push($dayInMonth,"");
            $count++;
        }

        //Input the day starting the day in a week
        $day = 1;
        while($day <= $totalDays){
            array_push($dayInMonth,$day);
            $day++;
        }

        $calendarData['dayInMonth'] = $dayInMonth;

        


        $data['calendarContent'] = $this->load->view('SupportComponent/Calendar/calendar_content',$calendarData,true);

        $this->_jsonHelper->SetOutput($this->output,$data);
    }

}