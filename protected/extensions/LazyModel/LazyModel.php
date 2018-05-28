<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/27/18
 * Time: 7:43 PM
 */

Yii::import('zii.widgets.CPortlet');

class LazyModel extends CPortlet
{

    private $_model;
    public $model;
    private $_form;
    public $cssClass;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->_model = $this->model;
        $this->setForm();
        $this->registerScripts();
    }

    public function registerScripts()
    {

    }


    public function getModel()
    {
        return $this->_model;
    }

    public function setForm()
    {
        $this->_form = new CActiveForm();
    }

    public function getForm()
    {
        return $this->_form;
    }

    public function formAttributes()
    {
        return array(

        );
    }

    public function excludeAttributes()
    {

    }

    public function formContainerStart()
    {

    }

    public function formContainerEnd()
    {

    }

    public function formHead()
    {
        return '<form>';
    }

    public function formBody( $value )
    {
        $form = $this->getForm();
        $model = $this->getModel();
        $o = '<div class="row">';
        $o .= $form->labelEx( $model, $value) . '<br>';
        $o .= CHtml::textField('', $model->$value,array());
        $o .= $form->error($model,$value);
        $o .= '</div>';
        return $o;
    }

    public function formEnd()
    {
        return '</form>';
    }



    public function renderContent()
    {
        $output = $this->formHead();
        foreach( $this->getModel()->attributes as $key=>$attribute){
            $output .= $this->formBody($key);
        }
        $output .= $this->formEnd();
        echo $output;
    }



}