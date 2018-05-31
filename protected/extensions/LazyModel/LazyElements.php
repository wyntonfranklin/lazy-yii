<?php
/**
 * Class LazyElements
 * @property CActiveForm $form
 * @property CActiveRecord $model
 */
class LazyElements
{

    public $name ='';
    public $cssClass = '';
    public $elementId = '';
    public $elementStyle = '';
    public $containerClass = 'row';
    public $type = 'text';
    public $dropDownData = '';
    public $rows = '';
    public $cols = '';
    public $htmlAttributes;
    private $form;
    private $model;


    public function __construct($form, $model, Array $properties=array())
    {
        foreach( $properties as $key=>$value ){
            $this->{$key} = $value;
        }
        $this->form = $form;
        $this->model = $model;

    }

    public function attributes()
    {
        if( !empty( $this->getHtmlAttributes())){
            return array_merge($this->getClassAttributes(), $this->getHtmlAttributes());
        }else{
            return $this->getClassAttributes();
        }
    }

    public function getClassAttributes()
    {
        return [
            'class' => (!empty($this->cssClass)) ? $this->cssClass : '',
            'id' => (!empty($this->elementId)) ? $this->elementId : null,
            'style' => (!empty($this->elementStyle)) ? $this->elementStyle : '',
        ];
    }


    public function getHtmlAttributes()
    {
        return $this->htmlAttributes;
    }

    /**
     * @param $element LazyElements
     * @param $value
     * @return mixed
     * @throws CException
     */
    public function getFieldByType( $value )
    {
        switch( $this->type ){
            case 'text' :
                return $this->getTextField( $value );
                break;
            case 'dropdown':
                return $this->getDropDownField( $value );
                break;
            case 'textarea':
                return $this->getTextAreaField( $value );
                break;
            case 'checkboxlist':
                return $this->getCheckBoxListField( $value );
                break;
            case 'number':
                return $this->getNumberField( $value );
                break;
            case 'file':
                return $this->getFileField( $value );
                break;
            case 'date':
                return $this->getDateField( $value );
                break;
            case 'datetime':
                return $this->getDateTimeField( $value );
                break;
            case 'tel':
                return $this->getTelField( $value );
                break;
            case 'email':
                return $this->getEmailField( $value );
                break;
            case 'url':
                return $this->getUrlField( $value );
                break;
            default :
                return $this->form->textField($this->model, $value, array());
        }
    }


    /**
     * @param $element LazyElements
     * @param $value
     * @return mixed
     */
    private function getTextField( $value )
    {
        return $this->form->textField($this->model, $value,
            $this->attributes() );
    }


    /**
     * @param $element LazyElements
     * @param $value
     * @return mixed
     * @throws CException
     */
    private function getDropDownField( $value )
    {

        if(empty($this->dropDownData)){
            throw new CException(Yii::t('LazyModel','"DropDownData"  must be specified for DropDown Field.'));
        }else{
            return $this->form->dropDownList($this->model, $value, $this->dropDownData,
                $this->attributes());
        }
    }


    private function getTextAreaField( $value )
    {
        return $this->form->textArea( $this->model, $value,
            array_merge( $this->attributes(), [
                'rows' => $this->rows,
                'cols' => $this->cols,
            ] ));
    }


    private function getCheckBoxListField( $value )
    {
        return $this->form->checkBoxList( $this->model, $value,
            $this->dropDownData, $this->attributes() );
    }


    private function getNumberField( $value )
    {
        return $this->form->numberField( $this->model, $value, $this->attributes() );
    }


    private function getFileField( $value )
    {
        return $this->form->fileField( $this->model, $value, $this->attributes() );
    }

    private function getDateField( $value )
    {
        return $this->form->dateField( $this->model, $value, $this->attributes() );
    }

    private function getDateTimeField( $value )
    {
        return $this->form->dateTimeField( $this->model, $value, $this->attributes() );
    }

    private function getUrlField( $value )
    {
        return $this->form->urlField( $this->model, $value, $this->attributes() );
    }

    private function getEmailField( $value )
    {
        return $this->form->emailField( $this->model, $value, $this->attributes() );
    }

    private function getTelField( $value )
    {
        return $this->form->telField( $this->model, $value, $this->attributes() );
    }

}