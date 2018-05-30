<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/30/18
 * Time: 5:13 AM
 */

class LazyButtons
{
    public $btnName='';
    public $btnValue = '';
    public $btnType = 'submit';
    public $btnStyle = '';


    public function __construct($name, Array $properties=array())
    {
        $this->btnName = $name;
        foreach( $properties as $key=>$value ){
            $this->{$key} = $value;
        }

    }

    public function attributes()
    {
        return [
            'value' => (!empty($this->btnValue)) ? $this->btnValue : $this->btnName,
            'type' => $this->btnType,
            'style' => (!empty($this->btnStyle)) ? $this->btnStyle : '',
        ];
    }


}