<?php
$pageTitle = 'Contact Us | Filmag Italia';

$errors = [];
$success = false;
$old = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'company' => '',
    'country' => '',
    'business_type' => '',
    'quantity' => '',
    'interest' => '',
    'message' => '',
];

function contact_clean($value)
{
    return trim((string) $value);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $unused) {
        $old[$key] = contact_clean($_POST[$key] ?? '');
    }

    $honeypot = contact_clean($_POST['website'] ?? '');

    if ($old['name'] === '') {
        $errors[] = 'Please enter your name.';
    }
    if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($old['company'] === '') {
        $errors[] = 'Please enter your company.';
    }
    if ($old['country'] === '') {
        $errors[] = 'Please enter your country.';
    }
    if ($old['message'] === '') {
        $errors[] = 'Please enter a message.';
    }
    if (empty($_POST['captcha'])) {
        $errors[] = 'Please confirm you are not a robot.';
    }

    $fileName = '';
    $fileTmp = '';
    $fileType = '';
    if (!empty($_FILES['file']['name']) && (int) ($_FILES['file']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        if ((int) $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'The file could not be uploaded. Please try again.';
        } elseif ((int) $_FILES['file']['size'] > 15 * 1024 * 1024) {
            $errors[] = 'The file must be 15 MB or smaller.';
        } else {
            $fileName = basename((string) $_FILES['file']['name']);
            $fileTmp = (string) $_FILES['file']['tmp_name'];
            $fileType = (string) ($_FILES['file']['type'] ?? 'application/octet-stream');
        }
    }

    if ($honeypot !== '') {
        $success = true;
        $old = array_map(static function () {
            return '';
        }, $old);
    } elseif (!$errors) {
        $to = 'sales@western-forge.com';
        $subject = 'Website contact: ' . $old['name'];
        $body = "A new message was submitted from the Contact Us form.\n\n"
            . 'Name: ' . $old['name'] . "\n"
            . 'Email: ' . $old['email'] . "\n"
            . 'Mobile: ' . ($old['phone'] !== '' ? $old['phone'] : '(not provided)') . "\n"
            . 'Company: ' . $old['company'] . "\n"
            . 'Country: ' . $old['country'] . "\n"
            . 'Business type: ' . ($old['business_type'] !== '' ? $old['business_type'] : '(not provided)') . "\n"
            . 'Estimated quantity: ' . ($old['quantity'] !== '' ? $old['quantity'] : '(not provided)') . "\n"
            . 'Products of interest: ' . ($old['interest'] !== '' ? $old['interest'] : '(not provided)') . "\n\n"
            . "Message:\n" . $old['message'] . "\n";

        $fromEmail = filter_var($old['email'], FILTER_SANITIZE_EMAIL);
        $encodedName = '=?UTF-8?B?' . base64_encode($fileName) . '?=';
        $headers = [
            'From: Western Forge Website <noreply@western-forge.com>',
            'Reply-To: ' . $fromEmail,
            'X-Mailer: PHP/' . PHP_VERSION,
        ];

        $sent = false;
        if ($fileTmp !== '' && is_readable($fileTmp)) {
            $boundary = 'bnd_' . md5(uniqid((string) mt_rand(), true));
            $fileData = chunk_split(base64_encode((string) file_get_contents($fileTmp)));
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: multipart/mixed; boundary="' . $boundary . '"';
            $message = '--' . $boundary . "\r\n"
                . "Content-Type: text/plain; charset=UTF-8\r\n"
                . "Content-Transfer-Encoding: 8bit\r\n\r\n"
                . $body . "\r\n"
                . '--' . $boundary . "\r\n"
                . 'Content-Type: ' . $fileType . '; name="' . $encodedName . '"' . "\r\n"
                . "Content-Transfer-Encoding: base64\r\n"
                . 'Content-Disposition: attachment; filename="' . $encodedName . '"' . "\r\n\r\n"
                . $fileData . "\r\n"
                . '--' . $boundary . "--\r\n";
            $sent = @mail($to, $subject, $message, implode("\r\n", $headers));
        } else {
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
            $sent = @mail($to, $subject, $body, implode("\r\n", $headers));
        }

        if ($sent) {
            $success = true;
            $old = array_map(static function () {
                return '';
            }, $old);
        } else {
            $errors[] = 'Your message could not be sent right now. Please call us or email sales@western-forge.com.';
        }
    }
}

include __DIR__ . '/header.php';
?>

<section class="about-hero">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>Contact Filmag Italia</h1>
        <span class="about-hero-rule" aria-hidden="true"></span>
        <p>Have a question or need assistance? Our team is here to help every step of the way.</p>
    </div>
</section>

<section class="contact-intro">
    <div class="container">
        <div class="contact-intro-grid">
            <div class="contact-intro-copy">
                <p class="contact-intro-kicker">Get in Touch</p>
                <h2>We're Here <em>To Help</em></h2>
                <p>Have a question or need assistance? Our team is here to help every step of the way.</p>
            </div>
            <div class="contact-intro-meta">
                <div class="contact-intro-item">
                    <span>Phone</span>
                    <a href="tel:1-800-352-6433">1-800-352-6433</a>
                </div>
                <div class="contact-intro-item">
                    <span>Email</span>
                    <a href="mailto:sales@western-forge.com">sales@western-forge.com</a>
                </div>
            </div>
            <div class="contact-intro-meta">
                <div class="contact-intro-item">
                    <span>WhatsApp</span>
                    <a href="https://wa.me/12817277000" target="_blank" rel="noopener noreferrer">+1 281-727-7000</a>
                </div>
                <div class="contact-intro-item">
                    <span>Plant</span>
                    <p>Rivolta d’Adda, Italy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-page">
    <div class="container">
        <?php if ($success): ?>
            <p class="contact-form-success">Thank you. Your message has been sent, and our team will be in touch shortly.</p>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="contact-form-errors" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form class="contact-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/contact.php', ENT_QUOTES, 'UTF-8'); ?>">
            <div class="visually-hidden" aria-hidden="true">
                <label for="website">Website</label>
                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="contact-form-grid">
                <div class="contact-field">
                    <label for="name">Name <span>*</span></label>
                    <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($old['name'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="email">Email <span>*</span></label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="phone">Mobile number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($old['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="company">Company <span>*</span></label>
                    <input type="text" id="company" name="company" required value="<?php echo htmlspecialchars($old['company'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="country">Country <span>*</span></label>
                    <input type="text" id="country" name="country" required value="<?php echo htmlspecialchars($old['country'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="business_type">Business type</label>
                    <input type="text" id="business_type" name="business_type" value="<?php echo htmlspecialchars($old['business_type'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="quantity">Estimated Quantity</label>
                    <input type="text" id="quantity" name="quantity" value="<?php echo htmlspecialchars($old['quantity'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field">
                    <label for="interest">Products of Interest</label>
                    <input type="text" id="interest" name="interest" value="<?php echo htmlspecialchars($old['interest'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="contact-field contact-field-full">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" required><?php echo htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
            </div>

            <label class="contact-captcha-inline">
                <input type="checkbox" name="captcha" value="1" required>
                <span>I'm not a robot</span>
            </label>

        <button class="contact-submit" type="submit">Send Message</button>
        </form>
    </div>
</section>

<section class="contact-map">
    <iframe
        src="https://maps.google.com/maps?q=Rivolta%20d%27Adda%2C%20Italy&t=&z=13&ie=UTF8&iwloc=&output=embed"
        title="Filmag Italia — Rivolta d’Adda, Italy"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
    </iframe>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
