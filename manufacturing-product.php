<?php
require_once __DIR__ . '/includes/manufacturing.php';

$slug = wf_request_stock_slug();
$product = wf_get_stock_product($slug);

if (!$product) {
    http_response_code(404);
    $pageTitle = 'Product Not Found | Filmag Italia';
    include __DIR__ . '/header.php';
    ?>
    <section class="pd-missing">
        <div class="container">
            <h1>Product not found</h1>
            <p>The fitting you requested is not in our standard production list.</p>
            <a class="pd-missing-btn" href="<?php echo $baseUrl; ?>/manufacturing.php">View Manufacturing</a>
        </div>
    </section>
    <?php
    include __DIR__ . '/footer.php';
    echo '</body></html>';
    exit;
}

$pageTitle = $product['title'] . ' | Filmag Italia';
$pageDescription = $product['description'];
include __DIR__ . '/header.php';

$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$enquireUrl = $contactHref . '?interest=' . rawurlencode($product['title']);
?>

<section class="pd-page">
    <div class="container">
        <div class="pd-layout">
            <div class="pd-media">
                <div class="pd-media-frame">
                    <?php echo $product['icon']; ?>
                </div>
            </div>

            <div class="pd-info">
                <p class="pd-kicker"><?php echo $h($product['category']); ?></p>
                <h1><?php echo $h($product['title']); ?></h1>
                <p class="pd-sku">SKU: <?php echo $h($product['sku']); ?></p>
                <p class="pd-lead"><?php echo $h($product['description']); ?></p>

                <?php if (!empty($product['highlights'])): ?>
                <div class="pd-specs">
                    <?php foreach ($product['highlights'] as $row): ?>
                    <div class="pd-spec">
                        <span><?php echo $h($row['label']); ?></span>
                        <strong><?php echo $h($row['value']); ?></strong>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($product['accordion'])): ?>
                <div class="pd-accordion">
                    <?php foreach ($product['accordion'] as $index => $item): ?>
                    <div class="pd-acc-item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                        <button type="button" class="pd-acc-trigger" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <?php echo $h($item['title']); ?>
                            <span class="pd-acc-icon" aria-hidden="true"></span>
                        </button>
                        <div class="pd-acc-panel">
                            <p><?php echo $h($item['copy']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="pd-buybox">
                    <p class="pd-buybox-kicker">For project enquiries</p>
                    <div class="pd-buybox-meta">
                        <div>
                            <span>MOQ</span>
                            <strong>On request</strong>
                        </div>
                        <div>
                            <span>Lead time</span>
                            <strong>Project based</strong>
                        </div>
                        <div>
                            <span>Export</span>
                            <strong>Worldwide</strong>
                        </div>
                    </div>
                    <div class="pd-buybox-actions">
                        <a class="pd-btn pd-btn-primary" href="<?php echo $h($enquireUrl); ?>">Request Quote</a>
                        <a class="pd-btn pd-btn-ghost" href="<?php echo $h($enquireUrl); ?>">Enquire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
