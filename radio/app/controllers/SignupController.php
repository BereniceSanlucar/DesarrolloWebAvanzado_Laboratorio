<?php
    class SignupController extends Controller {
        // Creación del arreglo con los datos a ser transmitidos hacia la vista
        private $data = [
            'title' => 'Sign Up',
            'lockIcon' => 'lock',
            'emailIcon' => 'email',
            'faceIcon' => 'face',
            'vpnKeyIcon' => 'vpn_key',
            'loginMessage' => 'Do you already have an account?',
            'loginButton' => 'Log In',
            'loginLink' => URLROOT . '/login',
            'signupAction' => URLROOT . '/signup',
            'emailError' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];
        
        // Constructor de la clase
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        // Función para orquestar el registro de usuario
        public function signup() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $temp = [
                    'email' => trim($POST['email']),
                    'username' => trim($POST['username']),
                    'password' => trim($POST['password'])
                ];

                if(empty($temp['email']) || empty($temp['username']) || empty($temp['password'])) {
                    if(empty($temp['email'])) {
                        $this->data['emailError'] = 'Please enter email.';
                    } 
                    
                    if(empty($temp['username'])) {
                        $this->data['usernameError'] = 'Please enter username.';
                    } 

                    if(empty($temp['password'])) {
                        $this->data['passwordError'] = 'Please enter password.';
                    } 
                } else {
                    if($this->userModel->findEmail($temp['email'])) {
                        $this->data['emailError'] = 'This email is already taken.';
                    } elseif($this->userModel->findUsername($temp['username'])) {
                        $this->data['usernameError'] = 'This username is already taken.';
                    } elseif(strlen($temp['password']) < 8) {
                        $this->data['passwordError'] = 'Password must have at least 8 characters.';
                    } else {
                        $temp['password'] = password_hash($temp['password'], PASSWORD_DEFAULT);
                        if($this->userModel->saveUser($temp)) {
                           redirect('login');
                        } else {
                            die('Something went wrong');
                        }
                    }
                }
            } 
            $this->view('signup', $this->data);
        }

        // Función para construir el controlador de inicio de sesión
        public function login() {
            $init = new Core();
            $init->setController();
        }
    }
?>