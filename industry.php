<?php
require_once __DIR__ . '/includes/industries.php';
require_once __DIR__ . '/includes/products.php';

$slug = wf_request_industry_slug();
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
if ($slug && preg_match('#/industry\.php$#', $requestPath)) {
    $prefix = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
    if ($prefix === '.' || $prefix === '\\') {
        $prefix = '';
    }
    header('Location: ' . $prefix . '/industries/' . rawurlencode($slug) . '/', true, 301);
    exit;
}

$industry = wf_get_industry($slug);

if (!$industry) {
    http_response_code(404);
    $pageTitle = 'Industry Not Found | Western Forge & Flange';
    include __DIR__ . '/header.php';
    ?>
    <section class="product-missing">
        <div class="container">
            <h1>Industry not found</h1>
            <p>The industry you requested is not in our list.</p>
            <a class="btn-view-products" href="<?php echo wf_industries_listing_url($baseUrl); ?>">View References</a>
        </div>
    </section>
    <?php
    include __DIR__ . '/footer.php';
    echo '</body></html>';
    exit;
}

$pageTitle = $industry['page_title'];
include __DIR__ . '/header.php';

$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1><?php echo $h($industry['card']); ?></h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p><?php echo $h($industry['hero_subtitle']); ?></p>
    </div>
</section>

<section class="industry-split">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="industry-split-copy">
                    <h2><?php echo $h($industry['about_title']); ?></h2>
                    <p><?php echo $h($industry['about']); ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/industries/about.jpg" alt="<?php echo $h($industry['card']); ?> operations">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industry-split is-alt">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/industries/experience.jpg" alt="Western Forge &amp; Flange facility">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="industry-split-copy">
                    <h2>Our Experience</h2>
                    <p><?php echo $h($industry['experience']); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industry-split">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="industry-split-copy">
                    <h2>Quality and Compliance</h2>
                    <p><?php echo $h($industry['quality']); ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/industries/quality.jpg" alt="Quality testing at Western Forge &amp; Flange">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industry-split">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/industries/why.jpg" alt="Forging press at Western Forge &amp; Flange">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="industry-split-copy">
                    <h2>Why Work With Us?</h2>
                    <p><?php echo $h($industry['why_intro']); ?></p>
                    <ul class="trust-list">
                        <?php foreach ($industry['why'] as $item): ?>
                            <li><?php echo $h($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="industry-split industry-related">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="industry-split-copy">
                    <h2>Explore Related Solutions</h2>
                    <p><?php echo $h($industry['related']); ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="resource-links">
                    <a href="<?php echo wf_products_listing_url($baseUrl); ?>">View Products <span aria-hidden="true">&rarr;</span></a>
                    <a href="<?php echo $baseUrl; ?>/custom-forging.php">See Custom Forging <span aria-hidden="true">&rarr;</span></a>
                    <a href="<?php echo $baseUrl; ?>/quality-certifications.php">Review Certifications <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section industry-cta">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="cta-box">
                    <h2>Request a Quote</h2>
                    <p><?php echo $h($industry['cta']); ?></p>
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
