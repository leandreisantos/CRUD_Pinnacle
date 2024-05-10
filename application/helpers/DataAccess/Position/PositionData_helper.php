<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class PositionData
{
    public function getDataFromForm($ci_instance)
    {
        return $positionData = [
            'name' =>$ci_instance->input->POST('position')
        ];
    }
    public function getDataFromEdit($ci_instance)
    {
        return $positionData = [
            'id' =>$ci_instance->input->POST('id'),
            'name' =>$ci_instance->input->POST('name')
        ];
    }
    public function getDataFromDelete($ci_instance)
    {
        return $positionData = [
            'id' =>$ci_instance->input->POST('id')
        ];
    }

}