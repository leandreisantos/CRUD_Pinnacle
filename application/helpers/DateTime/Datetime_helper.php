<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class DateTimeUtils
{
    public function ConvertTo12hFormat($datetime,$label)
    {
        return ($label." : ".date("g:i A",strtotime($datetime)));
    }
}