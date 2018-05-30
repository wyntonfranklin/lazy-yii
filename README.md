# lazy-yii

An automated form creator for yii. Create forms easily form you models.

## Getting Started
Copy the folder and place in your extensions folder in your yii project. This is
a YII extension so you would need the whole framework for this to work.

### Prerequisites

* Yii

### Usage

To use with a project just add the following code

`$this->widget('application.extensions.LazyModel.LazyModel', array(
     'model' => $model));`
 
 This will generated a layout of text boxes for your model.
 To gain more control of your form you need to add more configurations.
 
### Properties

A list of the properties of the widget

* model - A CActiveRecord Class
* formId - The id of the form element 
* cssClass - The class of the form element
* elements - An array of attributes for you model
* buttons - An array of attributes for your buttons


### Elements
 
 A list of Attributes for your elements
 
 * name - The label of the element
 * cssClass - The class of the element
 * elementId - The id of the element
 * elementStyle - A string containing styles
 * type - The Type of element
    * text
    * textarea
    * number
    * file
    * dropdown
    * checkboxlist
    * date
    * datetime
 * dropDownData - the data for a dropdown field
 * rows - Rows for a text area type element
 * cols - Columns for a text are type element
 
 ### Buttons
 
 A List of attributes for your button elements
 
 * btnName - The name of your button
 * btnValue - The value of you button
 * btnType - The type of your button ( default: submit)
 * btnStyle - Styling for your buttons
 
 
 