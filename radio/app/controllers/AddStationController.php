<?php
    class AddStationController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Add Station',
            'radioIcon' => 'radio',
            'subjectIcon' => 'description',
            'dateIcon' => 'event',
            'timeIcon' => 'schedule',
            'mountPointIcon' => 'settings_input_antenna',
            'addStationAction' => URLROOT . '/addStation',
            'subjectError' => '',
            'dateError' => '',
            'timeError' => '',
            'mountPointError'=> ''
        ];

        // Constructor de la clase
        public function __construct() {

        }

        // Función para orquestar el registro de una nueva estación
        public function addStation() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if (empty($POST['subject']) || empty($POST['date']) || empty($POST['time']) || empty($POST['mountPoint'])) {
                    if(empty($POST['subject'])) {
                        $this->data['subjectError'] = 'Please enter a subject.';
                    }

                    if(empty($POST['date'])) {
                        $this->data['dateError'] = 'Please enter a date.';
                    }

                    if(empty($POST['time'])) {
                        $this->data['timeError'] = 'Please enter a time.';
                    }

                    if(empty($POST['mountPoint'])) {
                        $this->data['mountPointError'] = 'Please enter a mount point.';
                    }
                }
            }
            $this->view('addStation', $this->data);
        }
    }
?>