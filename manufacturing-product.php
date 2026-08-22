<?php
require_once __DIR__ . '/includes/manufacturing.php';

$slug = wf_request_stock_slug();
$product = wf_get_stock_product($slug);

if (!$product) {
    http_response_code(404);
    $pageTitle = 'Product Not Found | Filmag Italia';
    include __DIR__ . '/header.php';
    ?>
    <section class="about-hero">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-content">
            <h1>Product not found</h1>
            <span class="about-hero-rule" aria-hidden="true"></span>
            <p>The fitting you requested is not in our standard production list.</p>
        </div>
    </section>
    <section class="pd-missing">
        <div class="container">
            <a class="pd-missing-btn" href="<?php echo $baseUrl; ?>/manufacturing.php">View Manufacturing</a>
        </div>
    </section>
    <?php
    include __DIR__ . '/footer.php';
    echo '</body></html>';
    exit;
}

$pageTitle = $product['page_title'] ?? ($product['title'] . ' | Filmag Italia');
$pageDescription = $product['meta_description'] ?? $product['description'];
include __DIR__ . '/header.php';

$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$enquireUrl = $contactHref . '?interest=' . rawurlencode($product['title']);
$storyItems = $product['story'] ?? [];
$accordion = $product['accordion'] ?? [];
$related = wf_related_stock_products($product['slug'], 3);
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1><?php echo $h($product['title']); ?></h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p><?php echo $h($product['category']); ?></p>
    </div>
</section>

<section class="pd-page">
    <div class="container">
        <div class="pd-layout">
            <div class="pd-media">
                <div class="pd-media-frame">
                    <img src="<?php echo $h(wf_stock_product_image($product['image'], $baseUrl)); ?>" alt="<?php echo $h($product['title']); ?>">
                </div>
            </div>

            <div class="pd-info">
                <p class="pd-kicker"><?php echo $h($product['category']); ?></p>
                <h2><?php echo $h($product['title']); ?></h2>
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

                <div class="pd-buybox">
                    <p class="pd-buybox-kicker">For industrial &amp; distribution buyers</p>
                    <div class="pd-buybox-meta">
                        <div>
                            <span>Wall Thickness</span>
                            <strong>SCH 10S – XXS</strong>
                        </div>
                        <div>
                            <span>Type</span>
                            <strong>Seamless / Welded</strong>
                        </div>
                        <div>
                            <span>Supply</span>
                            <strong>Worldwide</strong>
                        </div>
                    </div>
                    <div class="pd-buybox-actions">
                        <a class="pd-btn pd-btn-primary" href="<?php echo $h($enquireUrl); ?>">Request a Quote</a>
                        <a class="pd-btn pd-btn-ghost" href="<?php echo $h($enquireUrl); ?>">Technical Enquiry</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($storyItems): ?>
<section class="pd-story">
    <div class="container">
        <p class="pd-story-kicker">Inside the fitting</p>
        <h2 class="pd-story-heading">Engineered for <em>performance</em></h2>
        <ul class="pd-story-grid">
            <?php foreach ($storyItems as $item): ?>
            <li><?php echo $h($item); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<?php if ($accordion): ?>
<section class="pd-acc-section">
    <div class="container">
        <p class="pd-acc-kicker">For industrial &amp; distribution buyers</p>
        <h2 class="pd-acc-heading">Product <em>detail</em></h2>
        <div class="pd-accordion">
            <?php foreach ($accordion as $index => $item): ?>
            <div class="pd-acc-item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                <button type="button" class="pd-acc-trigger" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                    <?php echo $h($item['title']); ?>
                    <span class="pd-acc-icon" aria-hidden="true"></span>
                </button>
                <div class="pd-acc-panel">
                    <?php if (!empty($item['copy'])): ?>
                    <p><?php echo $h($item['copy']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($item['rows'])): ?>
                    <dl class="pd-acc-rows">
                        <?php foreach ($item['rows'] as $row): ?>
                        <div class="pd-acc-row">
                            <dt><?php echo $h($row['label']); ?></dt>
                            <dd><?php echo $h($row['value']); ?></dd>
                        </div>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($related): ?>
<section class="pd-related">
    <div class="container">
        <p class="pd-related-kicker">Continue browsing</p>
        <h2 class="pd-related-heading">Related <em>products</em></h2>
        <div class="collection-grid">
            <?php foreach ($related as $item): ?>
            <a class="collection-card" href="<?php echo $h(wf_stock_product_url($item['slug'], $baseUrl)); ?>">
                <div class="collection-card-media">
                    <img src="<?php echo $h(wf_stock_product_image($item['image'], $baseUrl)); ?>" alt="<?php echo $h($item['title']); ?>">
                </div>
                <h3><?php echo $h($item['title']); ?></h3>
                <ul>
                    <?php foreach ($item['specs'] as $spec): ?>
                    <li><?php echo $h($spec); ?></li>
                    <?php endforeach; ?>
                </ul>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
