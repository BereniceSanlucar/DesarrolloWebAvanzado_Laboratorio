<?php
    class MasterController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Login',
            'lockIcon' => 'lock',
            'faceIcon' => 'face',
            'vpnKeyIcon' => 'vpn_key',
            'signupMessage' => "Don't have an account yet?",
            'signupButton' => 'Sign Up',
            'signupLink' => URLROOT . '/signup',
            'loginAction' => URLROOT . '/login',
            'usernameError' => '',
            'passwordError' => ''
        ];

        // Constructor de la clase
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        // Función para orquestar el inicio de sesión
        public function login() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'username' => trim($POST['username']),
                    'password' => trim($POST['password'])
                ];

                if(empty($temp['username']) || empty($temp['password'])) {
                    if(empty($temp['username'])) {
                        $this->data['usernameError'] = 'Please enter username.';
                    }

                    if(empty($temp['password'])) {
                        $this->data['passwordError'] = 'Please enter password.';
                    } 
                } else {
                    if(!($this->userModel->findUsername($temp['username']))) {
                        $this->data['usernameError'] = 'This username is not registered.';
                    } elseif($this->userModel->authenticateUser($temp['username'], $temp['password'])) {
                        $this->createUserSession($temp);
                        return;
                    } else {
                        $this->data['passwordError'] = 'Incorrect password.';
                    }
                }
            } 
            $this->view('login', $this->data);
        }

        // Función para crear la sesión de usuario
        public function createUserSession($user) {
            session_start();
            $_SESSION['username'] = $user['username'];
            redirect('welcome');
        }

        // Función para construir el controlador de registro
        public function signup() {
            $init = new Core();
            $init->setController('SignupController', 'signup');
        }

        // Función para construir el controlador de bienvenida
        public function welcome() {
            $init = new Core();
            $init->setController('DashboardController', 'welcome');
        }

        // Función para construir el controlador de registro de estaciones
        public function addStation() {
            $init = new Core();
            $init->setController('AddStationController', 'addStation');
        }

        // Función para destruir la sesión del usuario
        public function logout() {
            unset($_SESSION['username']);
            session_destroy();
            redirect("welcome");
        }
    }
?>