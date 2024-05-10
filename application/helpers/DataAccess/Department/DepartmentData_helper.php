<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class DepartmentData
{
    public function getDataFromForm($ci_instance)
    {
        return $departmentData = [
            'name' =>$ci_instance->input->POST('department'),
            'head_id'=>$ci_instance->input->POST('head_id')
        ];
    }

    public function getDataFromEdit($ci_instance)
    {
        return $departmentData = [
            'id' =>$ci_instance->input->POST('id'),
            'name' =>$ci_instance->input->POST('name'),
            'head_id' =>$ci_instance->input->POST('head_id')
        ];
    }

    public function getDataFromDelete($ci_instance)
    {
        return $departmentData = [
            'id' =>$ci_instance->input->POST('id')
        ];
    }

}