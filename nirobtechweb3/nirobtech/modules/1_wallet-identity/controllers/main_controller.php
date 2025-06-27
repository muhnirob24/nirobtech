<?php
    // Module: Wallet Identity Management - Main Controller
    // Defines actions and loads views for the Wallet Identity Management module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class wallet-identity_Controller {
        private $model;

        public function __construct() {
            $this->model = new wallet-identity_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Wallet Identity Management');
            $data = [
                'module_title' => 'Wallet Identity Management',
                'module_description' => 'Manage your MetaMask, private keys, and encryption for Web3 interactions.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '1_wallet-identity/assets/js/wallet-identity.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Wallet Identity Management Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Wallet Identity Management Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
