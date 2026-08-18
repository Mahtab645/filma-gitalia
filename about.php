<?php
$pageTitle = 'About Us | Filmag Italia';
$pageDescription = 'Filmag Italia is a family-owned manufacturer of seamless butt-weld pipe fittings, founded in Milan in 1959 and based in Rivolta d’Adda.';
include __DIR__ . '/header.php';
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>About Filmag Italia</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Filmag Italia is a company that specializes in manufacturing butt-weld pipe fittings and piping components</p>
    </div>
</section>

<section class="about-origin">
    <div class="container">
        <div class="about-origin-grid">
            <div class="about-origin-media">
                <img src="<?php echo $baseUrl; ?>/images/quality-forge.jpg" alt="Filmag Italia manufacturing of seamless butt-weld fittings">
            </div>
            <div class="about-origin-copy">
                <p class="about-origin-kicker">Our History</p>
                <h2>A Family Tradition of <em>Italian Excellence.</em></h2>
                <p>Filmag was founded in Milan, Italy in 1959 by Filippo Magni. In 1970, the company was moved 20 km east to Rivolta d’Adda, and became Filmag Italia srl.</p>
                <p>Today, Filmag Italia is still a family owned business and is managed by Carlo Magni, the son of the founder. The production plant covers 6.500 m2 (apprx. 71,000 sq feet). Around 40 employees are dedicated to the manufacture of high quality seamless butt-weld pipe fittings for critical applications.</p>
                <p>Our highly automated manufacturing process can produce hot or cold formed fittings in carbon, austenitic, nickel and other special alloys in accordance with ASME/ASTM, EN and other international standards.</p>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
