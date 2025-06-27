<?php
    // Module: Android Rootless Automation (Termux) - Index View
    // This file renders the main page for the Android Rootless Automation (Termux) module.
    // Data is passed from the controller via the $data array (extracted).

    require_once dirname(__DIR__, 3) . '/_core/header.php'; // Path to global header
    ?>

    <section class="module-section">
        <h2><?php echo $module_title; ?></h2>
        <p><?php echo $module_description; ?></p>
        <p><?php echo $info; ?></p>
        <h3>Module Actions:</h3>
        <ul>
            <li><a href="<?php echo APP_URL; ?>/module/<?php echo $module_route; ?>/create">Create New</a></li>
            <li><a href="<?php echo APP_URL; ?>/module/<?php echo $module_route; ?>/list">View List</a></li>
            <li><a href="<?php echo APP_URL; ?>/module/<?php echo $module_route; ?>/settings">Settings</a></li>
        </ul>
        <?php // Example of including another view ?>
        <?php // include dirname(__DIR__) . '/views/some_component.php'; ?>
    </section>

    <?php require_once dirname(__DIR__, 3) . '/_core/footer.php'; // Path to global footer ?>
