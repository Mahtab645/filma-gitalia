<?php
$pageTitle = 'Certifications | Filmag Italia';
$pageDescription = 'Filmag Italia is recognised by leading international inspection authorities, including TUV, PED, ISO 9001, Lloyd’s Register, DNV, and ISPESL.';
include __DIR__ . '/header.php';

$certs = [
    [
        'title' => 'TUV',
        'copy' => 'Technischen Überwachungs-Vereine e.V. — German inspection authority for pressure equipment and quality systems.',
    ],
    [
        'title' => 'PED',
        'copy' => 'Pressure Equipment Directive approval for fittings in high-temperature, high-pressure, and safety-critical service.',
    ],
    [
        'title' => 'ISO 9001',
        'copy' => 'Certified quality management covering manufacture and supply of seamless butt-weld fittings.',
    ],
    [
        'title' => 'Lloyd’s Register',
        'copy' => 'Lloyd’s Register of Shipping approval for marine, energy, and process projects worldwide.',
    ],
    [
        'title' => 'Det Norske Veritas',
        'copy' => 'DNV recognition for fittings specified on offshore, energy, and industrial installations.',
    ],
    [
        'title' => 'ISPESL',
        'copy' => 'Istituto per la prevenzione e la sicurezza del Lavoro — Italian safety and pressure-equipment oversight.',
    ],
];
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>Certifications</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Filmag has brought the recognition and approval of the most important international inspection authorities.</p>
    </div>
</section>

<section class="cert-reasons">
    <div class="container">
        <p class="cert-reasons-kicker">Why Filmag Italia</p>
        <h2 class="cert-reasons-heading"><em>Six</em> approvals. Buyers come back.</h2>

        <div class="cert-grid">
            <?php foreach ($certs as $index => $cert): ?>
            <article class="cert-cell">
                <span class="cert-cell-num"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                <h3><?php echo htmlspecialchars($cert['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars($cert['copy'], ENT_QUOTES, 'UTF-8'); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
