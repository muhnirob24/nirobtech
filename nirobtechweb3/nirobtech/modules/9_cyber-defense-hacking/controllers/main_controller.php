<?php
    // Module: Cyber Defense & Hacking Lab - Main Controller
    // Defines actions and loads views for the Cyber Defense & Hacking Lab module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class cyber-defense_Controller {
        private $model;

        public function __construct() {
            $this->model = new cyber-defense_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Cyber Defense & Hacking Lab');
            $data = [
                'module_title' => 'Cyber Defense & Hacking Lab',
                'module_description' => 'Explore malware detection, network tracing, exploit simulation, and firewall bypass techniques for security analysis.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '9_cyber-defense-hacking/assets/js/cyber-defense.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Cyber Defense & Hacking Lab Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Cyber Defense & Hacking Lab Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
