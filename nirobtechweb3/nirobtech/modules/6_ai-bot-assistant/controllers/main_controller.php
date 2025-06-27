<?php
    // Module: AI Bot Assistant - Main Controller
    // Defines actions and loads views for the AI Bot Assistant module.

    require_once dirname(__DIR__) . '/models/main_model.php'; // Include the main model

    class ai-bot_Controller {
        private $model;

        public function __construct() {
            $this->model = new ai-bot_Model(); // Instantiate the model
        }

        // Default action for the module
        public function index() {
            define('PAGE_TITLE', 'AI Bot Assistant');
            $data = [
                'module_title' => 'AI Bot Assistant',
                'module_description' => 'Build and manage intelligent chatbots with Prompt engineering, NLP, and Voice capabilities.',
                'info' => $this->model->getModuleInfo(),
                'module_js_file' => '6_ai-bot-assistant/assets/js/ai-bot.js' // Pass JS file to footer
            ];
            load_view(dirname(__DIR__) . '/views/index.php', $data);
        }

        // Example action: displaying details
        public function details($id) {
            define('PAGE_TITLE', 'AI Bot Assistant Details');
            $details = $this->model->getDetails($id);
            $data = [
                'module_title' => 'AI Bot Assistant Details',
                'details' => $details
            ];
            load_view(dirname(__DIR__) . '/views/details.php', $data);
        }

        // Add other controller actions here (e.g., process_form, generate_report)
    }
    ?>
