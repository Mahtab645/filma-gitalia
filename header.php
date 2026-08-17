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
$currentProductSlug = wf_request_product_slug();
$currentIndustrySlug = wf_request_industry_slug();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Roboto:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="<?php echo $currentPage === 'index.php' ? 'is-home' : 'is-inner'; ?>">
<header class="site-header">
    <div class="header-inner">
        <nav class="header-nav header-nav-left" aria-label="Primary">
            <ul class="header-menu">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle<?php echo $isProductPage ? ' active' : ''; ?>" href="<?php echo wf_products_listing_url($baseUrl); ?>" aria-expanded="false">Products</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item dropdown-heading" href="<?php echo wf_products_listing_url($baseUrl); ?>">Products</a></li>
                        <?php foreach (wf_products() as $navProduct): ?>
                        <li><a class="dropdown-item<?php echo $currentProductSlug === $navProduct['slug'] ? ' active' : ''; ?>" href="<?php echo wf_product_url($navProduct['slug'], $baseUrl); ?>"><?php echo htmlspecialchars($navProduct['nav'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo $currentPage === 'custom-forging.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/custom-forging.php">Custom Forging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php echo $currentPage === 'quality-certifications.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/quality-certifications.php">Quality</a>
                </li>
            </ul>
        </nav>

        <a class="header-logo" href="<?php echo $baseUrl; ?>/index.php">
            <img src="<?php echo $baseUrl; ?>/images/logo-white.png" alt="Western Forge &amp; Flange">
        </a>

        <div class="header-nav-end">
            <nav class="header-nav header-nav-right" aria-label="Secondary">
                <ul class="header-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle<?php echo $isIndustryPage ? ' active' : ''; ?>" href="<?php echo wf_industries_listing_url($baseUrl); ?>" aria-expanded="false">Industries</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-heading" href="<?php echo wf_industries_listing_url($baseUrl); ?>">Industries Served</a></li>
                            <?php foreach (wf_industries() as $navIndustry): ?>
                            <li><a class="dropdown-item<?php echo $currentIndustrySlug === $navIndustry['slug'] ? ' active' : ''; ?>" href="<?php echo wf_industry_url($navIndustry['slug'], $baseUrl); ?>"><?php echo htmlspecialchars($navIndustry['nav'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle<?php echo in_array($currentPage, ['about.php', 'careers.php', 'company-directory.php', 'forging-101.php'], true) ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/about.php" aria-expanded="false">About Us</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-heading" href="<?php echo $baseUrl; ?>/about.php">About</a></li>
                            <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/careers.php">Careers</a></li>
                            <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/company-directory.php">Company Directory</a></li>
                            <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/forging-101.php">Forging 101</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $currentPage === 'contact.php' ? ' active' : ''; ?>" href="<?php echo $contactHref; ?>">Contact Us</a>
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle<?php echo $isProductPage ? ' active' : ''; ?>" href="<?php echo wf_products_listing_url($baseUrl); ?>" aria-expanded="false">Products</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item dropdown-heading" href="<?php echo wf_products_listing_url($baseUrl); ?>">Products</a></li>
                    <?php foreach (wf_products() as $navProduct): ?>
                    <li><a class="dropdown-item<?php echo $currentProductSlug === $navProduct['slug'] ? ' active' : ''; ?>" href="<?php echo wf_product_url($navProduct['slug'], $baseUrl); ?>"><?php echo htmlspecialchars($navProduct['nav'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'custom-forging.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/custom-forging.php">Custom Forging</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'quality-certifications.php' ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/quality-certifications.php">Quality &amp; Certifications</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle<?php echo $isIndustryPage ? ' active' : ''; ?>" href="<?php echo wf_industries_listing_url($baseUrl); ?>" aria-expanded="false">Industries</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item dropdown-heading" href="<?php echo wf_industries_listing_url($baseUrl); ?>">Industries Served</a></li>
                    <?php foreach (wf_industries() as $navIndustry): ?>
                    <li><a class="dropdown-item<?php echo $currentIndustrySlug === $navIndustry['slug'] ? ' active' : ''; ?>" href="<?php echo wf_industry_url($navIndustry['slug'], $baseUrl); ?>"><?php echo htmlspecialchars($navIndustry['nav'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle<?php echo in_array($currentPage, ['about.php', 'careers.php', 'company-directory.php', 'forging-101.php'], true) ? ' active' : ''; ?>" href="<?php echo $baseUrl; ?>/about.php" aria-expanded="false">About Us</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item dropdown-heading" href="<?php echo $baseUrl; ?>/about.php">About</a></li>
                    <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/careers.php">Careers</a></li>
                    <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/company-directory.php">Company Directory</a></li>
                    <li><a class="dropdown-item" href="<?php echo $baseUrl; ?>/forging-101.php">Forging 101</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="btn-contact" href="<?php echo $contactHref; ?>">Contact Us</a>
            </li>
        </ul>
    </div>
</header>
<div class="nav-backdrop" id="navBackdrop" hidden></div>
