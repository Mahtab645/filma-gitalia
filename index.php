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
            $collection = [
                [
                    'title' => 'Return Bend',
                    'specs' => [
                        'ASME B16.9, DIN 2605 Teil 1 - Teil 2',
                        'Diameters from 1" to 12" (33.4mm to 323.9mm)',
                        'SR-LR-Special radius',
                        'Any wall thickness',
                    ],
                    'icon' => 'return-bend',
                ],
                [
                    'title' => 'Elbow 90°',
                    'specs' => [
                        'ASME B16.9, DIN 2605 Teil 1 - Teil 2',
                        'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                        'SR-LR-Special radius',
                        'Any wall thickness',
                    ],
                    'icon' => 'elbow-90',
                ],
                [
                    'title' => 'Elbow 45°',
                    'specs' => [
                        'ASME B16.9, DIN 2605 Teil 1 - Teil 2',
                        'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                        'SR-LR-Special radius',
                        'Any wall thickness',
                    ],
                    'icon' => 'elbow-45',
                ],
                [
                    'title' => 'Tee',
                    'specs' => [
                        'ASME B16.9, DIN 2615 Teil 1 - Teil 2',
                        'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                        'Any wall thickness',
                    ],
                    'icon' => 'tee',
                ],
                [
                    'title' => 'Concentric Reducer',
                    'specs' => [
                        'ASME B16.9, DIN 2616 Teil 1 - Teil 2',
                        'Diameters from 1" to 36" (26.7mm to 914.4mm)',
                        'Any wall thickness',
                    ],
                    'icon' => 'reducer',
                ],
            ];

            $icons = [
                'return-bend' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v52c0 23.2 18.8 42 42 42s42-18.8 42-42V22" stroke="#111" stroke-width="2.2"/><path d="M70 22v52c0 16.6 13.4 30 30 30s30-13.4 30-30V22" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M130 22h24" stroke="#111" stroke-width="2.2"/><path d="M100 22v118" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="38" y="18" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="156" y="18" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="104" y="148" fill="#111" font-size="10" font-family="DM Sans, sans-serif">O</text></svg>',
                'elbow-90' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M52 24v50c0 27.6 22.4 50 50 50h54" stroke="#111" stroke-width="2.2"/><path d="M64 24v50c0 21 17 38 38 38h54" stroke="#111" stroke-width="2.2"/><path d="M40 24h24M156 112v24" stroke="#111" stroke-width="2.2"/><path d="M102 24v50M156 124H102" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="32" y="20" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="162" y="148" fill="#111" font-size="10" font-family="DM Sans, sans-serif">B</text><text x="70" y="86" fill="#111" font-size="10" font-family="DM Sans, sans-serif">R</text></svg>',
                'elbow-45' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v44c0 16 6.5 30.5 18 41.5L122 154" stroke="#111" stroke-width="2.2"/><path d="M70 22v44c0 11.2 4.6 21.4 12.6 29.2L128 148" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M114 147l17 17" stroke="#111" stroke-width="2.2"/><text x="38" y="18" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="136" y="168" fill="#111" font-size="10" font-family="DM Sans, sans-serif">B</text><text x="62" y="84" fill="#111" font-size="10" font-family="DM Sans, sans-serif">C</text></svg>',
                'tee' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M28 70h144M92 70v72M108 70v72" stroke="#111" stroke-width="2.2"/><path d="M28 58v24M172 58v24M80 142h40" stroke="#111" stroke-width="2.2"/><path d="M100 58v96" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="22" y="52" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="174" y="52" fill="#111" font-size="10" font-family="DM Sans, sans-serif">A</text><text x="112" y="164" fill="#111" font-size="10" font-family="DM Sans, sans-serif">M</text></svg>',
                'reducer' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M24 48h44l56 64h52M24 72h44l56 40h52" stroke="#111" stroke-width="2.2"/><path d="M24 48v24M176 112v40" stroke="#111" stroke-width="2.2"/><text x="16" y="42" fill="#111" font-size="10" font-family="DM Sans, sans-serif">D</text><text x="178" y="108" fill="#111" font-size="10" font-family="DM Sans, sans-serif">D1</text><text x="96" y="78" fill="#111" font-size="10" font-family="DM Sans, sans-serif">H</text></svg>',
            ];

            foreach ($collection as $item):
            ?>
            <article class="collection-card">
                <div class="collection-card-media">
                    <?php echo $icons[$item['icon']]; ?>
                </div>
                <h3><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <ul>
                    <?php foreach ($item['specs'] as $spec): ?>
                    <li><?php echo htmlspecialchars($spec, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
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
