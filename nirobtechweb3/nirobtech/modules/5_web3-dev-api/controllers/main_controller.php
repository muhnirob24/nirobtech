<?php
    // Module: Web3 Developer API & Tools - Main Controller
    // Defines actions and loads views for the Web3 Developer API & Tools module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class web3-dev-api_Controller {
        private $model;

        public function __construct() {
            $this->model = new web3-dev-api_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Web3 Developer API & Tools');
            $data = [
                'module_title' => 'Web3 Developer API & Tools',
                'module_description' => 'Interact with Smart Contracts, NFTs, and tokens using a comprehensive developer toolkit.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '5_web3-dev-api/assets/js/web3-dev-api.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Web3 Developer API & Tools Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Web3 Developer API & Tools Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
