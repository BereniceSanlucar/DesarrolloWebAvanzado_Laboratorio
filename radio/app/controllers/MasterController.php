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
            $init->setController('StationController', 'addStation');
        }

        // Función para prellenar el controlador de edición de estaciones
        public function edit($id) {
            $init = new Core();
            $init->setController('StationController', 'edit', $id);
        }

        // Función para construir el controlador de edición de estaciones
        public function editStation($id) {
            $init = new Core();
            $init->setController('StationController', 'editStation', $id);
        }

        // Función para llamar al controlador de eliminación de estaciones
        public function delete($id) {
            $init = new Core();
            $init->setController('StationController', 'delete', $id);
        }

        // Función para destruir la sesión del usuario
        public function logout() {
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            redirect("login");
        }
    }
?>
