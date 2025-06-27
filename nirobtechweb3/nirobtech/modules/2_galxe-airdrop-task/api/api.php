<?php
    // Module: Galxe Airdrop Automation - API Endpoint
    // Handles AJAX requests for Galxe Airdrop Automation module.
    header('Content-Type: application/json');
    require_once dirname(__DIR__, 3) . '/_core/config.php';
    require_once dirname(__DIR__, 3) . '/_core/helpers.php';
    require_once dirname(__DIR__) . '/models/main_model.php'; // Include module's main model

    $response = ['status' => 'error', 'message' => 'Invalid API request'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
        $action = sanitize_input($_GET['action']);
        $model = new galxe-airdrop_Model(); // Instantiate the module's model

        switch ($action) {
            case 'get_info':
                $response = ['status' => 'success', 'data' => $model->getModuleInfo()];
                break;
            case 'get_details':
                $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                $response = ['status' => 'success', 'data' => $model->getDetails($id)];
                break;
            // Add more GET API actions specific to Galxe Airdrop Automation
            default:
                $response['message'] = 'Unknown GET action.';
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = sanitize_input($_POST['action']);
        $model = new galxe-airdrop_Model();

        switch ($action) {
            case 'save_item':
                $item_name = sanitize_input($_POST['item_name']);
                // Example: $model->saveItem($item_name);
                $response = ['status' => 'success', 'message' => 'Item saved (simulated).', 'item_name' => $item_name];
                break;
            // Add more POST API actions specific to Galxe Airdrop Automation
            default:
                $response['message'] = 'Unknown POST action.';
        }
    }

    echo json_encode($response);
    ?>
