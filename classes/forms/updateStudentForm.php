<?php
require_once("$CFG->libdir/formslib.php");

class updateStudentForm extends moodleform
{
    protected $data;
    protected $disable = 1;
    public function __construct($data = null)
    {
        $this->data = $data;
        parent::__construct();
    }

    //Add elements to form
    public function definition()
    {
        $mform = $this->_form; // Don't forget the underscore!
        $mform->addElement('text', 'name', 'Student Name:');
        $mform->setType('name', PARAM_NOTAGS);
        $mform->setDefault('name', $this->data->name);
        $mform->addElement('text', 'age', 'Student Age');
        $mform->setType('age', PARAM_INT);
        $mform->setDefault('age', $this->data->age);
        $mform->addElement('text', 'class', 'Student class:');
        $mform->setType('class', PARAM_INT);
        $mform->setDefault('class', $this->data->class);
        $mform->addElement(
            'text',
            'phone',
            "Student's Phone:"
        );
        $mform->setType('phone', PARAM_NOTAGS);
        $mform->setDefault('phone', $this->data->phone);
        $mform->addElement('text', 'parentname', "Student's Parent Name:");
        $mform->setType('parentname', PARAM_NOTAGS);
        $mform->setDefault('parentname', $this->data->parentname);
        $mform->addElement('text', 'parentphone', "Parent's Phone Number:");
        $mform->setType('parentphone', PARAM_NOTAGS);
        $mform->setDefault('parentphone', $this->data->parentphone);
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
