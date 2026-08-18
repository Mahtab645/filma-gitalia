<?php
$pageTitle = 'Custom Forging | Western Forge & Flange';
include __DIR__ . '/header.php';
?>

<section class="page-hero custom-forging-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Custom Forging Solutions</h1>
            <p>Precision parts, prototypes, and specials forged quickly from premium and exotic alloys.</p>
            <a class="btn-hero btn-hero-primary" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
        </div>
    </div>
</section>

<section class="about-who custom-offer">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/custom-offer.png" alt="Custom forged flanges from Western Forge &amp; Flange">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-copy forging-flange-copy">
                    <h2>What We Offer</h2>
                    <p>At Western Forge &amp; Flange, we support fabricators, end-users, and distributors with our custom parts, rough forgings (rings, bars, discs, bars), specials, and prototypes. We pride ourselves on offering high-quality materials, fast turnaround times, and adherence to strict quality control standards. Contact us when you need forgings that meet tight tolerances, have unique dimensions, or need to resist pressure, stress, or extreme temperatures.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center g-5 custom-emergency-row">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="about-who-copy forging-flange-copy">
                    <h2>Emergency Production and Large Contracts</h2>
                    <p>When you’re experiencing costly downtime, you need custom parts in days, not months. Western Forge &amp; Flange’s large inventory of materials allows us to pivot quickly and fulfill your emergency order. Alternatively, we’re just as capable of scaling up to fulfill large, long-term contracts for custom forged components.</p>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/custom-emergency.png" alt="Rows of machined forged discs at Western Forge &amp; Flange">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-apart custom-apps">
    <div class="container">
        <div class="about-apart-intro">
            <h2>Specialized Applications</h2>
            <p>Over our 80+ years in business, Western Forge &amp; Flange has delivered highly specialized parts for applications including:</p>
        </div>
        <ul class="about-compliance-list">
            <li>Heavy-duty flanges and forgings for use in abrasive petrochemical plants.</li>
            <li>Aerospace prototype components for commercial rockets.</li>
            <li>Naval and marine hardware adhering to strict U.S. sourcing requirements.</li>
            <li>Nuclear-standard-compliant forgings for reactor environments.</li>
        </ul>
    </div>
</section>

