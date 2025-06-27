<?php
    // Module: Digital Forensic Lab - Main Controller
    // Defines actions and loads views for the Digital Forensic Lab module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class forensic-lab_Controller {
        private $model;

        public function __construct() {
            $this->model = new forensic-lab_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Digital Forensic Lab');
            $data = [
                'module_title' => 'Digital Forensic Lab',
                'module_description' => 'Tools for data recovery, network analysis, hash checking, and system auditing.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '3_forensic-lab/assets/js/forensic-lab.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Digital Forensic Lab Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Digital Forensic Lab Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
