<?php
    // Module: Daily Income Automation - Main Controller
    // Defines actions and loads views for the Daily Income Automation module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class daily-income_Controller {
        private $model;

        public function __construct() {
            $this->model = new daily-income_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Daily Income Automation');
            $data = [
                'module_title' => 'Daily Income Automation',
                'module_description' => 'Set up and manage passive income streams via Cronjob scheduling and API interactions.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '7_daily-income-automation/assets/js/daily-income.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Daily Income Automation Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Daily Income Automation Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
