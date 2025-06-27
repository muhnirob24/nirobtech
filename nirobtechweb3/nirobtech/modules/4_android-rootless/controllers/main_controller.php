<?php
    // Module: Android Rootless Automation (Termux) - Main Controller
    // Defines actions and loads views for the Android Rootless Automation (Termux) module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class android-rootless_Controller {
        private $model;

        public function __construct() {
            $this->model = new android-rootless_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Android Rootless Automation (Termux)');
            $data = [
                'module_title' => 'Android Rootless Automation (Termux)',
                'module_description' => 'Utilize Termux for sensor logging, battery management, and Android API monitoring without root access.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '4_android-rootless/assets/js/android-rootless.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Android Rootless Automation (Termux) Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Android Rootless Automation (Termux) Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
