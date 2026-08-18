<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Western Forge & Flange';
}
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/'));
$siteRoot = str_replace('\\', '/', realpath(__DIR__) ?: __DIR__);
if ($docRoot && $siteRoot && strpos($siteRoot, $docRoot) === 0) {
    $baseUrl = substr($siteRoot, strlen($docRoot));
} else {
    $baseUrl = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
}
$baseUrl = rtrim(str_replace('\\', '/', (string) $baseUrl), '/');
if ($baseUrl === '.' || $baseUrl === '\\') {
    $baseUrl = '';
}
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$contactHref = $baseUrl . '/contact.php';
require_once __DIR__ . '/includes/products.php';
require_once __DIR__ . '/includes/industries.php';
require_once __DIR__ . '/includes/manufacturing.php';
$currentProductSlug = wf_request_product_slug();
$currentIndustrySlug = wf_request_industry_slug();
$currentStockSlug = wf_request_stock_slug();
$isManufacturingPage = $currentPage === 'manufacturing.php'
    || $currentPage === 'manufacturing-product.php'
    || ($currentStockSlug !== '' && (bool) wf_get_stock_product($currentStockSlug));
if (!isset($isProductsListing)) {
    $isProductsListing = false;
}
if (!isset($isIndustriesListing)) {
    $isIndustriesListing = false;
}
$isProductPage = $isProductsListing || ($currentProductSlug !== '' && (bool) wf_get_product($currentProductSlug));
$isIndustryPage = $isIndustriesListing || ($currentIndustrySlug !== '' && (bool) wf_get_industry($currentIndustrySlug));
if (!isset($pageDescription)) {
    $pageDescription = 'Expertly forged flanges and specialized products, trusted by diverse industries worldwide since 1944.';
}
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $scheme = explode(',', (string) $_SERVER['HTTP_X_FORWARDED_PROTO'])[0];
}
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$siteAbs = $scheme . '://' . $host . $baseUrl;
$canonicalUrl = $scheme . '://' . $host . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$ogImage = isset($ogImage) ? $ogImage : ($siteAbs . '/images/hero.png');
$ogLogo = $siteAbs . '/images/logo.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Western Forge &amp; Flange">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="Western Forge &amp; Flange">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="Western Forge &amp; Flange logo">
    <meta property="og:logo" content="<?php echo htmlspecialchars($ogLogo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <script type="application/ld+json">
    <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Western Forge & Flange',
        'url' => $siteAbs . '/index.php',
        'logo' => $ogLogo,
        'image' => $ogImage,
        'telephone' => '1-800-352-6433',
        'email' => 'sales@western-forge.com',
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="<?php echo $currentPage === 'index.php' ? 'is-home' : 'is-inner'; ?>">
<header class="site-header">
    <div class="header-inner">
        <nav class="header-nav header-nav-left" aria-label="Primary">
            <ul class="header-menu">
                <li class="nav-item">
                    <a class="nav-link<?php echo $currentPage === 'about.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo $currentPage === 'services.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo $isManufacturingPage ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/manufacturing.php">Manufacturing</a>
                </li>
            </ul>
        </nav>

        <a class="header-logo" href="<?php echo $baseUrl; ?>/index.php">
            <img src="<?php echo $baseUrl; ?>/images/logo-white.png" alt="Western Forge &amp; Flange">
        </a>

        <div class="header-nav-end">
            <nav class="header-nav header-nav-right" aria-label="Secondary">
                <ul class="header-menu">
                    <li class="nav-item">
                        <a class="nav-link<?php echo $isIndustryPage ? ' active' : ''; ?>" href="<?php echo wf_industries_listing_url($baseUrl); ?>">References</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $currentPage === 'certifications.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/certifications.php">Certifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $currentPage === 'contact.php' ? ' active' : ''; ?>" href="<?php echo $contactHref; ?>">Contacts</a>
                    </li>
                </ul>
            </nav>
            <button class="navbar-toggler" type="button" id="navToggle" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>

    <div class="navbar-collapse" id="mainNav">
        <div class="mobile-nav-head">
            <p class="mobile-nav-title">Menu</p>
            <button class="nav-close" type="button" id="navClose" aria-label="Close menu">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <ul class="header-menu navbar-nav">
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'about.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'services.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $isManufacturingPage ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/manufacturing.php">Manufacturing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $isIndustryPage ? ' active' : ''; ?>" href="<?php echo wf_industries_listing_url($baseUrl); ?>">References</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'certifications.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/certifications.php">Certifications</a>
            </li>
            <li class="nav-item">
                <a class="btn-contact" href="<?php echo $contactHref; ?>">Contacts</a>
            </li>
        </ul>
    </div>
</header>
<div class="nav-backdrop" id="navBackdrop" hidden></div>
