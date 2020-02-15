<?php
    session_start();
    class DashboardController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Welcome',
            'radioIcon' => 'radio',
            'editIcon' => 'mode_edit',
            'faceIcon' => 'face',
            'eventIcon' => 'insert_invitation',
            'deleteIcon' => 'delete',
            'stations' => ''
        ];

        // Constructor de la clase
        public function __construct() {
            $this->stationModel = $this->model('Station');
        }

        // Función para orquestar la recuperación de estaciones de la BD
        public function welcome() {
            $this->data['stations'] = array_reverse($this->stationModel->getStations());
            $this->view('dashboard', $this->data);
        }
    }
?>