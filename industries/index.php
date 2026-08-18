<?php
$pageTitle = 'References | Filmag Italia';
$pageDescription = 'Filmag Italia fittings are used in oil & gas, energy generation, nuclear, chemical, and other critical plants worldwide.';
$isIndustriesListing = true;
include dirname(__DIR__) . '/header.php';
require_once dirname(__DIR__) . '/includes/references.php';
$h = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
$references = wf_short_references();
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>References</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Our products are mainly used in oil &amp; gas, especially in refineries, and in energy generation, including thermoelectric and nuclear plants.</p>
    </div>
</section>

<section class="ref-intro">
    <div class="container">
        <p>Our pipe fittings are used mainly in the chemical, petrochemical and power generation industries. We specialize in applications where high temperature, high pressure and corrosive environments are critical design factors.</p>
        <p>Our clients include most of the top engineering companies in the world. Filmag Italia is known for its technological solutions, product quality, and customer oriented service.</p>
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

<?php include dirname(__DIR__) . '/footer.php'; ?>
</body>
</html>
