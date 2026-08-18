<?php
$pageTitle = 'High-Quality Flanges and Forgings | Western Forge & Flange';
include __DIR__ . '/header.php';
?>

<section class="hero">
    <video class="hero-media" autoplay muted loop playsinline poster="<?php echo $baseUrl; ?>/images/hero.png">
        <source src="<?php echo $baseUrl; ?>/images/hero-video.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">Every Heat. Every Strike. Every Hour</h1>
        <div class="hero-actions">
            <a class="btn-hero-ghost" href="#products">Explore Products</a>
        </div>
    </div>
    <a class="hero-scroll" href="#products" aria-label="Scroll to products">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</section>

<section class="home-collection" id="products">
    <div class="container">
        <div class="collection-head">
            <h2>Manufacturing <em>Products</em></h2>
            <a class="collection-more" href="<?php echo $baseUrl; ?>/manufacturing.php">Explore More</a>
        </div>

        <div class="collection-grid">
            <?php
            $h = static function ($value) {
                return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
            };
            foreach (array_slice(wf_stock_products(), 0, 5) as $item):
            ?>
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

<section class="craft-band">
    <video class="craft-band-media" autoplay muted loop playsinline poster="<?php echo $baseUrl; ?>/images/hero.png">
        <source src="<?php echo $baseUrl; ?>/images/hero-video.mp4" type="video/mp4">
    </video>
    <div class="craft-band-overlay"></div>
    <div class="craft-band-content">
        <h2>The Art of <em>Craft</em></h2>
        <p>Inside the Filmag Works — Bends, Tees, Reducers, Flanges</p>
    </div>
</section>

<section class="trust-cards" id="about">
    <div class="container">
        <h2 class="trust-cards-heading">Why Leading Plants Trust <em>Filmag Italia</em></h2>
        <div class="trust-cards-grid">
            <article class="trust-card">
                <span class="trust-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none">
                        <circle cx="17" cy="16" r="5" stroke="currentColor" stroke-width="1.8"/>
                        <circle cx="31" cy="16" r="5" stroke="currentColor" stroke-width="1.8"/>
                        <circle cx="24" cy="15" r="5.5" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M8 38c1.2-6 5.2-9 9-9s7.8 3 9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M22 38c1.2-6 5.2-9 9-9s7.8 3 9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </span>
                <h3>About our company</h3>
                <p>Filmag was founded in Milan, Italy in 1959 by Filippo Magni and has been operating since then in the fittings and piping components industry. In 1970, the company was moved 20 km east to Rivolta d'Adda, and became Filmag Italia srl.</p>
                <a class="trust-card-btn" href="<?php echo $baseUrl; ?>/about.php">Our Company</a>
            </article>
            <article class="trust-card">
                <span class="trust-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none">
                        <circle cx="18" cy="18" r="8" stroke="currentColor" stroke-width="1.8"/>
                        <circle cx="31" cy="31" r="6.5" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M18 10v2.5M18 23.5V26M10 18h2.5M23.5 18H26M12.4 12.4l1.8 1.8M21.8 21.8l1.8 1.8M12.4 23.6l1.8-1.8M21.8 14.2l1.8-1.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </span>
                <h3>Services &amp; Areas</h3>
                <p>We offer different services based on specific needs for each case. Among these there is emergency delivery, ocean or air freight anywhere in the world, all types of mechanical tests and NDE inspections, calculations and drawings of fittings on a case by case basis.</p>
                <a class="trust-card-btn" href="<?php echo $baseUrl; ?>/services.php">Our Services</a>
            </article>
            <article class="trust-card">
                <span class="trust-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none">
                        <rect x="11" y="8" width="26" height="32" rx="2" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M18 16h12M18 22h12M18 28h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="31" cy="33" r="5" fill="#fff" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M31 30.5v5M28.5 33h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                </span>
                <h3>Certifications</h3>
                <p>The general policy of our organization is to guarantee an exceptionally high quality product. Filmag has brought the recognition and approval of the most important international supervisory authorities. Among these we find TUV, PED, ADW0, ISO9001 and many others.</p>
                <a class="trust-card-btn" href="<?php echo $baseUrl; ?>/certifications.php">Our Certifications</a>
            </article>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
