<?php
$pageTitle = 'Contact Us | Western Forge & Flange';

$inquiryTypes = [
    'General Inquiry',
    'Quote Request',
    'Product Support',
    'Other',
];

$errors = [];
$success = false;
$old = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone' => '',
    'company' => '',
    'inquiry_type' => '',
    'message' => '',
    'consent' => '',
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

    if ($old['first_name'] === '') {
        $errors[] = 'Please enter your first name.';
    }
    if ($old['last_name'] === '') {
        $errors[] = 'Please enter your last name.';
    }
    if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($old['phone'] === '') {
        $errors[] = 'Please enter your phone number.';
    }
    if (!in_array($old['inquiry_type'], $inquiryTypes, true)) {
        $errors[] = 'Please select an inquiry type.';
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
        $subject = 'Website contact: ' . $old['inquiry_type'];
        $body = "A new message was submitted from the Contact Us form.\n\n"
            . 'First name: ' . $old['first_name'] . "\n"
            . 'Last name: ' . $old['last_name'] . "\n"
            . 'Email: ' . $old['email'] . "\n"
            . 'Phone: ' . $old['phone'] . "\n"
            . 'Company: ' . ($old['company'] !== '' ? $old['company'] : '(not provided)') . "\n"
            . 'Inquiry type: ' . $old['inquiry_type'] . "\n"
            . 'Marketing consent: ' . ($old['consent'] !== '' ? 'Yes' : 'No') . "\n\n"
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

<section class="contact-hero">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>

<section class="contact-page">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="contact-info">
                    <h2>Contact Our Experts</h2>
                    <p>Have a question, need a quote, or require product support? Use the form to connect with our team—just select your inquiry type, and we’ll respond promptly with the information you need.</p>
                    <ul class="contact-details">
                        <li>
                            <span class="contact-detail-icon" aria-hidden="true">
                                <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.605 7.275 7.948 6.169c-.198-.162-.628-.339-1.119-.068l-.787.435c-.311-.255-.921-.772-1.313-1.189l-.036-.03C4.241 4.889 3.724 4.276 3.469 3.963L3.904 3.173c.268-.491.091-.919-.068-1.116L2.72.387C2.461.025 2.11-.026 1.92.005 1.548.05.946.551.51.961-.059 1.467-.013 1.963.014 2.11c.21 1.463 1.228 3.123 2.938 4.798l.079.077c1.7 1.713 3.302 2.688 4.757 2.9.035.008.094.015.165.015.225 0 .6-.079.977-.501.417-.446.918-1.045.964-1.42.03-.19-.02-.542-.392-.807l.005.003Zm-.361.716c-.048.145-.4.603-.772.997-.238.269-.413.256-.41.261-.03-.013-.018-.005-.05-.01-.889-.127-2.364-.694-4.341-2.686l-.106-.103C1.912 4.826.946 3.272.766 1.991c0-.013 0-.015 0-.015.0-.008-.023-.185.256-.44C1.409 1.156 1.864.804 2.011.756h.013c.012.003.043.02.07.061l1.119 1.675c.01.015.023.03.035.046.081.101.116.101.025.266L2.679 3.816c-.073.134-.061.298.035.42.033.043.82 1.032 1.443 1.607.577.625 1.569 1.412 1.609 1.445.119.096.286.109.42.035l1.01-.559c.147-.081.24-.03.276-.005.013.01.023.02.038.028l1.665 1.111c.051.035.069.066.071.078v.013l-.003.002Z" fill="#fff"/><path d="M7.353 4.344h.759A2.99 2.99 0 0 0 5.513 1.74l-.017.76a2.24 2.24 0 0 1 1.857 1.844Z" fill="#fff"/><path d="M8.621 4.271h.759A4.07 4.07 0 0 0 5.556.47l-.02.76a3.32 3.32 0 0 1 3.085 3.041Z" fill="#fff"/></svg>
                            </span>
                            <span>
                                <a href="tel:1-800-352-6433">1-800-352-6433</a>
                                <a href="tel:281-727-7000">281-727-7000</a>
                            </span>
                        </li>
                        <li>
                            <span class="contact-detail-icon" aria-hidden="true">
                                <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 0.417A3.21 3.21 0 0 0 1.792 3.625c0 1.967 2.875 5.75 2.998 5.908.077.1.343.1.42 0 .123-.158 3-3.941 3-5.908A3.21 3.21 0 0 0 5 .417Zm0 4.625a1.79 1.79 0 1 1 0-3.583 1.79 1.79 0 0 1 0 3.583Z" fill="#fff"/></svg>
                            </span>
                            <a href="https://maps.google.com/?q=687+County+Road+2201+Cleveland+TX+77327" target="_blank" rel="noopener noreferrer">687 County Road 2201 Cleveland, TX 77327 USA</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-form-box">
                    <h2>Get In Touch</h2>

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

                    <form class="contact-form" method="post" action="<?php echo htmlspecialchars($baseUrl . '/contact.php', ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">
                        <div class="visually-hidden" aria-hidden="true">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="visually-hidden" for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="First Name*" required value="<?php echo htmlspecialchars($old['first_name'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="visually-hidden" for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name*" required value="<?php echo htmlspecialchars($old['last_name'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="visually-hidden" for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email*" required value="<?php echo htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="visually-hidden" for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" placeholder="Phone*" required value="<?php echo htmlspecialchars($old['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="visually-hidden" for="company">Company Name</label>
                                <input type="text" id="company" name="company" placeholder="Company Name" value="<?php echo htmlspecialchars($old['company'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="visually-hidden" for="inquiry_type">Inquiry Type</label>
                                <select id="inquiry_type" name="inquiry_type" required>
                                    <option value="" disabled <?php echo $old['inquiry_type'] === '' ? 'selected' : ''; ?>>Inquiry Type*</option>
                                    <?php foreach ($inquiryTypes as $type): ?>
                                        <option value="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $old['inquiry_type'] === $type ? 'selected' : ''; ?>><?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="visually-hidden" for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Message" required><?php echo htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                            </div>
                            <div class="col-12">
                                <p class="contact-field-label">File</p>
                                <input type="file" id="file" name="file">
                                <p class="contact-file-hint">Max. file size: 15 MB.</p>
                            </div>
                            <div class="col-12">
                                <p class="contact-field-label">Consent</p>
                                <label class="contact-consent">
                                    <input type="checkbox" name="consent" value="1" <?php echo $old['consent'] !== '' ? 'checked' : ''; ?>>
                                    <span>I agree to receive future email marketing communications from Western Forge &amp; Flange, including product updates, case studies, and other news.</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <p class="contact-field-label">CAPTCHA</p>
                                <label class="contact-captcha">
                                    <input type="checkbox" name="captcha" value="1" required>
                                    <span>I'm not a robot</span>
                                    <span class="contact-captcha-badge" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#1a73e8" stroke-width="1.8"/><path d="M8 12.2 10.6 15 16 9.2" stroke="#34a853" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </span>
                                </label>
                            </div>
                            <div class="col-12">
                                <button class="btn-view-products" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
