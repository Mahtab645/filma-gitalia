<?php
$pageTitle = 'Forging 101 | Western Forge & Flange';
include __DIR__ . '/header.php';
?>

<section class="page-hero forging-hero">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <h1>Forging 101</h1>
            <p>Forging is a manufacturing process involving the shaping of metal using localized compressive forces. These forces are delivered with a power hammer or press. No other process for working metal can equal forging results in strength and toughness.</p>
            <p>To allow easy functionality and interchangeability, flanges are designed to have standardized dimensions. Common world standards include ASA/ASME (USA), PN/DIN (European), BS10 (British/Australian), and JIS/KS (Japanese/Korean).</p>
            <a class="btn-hero btn-hero-primary" href="<?php echo wf_industries_listing_url($baseUrl); ?>">Explore Industries</a>
        </div>
    </div>
</section>

<section class="forging-flange">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-who-copy forging-flange-copy">
                    <h2>What is a Pipe Flange</h2>
                    <p>A pipe flange functions as a joining mechanism to connect a system of pipes or tubing to various equipment and valves. Typically, two flanges are joined by bolts using a gasket between them for a seal leaving the opposite ends open for welding connections (Figure one). Flanges offer numerous advantages for joining pipe in highly corrosive or maintenance prone facilities. For instance, pipe systems that need to be regularly inspected or are prone to repair can be joined with flanges for quick disassembly. Flanged connections also allow for modifications to be made to the system without needing major fabrication.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media forging-flange-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/forging-101-flange.jpg" alt="Pipe flange">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="forging-quote">
    <div class="container">
        <div class="forging-quote-intro">
            <h2>How to Request a Quotation</h2>
            <h3>Quotation Example</h3>
            <p class="forging-quote-example"><strong>( 6&quot;&nbsp; 150#&nbsp; WN&nbsp; RF&nbsp; Sch160&nbsp; SA182&nbsp; UNS&nbsp; S32205 )</strong></p>
        </div>
        <div class="row forging-quote-grid">
            <div class="col-md-4">
                <div class="forging-quote-card forging-quote-lead">
                    <p>A flange is specified by identifying the following information:</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Size (NPS)</h3>
                    <p>The flange size (NPS) is a designation to define the nominal pipe size of the connecting pipe. The number is not necessarily the same as the flange inside diameter. B16.5 covers &frac12;&quot;-<strong>24&Prime;</strong> NPS flanges, and B16.47 covers <strong>26&Prime;</strong>&ndash;<strong>60&Prime;</strong> flanges.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Type</h3>
                    <p>The type of flange is decided based on the application, with the most common being a Weld Neck <strong>(WN)</strong>, Slip On <strong>(SO)</strong>, Threaded <strong>(Thd)</strong>, Socket Weld <strong>(SW)</strong> or Lap Joint <strong>(LJ)</strong>. A few others include Reducing Flanges <strong>(RED)</strong>, Long Weld Necks <strong>(LWN)</strong> and Stub Ends <strong>(SE)</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Pipe Schedule</h3>
                    <p>This is only for Weld Necks, Socket Welds, Stub Ends, Orifices, and various non-standard flanges where the flange bore must meet that of the pipe. Pipe Schedules range from <strong>SCH 5S</strong> to <strong>XX HVY</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Material</h3>
                    <p>Materials are often called out by their proprietary names (Ex &ndash; Haynes 230). However, UNS numbers are the most common and most universal way to specify a material <strong>(Ex. UNS S32205)</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Pressure Class</h3>
                    <p>This designates the pressure-temperature rating of the flange, which is required for all flanges and covered by ASME B16.5. Examples include classes <strong>150#, 300#, 600#, 900#, 1500#, and 2500#</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Facing</h3>
                    <p>The flange face is the contact surface and used to seat the sealing gasket. ASME B16.5 and B16.47 define various types of flange facing and surface finishes (RMS). Common Facings include Raised Face <strong>(RF)</strong>, Ring-type Joints <strong>(RTJ)</strong>, Flat Face <strong>(FF)</strong> Large Male <strong>(LM)</strong>, Large Female <strong>(LF)</strong>, Large Tongue <strong>(LT)</strong>, and Large Groove <strong>(LG)</strong>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-card">
                    <h3>Standard</h3>
                    <p>The &ldquo;standard&rdquo; or &ldquo;specification&rdquo; refers to a group of common requirements written by a professional association such as the American Society of American Engineers (ASME) or the American Society for Testing and Materials (ASTM). These bodies lay out the material requirements for groups of material grades such as <strong>A182 (ASTM) / SA182 (ASME) or B564 (ASTM) / SB564 (ASME).</strong></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-quote-cta">
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="lpw-brands flange-types" id="flange-types">
    <div class="container">
        <div class="lpw-brands-tablist" role="tablist" aria-label="Flange types">
            <?php
            $flangeSlides = [
                [
                    'tab' => 'Weld Neck Flange',
                    'title' => 'Weld Neck Flanges',
                    'slug' => 'weld-neck-flanges',
                    'image' => 'weld-neck.png',
                    'points' => [
                        'Preferred for high-pressure, subzero or elevated temperatures',
                        'Hub is tapered and bored to match pipe’s inside diameter so flow is not restricted, preventing turbulence and reducing erosion',
                        'Easily radiographed',
                        'Provides excellent stress distribution',
                    ],
                ],
                [
                    'tab' => 'Slip-On Flange',
                    'title' => 'Slip-On Flanges',
                    'slug' => 'slip-on-flanges',
                    'image' => 'slip-on.png',
                    'points' => [
                        'Not normally used in high-stress applications due to low hub and weld attachment',
                        'Slips over outside of pipe',
                        'Inside of flange welded at hub and end of pipe',
                    ],
                ],
                [
                    'tab' => 'Blind Flange',
                    'title' => 'Blind Flanges',
                    'slug' => 'blind-flanges',
                    'image' => 'blind.png',
                    'points' => [
                        'Used to close ends of piping',
                        'Has no bore',
                        'Permits access to sealed lines',
                    ],
                ],
                [
                    'tab' => 'Socketweld Flange',
                    'title' => 'Socket Weld Flanges',
                    'slug' => 'socket-weld-flanges',
                    'image' => 'socket-weld.png',
                    'points' => [
                        'For small-diameter chemical processes, hydraulic and steam distribution lines',
                        'Similar to slip-on flange',
                        'Counter bore matches pipe bore, allowing unrestricted flow',
                        'Counter bore from hub side fits pipe’s outer diameter – can insert pipe in socket with fillet weld at hub',
                    ],
                ],
                [
                    'tab' => 'Threaded Flange',
                    'title' => 'Threaded Flanges',
                    'slug' => 'threaded-flanges',
                    'image' => 'threaded.png',
                    'points' => [
                        'Used where welding would be hazardous',
                        'Designed for low-pressure and non-cyclic applications',
                        'Bore is threaded to match pipe thread',
                        'Tapered to seal pipe and flange',
                    ],
                ],
                [
                    'tab' => 'Lap Joint Flange',
                    'title' => 'Lap Joint Flanges',
                    'slug' => 'lap-joint-flanges',
                    'image' => 'lap-joint.png',
                    'points' => [
                        'Used where bolt alignment or access for cleaning is required',
                        'Similar to slip-on flange when used with lap joint stub end',
                        'Radius at intersection of flange face and bore to match lap joint stub end',
                    ],
                ],
            ];
            foreach ($flangeSlides as $i => $slide):
            ?>
            <button type="button" role="tab" id="flange-tab-<?php echo $i; ?>" aria-controls="flange-panel-<?php echo $i; ?>" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" class="<?php echo $i === 0 ? 'is-active' : ''; ?>" tabindex="<?php echo $i === 0 ? '0' : '-1'; ?>"><span><?php echo htmlspecialchars($slide['tab'], ENT_QUOTES, 'UTF-8'); ?></span></button>
            <?php endforeach; ?>
        </div>

        <div class="lpw-brands-viewport" id="flangeTypesViewport">
            <div class="lpw-brands-track" id="flangeTypesTrack">
                <?php foreach ($flangeSlides as $i => $slide): ?>
                <article class="lpw-brands-slide<?php echo $i === 0 ? ' is-active' : ''; ?>" id="flange-panel-<?php echo $i; ?>" role="tabpanel" aria-labelledby="flange-tab-<?php echo $i; ?>">
                    <div class="row align-items-center g-4 g-lg-5">
                        <div class="col-lg-6">
                            <div class="flange-types-media lpw-brands-media">
                                <img src="<?php echo $baseUrl; ?>/images/products/<?php echo htmlspecialchars($slide['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($slide['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="flange-types-copy lpw-brands-copy">
                                <h3><?php echo htmlspecialchars($slide['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                <ul class="trust-list">
                                    <?php foreach ($slide['points'] as $point): ?>
                                    <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a class="btn-view-products flange-types-btn" href="<?php echo wf_product_url($slide['slug'], $baseUrl); ?>">More Details</a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="lpw-brands-dots" aria-label="Flange type slides">
            <?php foreach ($flangeSlides as $i => $slide): ?>
            <button type="button" class="<?php echo $i === 0 ? 'is-active' : ''; ?>" aria-label="Show <?php echo htmlspecialchars($slide['tab'], ENT_QUOTES, 'UTF-8'); ?>"<?php echo $i === 0 ? ' aria-current="true"' : ''; ?>></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="forging-benefits">
    <div class="container">
        <h2>Benefits of Using a Forged Flange</h2>
        <div class="row forging-benefits-copy">
            <div class="col-lg-6">
                <p>The process of open die forging has long been used to ensure strength, toughness, reliability, and the highest quality in flange manufacturing. Today, with greater demands being made in operating temperatures, loads, and stresses, the reliability of the metal and toughness has become increasingly critical. With the advancements of modern forging and machining, flanges in high grade alloys have excellent tolerance capabilities, superior corrosion resistance, and higher efficiency. Working the material at elevated temperatures achieves recrystallization and grain refinement, which results in greater metallurgical soundness and improved mechanical properties.</p>
            </div>
            <div class="col-lg-6">
                <p>As seen in figure two, properly developed grain flow in forgings closely follows the outline of the flange. In contrast, bar stock and plate have unidirectional grain flow. Any changes in shape will cut the flow lines, exposing grain ends, and render the flange more susceptible to fatigue and corrosion. In addition, because forgings are designed to approximate final part shape, we can make better use of material than parts machined from bar stock or plate. Finally, forging eliminates internal gas pockets and voids in the material that could cause unexpected failure under stress or impact and further increases chemical uniformity throughout the flange.</p>
            </div>
        </div>
        <div class="row forging-benefits-diagrams">
            <div class="col-md-4">
                <div class="forging-benefits-item">
                    <img src="<?php echo $baseUrl; ?>/images/forging-diag-casting.png" alt="Casting grain structure">
                    <h3>Casting</h3>
                    <p>No grain flow</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-benefits-item">
                    <img src="<?php echo $baseUrl; ?>/images/forging-diag-bar-stock.png" alt="Bar stock grain structure">
                    <h3>Bar Stock</h3>
                    <p>Grain flow broken<br>by machining</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forging-benefits-item">
                    <img src="<?php echo $baseUrl; ?>/images/forging-diag-forging.png" alt="Forging grain structure">
                    <h3>Forging</h3>
                    <p>True grain flow</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="forging-rough">
    <div class="container">
        <h2>Rough Forged vs Rough Machined</h2>
        <div class="row align-items-center g-5 forging-rough-row">
            <div class="col-lg-6">
                <div class="about-who-copy">
                    <h3>Rough Forgings</h3>
                    <p>Western Forge &amp; Flange offers rough forgings in a multitude of shapes and sizes for customers to machine into various parts and components outside of flanges. Every rough forging comes with a &ldquo;machining allowance&rdquo; or &ldquo;forging envelope&rdquo; which refers to the amount of stock left on the surface of the forging to be removed by subsequent machining. Depending on the material grade and size of the forging, the envelope will typically range from &frac12;&quot; to 2&quot; (all over) of excess stock to protect the finishing dimensions provided by the customer. One of the main differences between rough forgings and rough machined forgings is that there is not an exact tolerance. As a manufacturer we cannot determine exactly how much overage there will be on the parts, although we try and get as close as possible to the finished dimensions.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-media forging-flange-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/forging-rough-heat.jpg" alt="Hot forging in process">
                </div>
            </div>
        </div>
        <div class="row align-items-center g-5 forging-rough-row">
            <div class="col-lg-6">
                <div class="about-who-media forging-flange-media">
                    <span class="about-who-media-accent" aria-hidden="true"></span>
                    <img src="<?php echo $baseUrl; ?>/images/forging-rough-machined.jpg" alt="Machining a forging">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-who-copy">
                    <h3>Rough Machined Forgings</h3>
                    <p>Often, the customer requests an initial machine pass to remove the top layer of flash or scale that forms during the forging process. Taking off the excess material helps create a more compatible surface (most notably the OD) for our customers equipment, and it gives us the ability to drill out the ID of a cylinder that would otherwise be forged solid. This reduces the customers manufacturing and machining time by reducing heavy cuts and simultaneously decreases transportation costs. When a rough machined forging is quoted there is an agreed upon tolerance between the manufacturer and the customer. This helps eliminate any of the unknown excess dimensions as stated above with the rough forgings. Rough Machined tolerances can be as lenient as &frac12;&quot; but can get as close as 1/32&quot; on all dimensions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="cta-box">
                    <h2>Ready To Get Started?</h2>
                    <p>Once you reach out to Western Forge &amp; Flange, you’ll get the products you need in a hurry. Quick quotes and dependable delivery are part of our promise to you.</p>
                    <a class="btn-view-products" href="<?php echo $baseUrl; ?>/contact.php">Request a Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
