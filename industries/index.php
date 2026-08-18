<?php
$pageTitle = 'References | Filmag Italia';
$pageDescription = 'Filmag Italia fittings are used in oil & gas, energy generation, nuclear, chemical, and other critical plants worldwide.';
$isIndustriesListing = true;
include dirname(__DIR__) . '/header.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>References</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Our products are mainly used in oil &amp; gas, especially in refineries, and in energy generation, including thermoelectric and nuclear plants.</p>
    </div>
</section>

<section class="industries-listing">
    <div class="container">
        <div class="industries-listing-intro">
            <h2>Markets We Serve</h2>
            <p>Filmag Italia manufactures seamless butt-weld fittings and piping components for demanding industrial applications. These are the markets where our products are specified and installed.</p>
        </div>

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

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
