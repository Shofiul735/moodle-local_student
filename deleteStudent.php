<?php
// This file is part of Moodle Course Rollover Plugin
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_student
 * @author      Shofiul
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * */

require_once(__DIR__ . '/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url(get_string('delete_student_url', 'local_student')));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('delete_title', 'local_student'));

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $DB->delete_records('local_student', ['id' => $id]);
        redirect($CFG->wwwroot . get_string('manage_url', 'local_student'), get_string('delete_message', 'local_student'));
    } catch (Exception $e) {
        redirect($CFG->wwwroot . get_string('manage_url', 'local_student'), get_string('delete_error_message', 'local_student'));
    }
}

echo $OUTPUT->header();

echo $OUTPUT->footer();
