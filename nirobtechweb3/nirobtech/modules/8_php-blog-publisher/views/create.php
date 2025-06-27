<?php
    // Module: PHP Blog Publisher - Create View
    require_once dirname(__DIR__, 3) . '/_core/header.php';
    ?>
    <section class="module-section">
        <h2>Create New Item for <?php echo $module_name; ?></h2>
        <form action="<?php echo APP_URL; ?>/module/<?php echo $module_route; ?>/save" method="POST">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required><br><br>
            <button type="submit">Save Item</button>
        </form>
    </section>
    <?php require_once dirname(__DIR__, 3) . '/_core/footer.php'; ?>
