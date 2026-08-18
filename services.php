<?php
$pageTitle = 'Services | Filmag Italia';
$pageDescription = 'Filmag Italia offers certified fittings, emergency delivery, inspections, and special sizes for critical piping projects.';
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
        <h1>Services</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Emergency delivery, inspections, special sizes, and certified fittings — built around the project in front of us.</p>
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

<section class="cert-compete">
    <div class="container">
        <p class="cert-compete-kicker">Area of competitiveness</p>
        <h2 class="cert-compete-heading"><em>Four</em> strengths. One standard of quality.</h2>

        <div class="cert-compete-grid">
            <?php
            $strengths = [
                [
                    'title' => 'High Quality Fittings',
                    'copy' => 'For us, quality is synonymous with guarantee. For this reason, we use some of the best raw materials internationally.',
                    'icon' => '<svg viewBox="0 0 48 48" fill="none" aria-hidden="true"><circle cx="18" cy="24" r="8" stroke="currentColor" stroke-width="1.7"/><circle cx="30" cy="24" r="8" stroke="currentColor" stroke-width="1.7"/><path d="M18 16v3M18 29v3M11.5 20.5l2.2 1.3M22.3 26.2l2.2 1.3M11.5 27.5l2.2-1.3M22.3 21.8l2.2-1.3M30 16v3M30 29v3M36.5 20.5l-2.2 1.3M25.7 26.2l-2.2 1.3M36.5 27.5l-2.2-1.3M25.7 21.8l-2.2-1.3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
                ],
                [
                    'title' => 'Extensive Quality Inspection Requirements',
                    'copy' => 'Rigid conformity tests are performed for each product, which we can certify upon customer request. Safety is the basis of any job.',
                    'icon' => '<svg viewBox="0 0 48 48" fill="none" aria-hidden="true"><path d="M24 8 12 13.5v9.2c0 8 5.2 14.8 12 17.3 6.8-2.5 12-9.3 12-17.3v-9.2L24 8Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m18.5 24 4 4 7.5-8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                ],
                [
                    'title' => 'Emergency and Critical Delivery',
                    'copy' => 'We know that in order to work well you need efficiency, speed and quality. For all companies that need products in a short time, we are able to meet your expectations. Because customer satisfaction is our primary goal.',
                    'icon' => '<svg viewBox="0 0 48 48" fill="none" aria-hidden="true"><path d="M8 30V18h20v12M28 22h7l5 6v2H28" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><circle cx="15" cy="32" r="3.2" stroke="currentColor" stroke-width="1.7"/><circle cx="35" cy="32" r="3.2" stroke="currentColor" stroke-width="1.7"/><path d="M8 24h12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
                ],
                [
                    'title' => 'Special Sizes and Short Radius Bends',
                    'copy' => 'We are able to create ad hoc products for every need. Each new project is the result of a lot of work and tests in our workshop. Thanks to the experience gained in more than 50 years and the technologies available to us, we are able to satisfy every request.',
                    'icon' => '<svg viewBox="0 0 48 48" fill="none" aria-hidden="true"><path d="M14 30 10 14l10 4 4-8 4 8 10-4-4 16H14Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M18 30v5h12v-5M16 38h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>',
                ],
            ];
            foreach ($strengths as $index => $item):
            ?>
            <article class="cert-compete-card">
                <div class="cert-compete-meta">
                    <span class="cert-compete-icon"><?php echo $item['icon']; ?></span>
                    <span class="cert-compete-num"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
                </div>
                <h3><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars($item['copy'], ENT_QUOTES, 'UTF-8'); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
