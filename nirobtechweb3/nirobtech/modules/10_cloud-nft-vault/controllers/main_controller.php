<?php
    // Module: Cloud NFT Vault - Main Controller
    // Defines actions and loads views for the Cloud NFT Vault module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class cloud-nft_Controller {
        private $model;

        public function __construct() {
            $this->model = new cloud-nft_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'Cloud NFT Vault');
            $data = [
                'module_title' => 'Cloud NFT Vault',
                'module_description' => 'Securely store, manage, and tokenize any digital asset using IPFS and blockchain technology.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '10_cloud-nft-vault/assets/js/cloud-nft.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'Cloud NFT Vault Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'Cloud NFT Vault Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
