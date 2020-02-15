<?php
    session_start();
    class StationController extends Controller {
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
            'mountPointError'=> '',
            'station' => ''
        ];

        // Constructor de la clase
        public function __construct() {
            $this->stationModel = $this->model('Station');
        }

        // Función para orquestar el registro de una nueva estación en la BD
        public function addStation() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'username' => $_SESSION['username'],
                    'subject' => trim($POST['subject']),
                    'date' => trim($POST['date']),
                    'time' => trim($POST['time']),
                    'mountPoint' => trim($POST['mountPoint'])
                ];

                if (empty($temp['subject']) || empty($temp['date']) || empty($temp['time']) || empty($temp['mountPoint'])) {
                    if(empty($temp['subject'])) {
                        $this->data['subjectError'] = 'Please enter a subject.';
                    }

                    if(empty($temp['date'])) {
                        $this->data['dateError'] = 'Please enter a date.';
                    }

                    if(empty($temp['time'])) {
                        $this->data['timeError'] = 'Please enter a time.';
                    }

                    if(empty($temp['mountPoint'])) {
                        $this->data['mountPointError'] = 'Please enter a mount point.';
                    }
                } else {
                    if($this->stationModel->saveStation($temp)) {
                        redirect('welcome');
                    } else {
                        die('Something went wrong');
                    }
                }
            }
            $this->view('addStation', $this->data);
        }

        // Función para orquestar la edición de una estación en la BD
        public function editStation($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'id' => $id,
                    'username' => $_SESSION['username'],
                    'subject' => trim($POST['subject']),
                    'date' => trim($POST['date']),
                    'time' => trim($POST['time']),
                    'mountPoint' => trim($POST['mountPoint'])
                ];

                if (empty($temp['subject']) || empty($temp['date']) || empty($temp['time']) || empty($temp['mountPoint'])) {
                    if(empty($temp['subject'])) {
                        $this->data['subjectError'] = 'Please enter a subject.';
                    }

                    if(empty($temp['date'])) {
                        $this->data['dateError'] = 'Please enter a date.';
                    }

                    if(empty($temp['time'])) {
                        $this->data['timeError'] = 'Please enter a time.';
                    }

                    if(empty($temp['mountPoint'])) {
                        $this->data['mountPointError'] = 'Please enter a mount point.';
                    }
                } else {
                    if($this->stationModel->updateStation($temp)) {
                        redirect('welcome');
                    } else {
                        die('Something went wrong');
                    }
                }
            }
        }

        // Función para orquestar la edición de una estación
        public function edit($id) {
            $this->data['station'] = $this->stationModel->getStationById($id);
            $this->addStation();
        }

        // Función para orquestar la eliminación de una estación
        public function delete($id) {
            if($this->stationModel->deleteStation($id)) {
                redirect('welcome');
            } else {
                die('Something went wrong');
            }
        }

        // Función para construir el controlador de bienvenida
        public function welcome() {
            $init = new Core();
            $init->setController('DashboardController', 'welcome');
        }
    }
?>