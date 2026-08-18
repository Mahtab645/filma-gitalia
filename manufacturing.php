<?php
$pageTitle = 'Manufacturing | Filmag Italia';
$pageDescription = 'Filmag Italia stock and tailor-made butt-weld fittings: return bends, elbows, tees, reducers, caps, outlets, flanges, and pipes to ASME and DIN standards.';
include __DIR__ . '/header.php';
require_once __DIR__ . '/includes/manufacturing.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$products = wf_stock_products();
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>Manufacturing</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Manufacturing &amp; tailor made products</p>
    </div>
</section>

<section class="mfr-intro">
    <div class="container">
        <p>The on stock products include: return bends and elbow 90° with sizes (diameter, thickness and radius) and materials in compliance with international standards as, for example, ANSI standards, ASTM international standards, ASME standards (American Society of Mechanical Engineering), DIN standards.</p>
    </div>
</section>

<section class="mfr-stock">
    <div class="container">
        <p class="mfr-stock-kicker">Our on stock products</p>
        <h2 class="mfr-stock-heading">Standard <em>production</em></h2>

        <div class="collection-grid">
            <?php foreach ($products as $item): ?>
            <a class="collection-card" href="<?php echo $h(wf_stock_product_url($item['slug'], $baseUrl)); ?>">
                <div class="collection-card-media">
                    <?php echo $item['icon']; ?>
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

<section class="mfr-tailor" id="tailor">
    <div class="container">
        <p class="mfr-tailor-kicker">Tailor made</p>
        <h2>Tailor made projects <em>and manufacturing</em></h2>
        <p>Filmag Italia has been producing special pieces for over 50 years. Our strength is the vastness of products that can be made, in the most disparate solutions. We are able to create individual products in the world, and in the shortest possible time. We manage to work a very wide range of materials, for the creation of projects ranging from the simplest to the most important ones. Our team is prepared to be able to analyze and produce each case in the best way and in good times.</p>
        <p>Among these we find: bends, tees, reducers, caps, outlets, flanges, pipes and other products that are made on a case by case basis.</p>
        <a class="mfr-tailor-btn" href="<?php echo $contactHref; ?>">Discover our Tailor Made Projects</a>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
