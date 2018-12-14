<?php
// This file is part of Moodle - http://moodle.org/
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
 * Issue new certificate for users.
 *
 * @package    tool_certificate
 * @copyright  2018 Daniel Neis Araujo <daniel@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_certificate\form;
defined('MOODLE_INTERNAL') || die();

use moodleform;

require_once($CFG->libdir . '/formslib.php');

/**
 * Certificate issues form class.
 *
 * @package    tool_certificate
 * @copyright  2018 Daniel Neis Araujo <daniel@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class certificate_issues extends moodleform {

    /**
     * Definition of the form with user selector and expiration time to issue certificates.
     */
    public function definition() {
        $mform = $this->_form;

        $options = array(
            'ajax' => 'tool_wp/form-potential-user-selector',
            'multiple' => true,
            'data-component' => 'tool_certificate',
            'data-area' => 'issue',
            'data-itemid' => $this->_customdata['templateid']
        );
        $selectstr = get_string('selectuserstoissuecertificatefor', 'tool_certificate');
        $mform->addElement('autocomplete', 'users', $selectstr, array(), $options);

        $mform->addElement('date_time_selector', 'expires', '', ['optional' => true]);
        $mform->addElement('submit', 'submit', get_string('issuecertificates', 'tool_certificate'));
        $mform->addElement('cancel');
    }
}