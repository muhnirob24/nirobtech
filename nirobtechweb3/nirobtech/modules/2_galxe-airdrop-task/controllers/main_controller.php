<?php
    // Module: Galxe Airdrop Automation - Main Controller
    // Defines actions and loads views for the Galxe Airdrop Automation module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class galxe-airdrop_Controller {
        private $model;

        public function __construct() {
            $this->model = new galxe-airdrop_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Galxe Airdrop Automation');
            $data = [
                'module_title' => 'Galxe Airdrop Automation',
                'module_description' => 'Automate your Galxe tasks and campaigns for efficient income generation.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '2_galxe-airdrop-task/assets/js/galxe-airdrop.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Galxe Airdrop Automation Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Galxe Airdrop Automation Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