<section class="custom-shapes">
    <div class="container">
        <?php
        $shapeMaterials = [
            ['label' => 'Hastelloy', 'detail' => 'C276, B3, C22, C-2000, G-30, 230'],
            ['label' => 'Alloy 20', 'detail' => '200/201, 400, 600, 601, 625, 800HT, 825'],
            ['label' => 'AL6XN (N08367)', 'detail' => '904L, 310, 317L, 321, 347'],
            ['label' => 'Duplex Stainless', 'detail' => '2205, 2507, 255'],
            ['label' => 'Titanium', 'detail' => 'Grades 2, 7, and 12'],
            ['label' => 'Aluminum Grades', 'detail' => '1100, 3003, 6061 and 5083'],
            ['label' => 'Chromes-Moly', 'detail' => 'F-5, F-9, F-11 and F-22'],
        ];
        $shapeCerts = 'ISO 9001:2015, PED 2014/68/EU, Canadian Registration Numbers (CRN’s: Nuclear and Non-Nuclear), AIS, NCA3800, 10CFR50, 10CFR21, CSA N285.0, CSA B51, NQA-1, EB2678, MIL-I-45208A, DFARS, NACE, EN 10204 3.1';
        $shapes = [
            ['id' => 'rings', 'title' => 'Rings', 'tab' => 'Custom Rings', 'file' => 'icon-rings.png', 'size' => 'Up to 75″ in Diameter'],
            ['id' => 'discs', 'title' => 'Discs', 'tab' => 'Custom Discs', 'file' => 'icon-discs.png', 'size' => 'Up to 50″ in Diameter'],
            ['id' => 'bars', 'title' => 'Bars', 'tab' => 'Custom Bars', 'file' => 'icon-bars.png', 'size' => 'Up to 48″ in Diameter'],
            ['id' => 'blocks', 'title' => 'Blocks', 'tab' => 'Custom Blocks', 'file' => 'icon-blocks.png', 'size' => 'Up to 2,500 lbs', 'extra' => ['label' => 'Copper Nickel', 'detail' => '70/30, 90/10']],
        ];
        foreach ($shapes as $shape):
            $materials = $shapeMaterials;
            if (!empty($shape['extra'])) {
                array_splice($materials, -1, 0, [$shape['extra']]);
            }
        ?>
        <div class="custom-shape-panel" id="custom-<?php echo htmlspecialchars($shape['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="row custom-shapes-row">
                <div class="col-lg-5">
                    <div class="custom-shape-intro">
                        <h2><?php echo htmlspecialchars($shape['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <img src="<?php echo $baseUrl; ?>/images/<?php echo htmlspecialchars($shape['file'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($shape['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        <p class="custom-shape-size"><?php echo htmlspecialchars($shape['size'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="custom-shape-note">Sizes are dependent on alloy selection and thickness</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="custom-shape-tab"><span><?php echo htmlspecialchars($shape['tab'], ENT_QUOTES, 'UTF-8'); ?></span></p>
                    <div class="custom-shape-box">
                        <div class="custom-shape-row">
                            <h3>Primary Materials Inventoried</h3>
                            <div class="custom-shape-body">
                                <ul>
                                    <?php foreach ($materials as $mat): ?>
                                    <li><strong><?php echo htmlspecialchars($mat['label'], ENT_QUOTES, 'UTF-8'); ?></strong> – <?php echo htmlspecialchars($mat['detail'], ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <p><em>Other material available upon request</em></p>
                            </div>
                        </div>
                        <div class="custom-shape-row">
                            <h3><a href="<?php echo $baseUrl; ?>/certifications.php">Compliance and Certifications</a></h3>
                            <div class="custom-shape-body">
                                <p><?php echo htmlspecialchars($shapeCerts, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="about-journey custom-materials">
    <div class="row g-0 align-items-stretch">
        <div class="col-lg-6 d-flex">
            <div class="about-journey-copy">
                <h2>Materials and Quality Standards</h2>
                <p>Western Forge &amp; Flange offers over 80 materials, including stainless steels, as well as high-nickel and exotic alloys. We are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other key standards, including nuclear and military specifications. Our meticulous internal quality process includes joint inspection in collaboration with <a href="https://pennmachine.com" target="_blank" rel="noopener noreferrer">Penn Machine</a> on select projects.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-journey-media">
                <img src="<?php echo $baseUrl; ?>/images/custom-materials.jpg" alt="Forging operations at the Western Forge &amp; Flange facility">
            </div>
        </div>
    </div>
</section>

<section class="materials-section custom-grades">
    <div class="container">
        <h2>Material Grades</h2>
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <h3>80+ Metals In Stock</h3>
                <p>Take advantage of our inventory of metals including stainless steel and high nickel alloys.</p>
            </div>
            <div class="col-lg-7">
                <ul class="materials-list">
                    <li><strong>Hastelloy</strong> – C276, C22, B3, X, G30, G35</li>
                    <li><strong>Alloy</strong> – 400, 600, 601, 625, 800H/HT, 825, 904L, A20</li>
                    <li><strong>Duplex &amp; Super Duplex</strong> – 2205, 2507, 255</li>
                    <li><strong>Nickel</strong> – 200, 201</li>
                    <li><strong>Titanium</strong> – Grades 2, 7, and 12</li>
                    <li><strong>Aluminum</strong> – 6061, 3003, 5083, 5086</li>
                    <li><strong>Copper Nickel</strong> – 70/30, 90/10</li>
                    <li><strong>Stainless</strong> – 304/H, 310, 316/H, 317, 321/H, 347/H</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="about-who custom-why">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-who-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/custom-why.jpg" alt="Western Forge &amp; Flange team on the plant floor">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-copy forging-flange-copy">
                    <h2>Why Work With Us?</h2>
                    <p>Western Forge &amp; Flange is your ideal partner for forging. We offer:</p>
                    <ul class="about-compliance-list">
                        <li>Decades of forging experience since our founding in 1944.</li>
                        <li>Fast quotes and on-time delivery enabled by our strong inventory.</li>
                        <li>Expertise with special jobs, fast-turnaround prototypes, and large-scale orders.</li>
                        <li>Proven service in the highly regulated and demanding nuclear, petrochemical, marine, defense, power, and aerospace industries.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="custom-resources">
    <div class="container">
        <div class="row align-items-start custom-resources-row">
            <div class="col-lg-6">
                <h2>Helpful Resources and Certifications</h2>
                <p>You can verify that Western Forge &amp; Flange is the right partner for your next demanding custom forging project by reviewing our certifications (including ISO 9001:2015, nuclear, and military standard adherence), available forging dimensions and materials, and content from our Forging 101 section.</p>
            </div>
            <div class="col-lg-6">
                <a class="btn-hero btn-long-outline" href="<?php echo $baseUrl; ?>/index.php#resources">See All Resources</a>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="cta-box">
                    <h2>Start Your Project</h2>
                    <p>If you’re ready to turn your next custom forging project into a reality, request a quote or speak directly to our team to discuss your order.</p>
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
