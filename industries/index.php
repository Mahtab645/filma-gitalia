<?php
$pageTitle = 'References | Filmag Italia';
$pageDescription = 'Filmag Italia fittings are used in oil & gas, energy generation, nuclear, chemical, and other critical plants worldwide.';
$isIndustriesListing = true;
include dirname(__DIR__) . '/header.php';
require_once dirname(__DIR__) . '/includes/references.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$industries = array_values(wf_industries());
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>References</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Our products are mainly used in oil &amp; gas, especially in refineries, and in energy generation, including thermoelectric and nuclear plants.</p>
    </div>
</section>

<section class="ref-process">
    <div class="container">
        <p class="ref-process-kicker">The Markets</p>
        <h2 class="ref-process-heading"><em>Twelve</em> industries. One standard of quality.</h2>

        <ol class="ref-process-list">
            <?php foreach ($industries as $index => $item): ?>
            <li class="ref-process-item">
                <span class="ref-process-num"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                <h3 class="ref-process-title">
                    <a href="<?php echo wf_industry_url($item['slug'], $baseUrl); ?>"><?php echo $h($item['card']); ?></a>
                </h3>
                <p class="ref-process-copy"><?php echo $h($item['card_text']); ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="ref-short">
    <div class="container">
        <h2 class="ref-short-heading">Short references list</h2>
        <span class="ref-short-rule" aria-hidden="true"></span>

        <div class="ref-short-grid">
            <?php foreach (wf_short_references() as $ref): ?>
            <article class="ref-short-card">
                <h3><?php echo $h($ref['company']); ?></h3>
                <p><?php echo $h($ref['project']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
