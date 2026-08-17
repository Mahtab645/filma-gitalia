<?php
$pageTitle = 'Industries We Serve | Western Forge & Flange';
$isIndustriesListing = true;
include dirname(__DIR__) . '/header.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>

<section class="industry-hero">
    <div class="industry-hero-overlay"></div>
    <div class="container">
        <div class="industry-hero-copy">
            <h1>Industries We Serve</h1>
            <p>Supplying forged flanges and custom forgings for the most demanding industries worldwide.</p>
            <div class="industry-hero-actions">
                <a class="btn-hero btn-hero-primary" href="<?php echo wf_products_listing_url($baseUrl); ?>">Explore Our Products</a>
                <a class="btn-hero btn-hero-outline" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
            </div>
        </div>
    </div>
</section>

<section class="industries-listing">
    <div class="container">
        <div class="industries-listing-intro">
            <h2>Serving Critical Markets</h2>
            <p>There’s no industrial application too demanding for Western Forge &amp; Flange. Our single-run and multiple-run flanges and custom forgings are used in chemical plants, power generation facilities, shipyards, and other intensive environments.</p>
            <p>With over 80 years of experience, numerous certifications, and U.S. materials-sourcing and inspection processes, we can guarantee the quality needed for these jobs.</p>
        </div>

        <h3 class="industries-listing-sub">Markets We Support</h3>
        <div class="row g-4 industries-card-grid">
            <?php foreach (wf_industries() as $item): ?>
            <div class="col-md-6 col-lg-4">
                <a class="industry-card" href="<?php echo wf_industry_url($item['slug'], $baseUrl); ?>">
                    <h4><?php echo $h($item['card']); ?></h4>
                    <p><?php echo $h($item['card_text']); ?></p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="trust-section products-standout">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2>Why Our Customers Trust Us</h2>
                <p class="trust-lead">Western Forge &amp; Flange is experienced at meeting the most demanding requirements and timelines, with our decades of experience and long list of certifications proving why we’re worthy of our clients’ trust.</p>
                <h3>We can deliver:</h3>
                <ul class="trust-list">
                    <li>Emergency high-speed turnarounds, with quotes in minutes and products delivered within five days.</li>
                    <li>Compliance with ISO 9001, CRN, nuclear, Naval, and many other standards.</li>
                    <li>U.S. materials sourcing and a rigorous inspection process.</li>
                    <li>Over 80 years of experience and proven success in demanding, highly regulated industries.</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/quality-testing.jpg" alt="Quality testing at Western Forge &amp; Flange">
                </div>
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

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
