<?php
    // Module: Web3 Developer API & Tools - Details View
    require_once dirname(__DIR__, 3) . '/_core/header.php';
    ?>
    <section class="module-section">
        <h2><?php echo $module_title; ?></h2>
        <?php if ($details): ?>
            <p>Details for ID: <?php echo $details['id']; ?></p>
            <p>Name: <?php echo $details['name']; ?></p>
        <?php else: ?>
            <p>No details found.</p>
        <?php endif; ?>
    </section>
    <?php require_once dirname(__DIR__, 3) . '/_core/footer.php'; ?>
