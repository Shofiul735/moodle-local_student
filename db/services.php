<?php
defined('MOODLE_INTERNAL') || die();
$function = array(
    'local_student_delete' => array(
        'classname' => 'local_student_external',
        'methodname' => 'delete_student',
        'classpath' => 'local/student/externallib.php',
        'type' => 'write',
        'ajax' => true,
    ),
);

$services = array(
    'local_student_service' => array(
        'functions' => array(
            'local_student_delete',
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'custom_local_student',
    )
);
