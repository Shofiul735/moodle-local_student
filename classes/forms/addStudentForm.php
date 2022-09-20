<?php
require_once("$CFG->libdir/formslib.php");

class addStudentForm extends moodleform
{
    //Add elements to form
    public function definition()
    {
        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('text', 'name', 'Student Name:');
        $mform->setType('name', PARAM_NOTAGS);
        $mform->addElement('text', 'age', 'Student Age'); // Add elements to your form
        $mform->setType('age', PARAM_INT);                   //Set type of element
        // $mform->setDefault('messagetext', get_string('enter_message', 'local_message'));        //Default value
        $mform->addElement('text', 'class', 'Student class:');
        $mform->setType('class', PARAM_INT);
        $mform->setDefault('class', 1);
        $mform->addElement(
            'text',
            'phone',
            "Student's Phone:"
        );
        $mform->setType('phone', PARAM_NOTAGS);
        $mform->addElement('text', 'parentname', "Student's Parent Name:");
        $mform->setType('parentname', PARAM_NOTAGS);
        $mform->addElement('text', 'parentphone', "Parent's Phone Number:");
        $mform->setType('parentphone', PARAM_NOTAGS);
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
