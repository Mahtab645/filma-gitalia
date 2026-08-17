<?php
require_once __DIR__ . '/includes/products.php';

$slug = wf_request_product_slug();
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
if ($slug && preg_match('#/product\.php$#', $requestPath)) {
    $prefix = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
    if ($prefix === '.' || $prefix === '\\') {
        $prefix = '';
    }
    header('Location: ' . $prefix . '/products/' . rawurlencode($slug) . '/', true, 301);
    exit;
}

$product = wf_get_product($slug);

if (!$product) {
    http_response_code(404);
    $pageTitle = 'Product Not Found | Western Forge & Flange';
    include __DIR__ . '/header.php';
    ?>
    <section class="product-missing">
        <div class="container">
            <h1>Product not found</h1>
            <p>The product you requested is not in our catalog.</p>
            <a class="btn-view-products" href="<?php echo $baseUrl; ?>/index.php#products">View Products</a>
        </div>
    </section>
    <?php
    include __DIR__ . '/footer.php';
    echo '</body></html>';
    exit;
}

$pageTitle = $product['page_title'];
include __DIR__ . '/header.php';

$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$imageSrc = wf_product_image($product['image'], $baseUrl);
$hasSpecs = !empty($product['dimensions']) || !empty($product['alloys']) || !empty($product['certs']);
?>

<section class="product-hero">
    <div class="container">
        <div class="row align-items-center g-4 product-hero-row">
            <div class="col-lg-6">
                <p class="product-hero-label"><?php echo $h($product['category']); ?></p>
                <h1><?php echo $h($product['hero_title']); ?></h1>
            </div>
            <div class="col-lg-6">
                <div class="product-hero-media">
                    <img src="<?php echo $h($imageSrc); ?>" alt="<?php echo $h($product['heading']); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="product-copy">
                    <h2><?php echo $h($product['heading']); ?></h2>
                    <?php foreach ($product['paragraphs'] as $paragraph): ?>
                        <p><?php echo $h($paragraph); ?></p>
                    <?php endforeach; ?>

                    <?php if (!empty($product['groups'])): ?>
                        <div class="product-groups">
                            <?php foreach ($product['groups'] as $group): ?>
                                <div class="product-group">
                                    <h3><?php echo $h($group['title']); ?></h3>
                                    <ul>
                                        <?php foreach ($group['items'] as $item): ?>
                                            <li><?php echo $h($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if ($hasSpecs): ?>
                    <div class="product-spec-wrap">
                        <p class="product-spec-title"><?php echo $h($product['spec_title']); ?></p>
                        <div class="product-spec">
                            <?php if (!empty($product['dimensions'])): ?>
                                <div class="product-spec-row">
                                    <h3>Dimensions</h3>
                                    <div>
                                        <ul>
                                            <?php foreach ($product['dimensions'] as $item): ?>
                                                <li><?php echo $h($item); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php if (!empty($product['dimension_note'])): ?>
                                            <p class="product-spec-note"><?php echo $h($product['dimension_note']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['alloys'])): ?>
                                <div class="product-spec-row">
                                    <h3>Primary Alloys Inventoried</h3>
                                    <div>
                                        <ul>
                                            <?php foreach ($product['alloys'] as $item): ?>
                                                <li><?php echo $h($item); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <p class="product-spec-note">Other material available upon request</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($product['certs'])): ?>
                                <div class="product-spec-row">
                                    <h3>Compliance and Certifications</h3>
                                    <div>
                                        <ul>
                                            <?php foreach ($product['certs'] as $item): ?>
                                                <li><?php echo $h($item); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="cta-box">
                    <h2>Discuss Your Project</h2>
                    <p>Ready to move forward with your project? Take the next step by requesting a quote or talking directly to our experts about industry-specific needs.</p>
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
