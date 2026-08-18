<?php
$pageTitle = 'Certifications | Filmag Italia';
$pageDescription = 'Filmag Italia is recognised by leading international inspection authorities including TUV, ISPESL, DNV, Lloyd’s Register, and others.';
include __DIR__ . '/header.php';

$authoritiesLeft = [
    'Technischen Überwachungs Vereine eV. (TUV)',
    'Dienst Voor Het (Stoomwezen)',
    'Istituto per la prevenzione e la sicurezza del Lavoro (ISPESL)',
    'Det Norske Veritas',
    'Lloyd’s Register of Shipping',
    'ESSO',
];

$authoritiesRight = [
    'General Safety Service Division Boilers Branch - Alberta, Canada',
    'Ministry of Consumer and Commercial relation, Boiler and Pressure Vessel Branch, Toronto, Canada',
    'Ministry of Labour - Safety Engineering Services Division - British Columbia',
];

$bullet = '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2.5 13.4 8.2 19 7.1 15.4 11.3 20.5 14.2 14.6 14.8 15.2 20.5 12 16.4 8.8 20.5 9.4 14.8 3.5 14.2 8.6 11.3 5 7.1 10.6 8.2 12 2.5Z" fill="currentColor"/></svg>';
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>Certifications</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Filmag has brought the recognition and approval of the most important international inspection authorities.</p>
    </div>
</section>

<section class="cert-authorities">
    <div class="container">
        <p class="cert-authorities-kicker">Our Certifications</p>
        <h2 class="cert-authorities-heading">International <em>inspection</em> authorities.</h2>
        <p class="cert-authorities-lead">Filmag have brought the recognition and approval of the most important International Inspection Authorities.</p>

        <div class="cert-authorities-grid">
            <ul class="cert-authorities-list">
                <?php foreach ($authoritiesLeft as $item): ?>
                <li>
                    <span class="cert-authorities-bullet"><?php echo $bullet; ?></span>
                    <span><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <ul class="cert-authorities-list">
                <?php foreach ($authoritiesRight as $item): ?>
                <li>
                    <span class="cert-authorities-bullet"><?php echo $bullet; ?></span>
                    <span><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
