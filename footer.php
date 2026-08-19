<?php if (!empty($isHome)): ?>
<section class="cta-invite">
    <div class="container">
        <p class="cta-invite-kicker">Contact</p>
        <h2>If you require any further information, feel free to contact us</h2>
        <div class="cta-invite-actions">
            <a class="cta-invite-btn" href="<?php echo $contactHref; ?>">Contact Us</a>
        </div>
    </div>
</section>
<?php endif; ?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a class="footer-logo" href="<?php echo $baseUrl; ?>/index.php">
                    <img src="<?php echo $baseUrl; ?>/images/logo.png" alt="Filmag Italia">
                </a>
                <p>Filmag Italia is a company that specializes in manufacturing butt-weld pipe fittings and piping components</p>
            </div>
            <div class="footer-col">
                <h3>About</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo $baseUrl; ?>/about.php">Story</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/company-directory.php">Organization</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/certifications.php">Certifications</a></li>
                    <li><a href="<?php echo wf_industries_listing_url($baseUrl); ?>">References</a></li>
                    <li><a href="<?php echo $contactHref; ?>">Contacts</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Manufacturing</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo $baseUrl; ?>/manufacturing.php">Standard Production</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/manufacturing.php#tailor">Tailor Made Production</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/services.php">Services</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-rule">
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> All rights reserved</p>
            <a class="footer-social" href="#" aria-label="Facebook">
                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="<?php echo $baseUrl; ?>/js/custom.js"></script>

<div class="cookie-banner" id="cookieBanner" hidden>
    <div class="cookie-banner-inner">
        <p>We use cookies to improve your browsing experience on the Filmag Italia website.</p>
        <div class="cookie-banner-actions">
            <button type="button" class="cookie-banner-btn" id="cookieAccept">Accept</button>
            <button type="button" class="cookie-banner-btn cookie-banner-btn-cancel" id="cookieCancel">Cancel</button>
        </div>
    </div>
</div>
