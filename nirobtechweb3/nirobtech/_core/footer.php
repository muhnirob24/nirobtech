    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. All rights reserved.</p>
    </footer>
    <script src="<?php echo APP_URL; ?>/assets/js/main.js"></script>
    <script src="<?php echo APP_URL; ?>/assets/js/web3-utils.js"></script>
    <?php if (isset($module_js_file)): ?>
        <script src="<?php echo APP_URL; ?>/modules/<?php echo $module_js_file; ?>"></script>
    <?php endif; ?>
</body>
</html>
