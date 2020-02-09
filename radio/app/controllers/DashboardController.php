<?php
    class DashboardController extends Controller {
        public function __construct() {

        }

        public function welcome() {
            $data = [
                'title' => 'Welcome'
            ];
            $this->view('dashboard', $data);
        }
    }
?>