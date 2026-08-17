<?php
$pageTitle = 'Products | Western Forge & Flange';
$isProductsListing = true;
include dirname(__DIR__) . '/header.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>

<section class="products-hero">
    <div class="products-hero-overlay"></div>
    <div class="container">
        <div class="row align-items-end g-4 products-hero-row">
            <div class="col-lg-6">
                <div class="products-hero-copy">
                    <h1>Explore Our Flanges and Forgings</h1>
                    <p>Premium forged flanges and specials, delivered fast with a focus on quality.</p>
                    <a class="btn-hero btn-hero-primary" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="products-hero-media">
                    <img src="<?php echo $baseUrl; ?>/images/products-hero-flange.png" alt="Forged industrial flange">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products-listing">
    <div class="container">
        <div class="products-listing-intro">
            <h2>Quality Forged Products</h2>
            <p>Western Forge &amp; Flange has spent over 80 years providing high-quality forged flanges and custom components to demanding clients in heavily regulated industries, including petrochemical and nuclear power generation, as well as national defense. We maintain a large inventory of over 80 premium and exotic U.S.-sourced alloys, enabling us to deliver fast turnaround times, and are certified to ISO 9001:2015. We adhere to numerous civilian and military standards, including holding nuclear certification.</p>
        </div>

        <div class="row g-4 product-card-grid">
            <?php foreach (wf_products() as $item): ?>
            <div class="col-md-6 col-lg-4">
                <a class="product-card" href="<?php echo wf_product_url($item['slug'], $baseUrl); ?>">
                    <span class="product-card-arrow" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M7 17 17 7M9 7h8v8" stroke="#e0393e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <div class="product-card-inner">
                        <img src="<?php echo $h(wf_product_image($item['image'], $baseUrl)); ?>" alt="<?php echo $h($item['heading']); ?>">
                        <h4><?php echo $h($item['heading']); ?></h4>
                    </div>
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
                <h2>Why Our Products Stand Out</h2>
                <p class="trust-lead">Why do companies in the most demanding industries choose Western Forge &amp; Flange to provide their flanges and other key forged components?</p>
                <h3>Here are some reasons:</h3>
                <ul class="trust-list">
                    <li>Fast emergency turnaround times for quotes and delivery of finished products.</li>
                    <li>A wide array of premium stainless and exotic alloys with U.S. melt sourcing.</li>
                    <li>Compliance with ISO 9001:2015, as well as PED, PER, CRN, nuclear, and military certifications.</li>
                    <li>An 80+ year history of proven reliability in the petrochemical, nuclear, marine, military, and power generation markets.</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/quality-forge.jpg" alt="Forging production at Western Forge &amp; Flange">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="split-cta">
    <div class="split-cta-media">
        <img src="<?php echo $baseUrl; ?>/images/qc-forging.jpg" alt="Custom forging press working hot metal">
    </div>
    <div class="split-cta-copy">
        <h2>Need Custom Forging?</h2>
        <p>Western Forge &amp; Flange is capable of producing custom forged components in a variety of forms and premium or exotic alloys, based on drawings or other specifications. This includes prototypes and special designs for demanding roles, such as aerospace applications.</p>
        <a class="btn-view-products" href="<?php echo $baseUrl; ?>/custom-forging.php">Learn About Custom Forging</a>
    </div>
</section>

<section class="quality-standards">
    <div class="container">
        <h2>Backed by Quality Standards</h2>
        <p class="products-quality-lead">When you work with Western Forge &amp; Flange, you’re receiving service backed by numerous industry certifications. Our rigorous, internally led quality program and compliance efforts shape everything we do. By meeting these standards, we’ve become a reliable and trusted supplier across sectors and functions.</p>
        <p class="products-quality-sub">Our quality management system complies with:</p>
        <ul class="quality-standards-list">
            <li>ISO 9001:2015 Standard</li>
            <li>PED 2014/68/EU, Annex I, Section 4.3</li>
            <li>PER Schedule 1A and Schedule 2 Part 4-31 (6) (7) (8)</li>
            <li>NCA3800/4200 ASME SECTION-III (Nuclear)</li>
            <li>NQA-1 (Nuclear)</li>
            <li>CSA N285.0 (Canadian Nuclear)</li>
            <li>CSA B51 (Canadian Non-Nuclear)</li>
            <li>MIL-I-45208A (Military Standard)</li>
            <li>10CFR50 APP-B (Code for Federal Regulation – Nuclear)</li>
            <li>10CFR21 (NRC Regulation)</li>
            <li>DFARS regulatory and statutory requirements</li>
            <li>ITAR</li>
            <li>CFSI</li>
        </ul>
        <div class="quality-standards-cta">
            <a class="btn-hero btn-hero-primary" href="<?php echo $baseUrl; ?>/quality-certifications.php">View Certifications</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="cta-box">
                    <h2>Request a Quote</h2>
                    <p>If you’re ready to launch your next project with forged flanges or custom products from Western Forge &amp; Flange, request a quote today for a fast response and reliable delivery.</p>
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
