<?php
// Global Configuration for NirobTech Web3 Portal
define('APP_NAME', 'NirobTech Web3 Portal');
define('APP_URL', 'http://localhost/web3/nirobtech/public'); // Adjust for live environment

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nirobtech_web3_db');

// API Keys (Placeholder - Replace with actual keys)
define('METAMASK_API_KEY', 'YOUR_METAMASK_API_KEY');
define('GALXE_API_KEY', 'YOUR_GALXE_API_KEY');
define('IPFS_API_KEY', 'YOUR_IPFS_API_KEY');
define('AI_API_KEY', 'YOUR_AI_API_KEY'); // For AI Bot Assistant

// Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Session Management
session_start();
?>
