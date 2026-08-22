<?php
$pageTitle = 'References | Filmag Italia';
$pageDescription = 'Filmag Italia fittings are used in oil & gas, energy generation, nuclear, chemical, and other critical plants worldwide.';
$isIndustriesListing = true;
include __DIR__ . '/header.php';
require_once __DIR__ . '/includes/references.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$references = wf_short_references();
$applications = wf_applications();
$counters = wf_reference_counters();
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>References</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Our products are mainly used in oil &amp; gas, especially in refineries, and in energy generation, including thermoelectric and nuclear plants.</p>
    </div>
</section>

<section class="pd-acc-section ref-apps">
    <div class="container">
        <p class="pd-acc-kicker">Applications</p>
        <h2 class="pd-acc-heading">Systems we <em>serve</em></h2>
        <div class="pd-accordion">
            <?php foreach ($applications as $index => $item): ?>
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
    </div>
</section>

<section class="ref-counters">
    <div class="ref-counters-overlay"></div>
    <div class="container">
        <div class="ref-counters-grid">
            <?php foreach ($counters as $item): ?>
            <article class="ref-counter">
                <strong><?php echo $h($item['value']); ?></strong>
                <span><?php echo $h($item['label']); ?></span>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ref-process">
    <div class="container">
        <p class="ref-process-kicker">Our References</p>
        <h2 class="ref-process-heading">Clients on <em>critical</em> plants.</h2>

        <ol class="ref-process-list">
            <?php foreach ($references as $index => $item): ?>
            <li class="ref-process-item">
                <span class="ref-process-num"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                <h3 class="ref-process-title"><?php echo $h($item['company']); ?></h3>
                <p class="ref-process-copy"><?php echo $h($item['project']); ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
