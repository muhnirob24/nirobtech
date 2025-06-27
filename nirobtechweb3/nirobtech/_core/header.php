<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo defined('PAGE_TITLE') ? PAGE_TITLE . ' | ' . APP_NAME : APP_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/assets/css/style.css">
    <link rel="icon" href="<?php echo APP_URL; ?>/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="<?php echo APP_URL; ?>/">NirobTech Web3</a></div>
            <ul>
                <li><a href="<?php echo APP_URL; ?>/module/wallet-identity">Wallet Identity</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/galxe-airdrop">Galxe Automation</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/forensic-lab">Forensic Lab</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/android-rootless">Android Rootless</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/web3-dev-api">Web3 Dev API</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/ai-bot">AI Bot Assistant</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/daily-income">Daily Income</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/blog-publisher">Blog Publisher</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/cyber-defense">Cyber Defense</a></li>
                <li><a href="<?php echo APP_URL; ?>/module/cloud-nft">Cloud NFT Vault</a></li>
                <?php if (Auth::is_logged_in()): ?>
                    <li><a href="<?php echo APP_URL; ?>/admin/dashboard">Admin</a></li>
                    <li><a href="<?php echo APP_URL; ?>/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?php echo APP_URL; ?>/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
