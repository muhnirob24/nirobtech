<?php
    // Module: PHP Blog Publisher - Main Controller
    // Defines actions and loads views for the PHP Blog Publisher module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class blog-publisher_Controller {
        private $model;

        public function __construct() {
            $this->model = new blog-publisher_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'PHP Blog Publisher');
            $data = [
                'module_title' => 'PHP Blog Publisher',
                'module_description' => 'Create and manage your blog posts with robust SEO optimization, social sharing, and Google AdSense integration.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '8_php-blog-publisher/assets/js/blog-publisher.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'PHP Blog Publisher Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'PHP Blog Publisher Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
