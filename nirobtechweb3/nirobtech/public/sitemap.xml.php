<?php
// Dynamic Sitemap Generation (PHP file, served as XML)
header('Content-Type: application/xml');
require_once dirname(__DIR__) . '/_core/config.php'; // For APP_URL

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo APP_URL; ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo APP_URL; ?>/login</loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <?php
    $modules_routes = [
        'wallet-identity', 'galxe-airdrop', 'forensic-lab', 'android-rootless',
        'web3-dev-api', 'ai-bot', 'daily-income', 'blog-publisher',
        'cyber-defense', 'cloud-nft'
    ];
    foreach ($modules_routes as $route):
    ?>
    <url>
        <loc><?php echo APP_URL; ?>/module/<?php echo $route; ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
    </urlset>
