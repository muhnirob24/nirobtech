// JavaScript specific to the Cloud NFT Vault module
    document.addEventListener('DOMContentLoaded', () => {
        console.log('<?php echo $module_name; ?> module JS loaded.');

        // Example: Call API on button click
        const testApiButton = document.getElementById('test-<?php echo $module_route; ?>-api');
        if (testApiButton) {
            testApiButton.addEventListener('click', async () => {
                const response = await callModuleApi('<?php echo $module_id; ?>', 'get_info');
                alert(response.data);
            });
        }
    });
