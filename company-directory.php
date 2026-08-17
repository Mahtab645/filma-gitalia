<?php
$pageTitle = 'Company Directory | Western Forge & Flange';

$directory = [
    'executive' => [
        'label' => 'Executive Team',
        'people' => [
            ['name' => 'James Robertson', 'title' => 'President', 'phone' => '281-727-7050', 'fax' => '281-727-7060', 'email' => 'jrobertson@western-forge.com'],
            ['name' => 'Brent Gazay', 'title' => 'VP Commercial Operations', 'phone' => '281-727-7003', 'fax' => '281-727-7060', 'email' => 'bgazay@western-forge.com'],
        ],
    ],
    'sales' => [
        'label' => 'Sales',
        'people' => [
            ['name' => 'Devin Dozier', 'title' => 'Sales Manager – Commercial Sales / Naval & Marine Projects', 'phone' => '281-727-7032', 'fax' => '281-727-7060', 'email' => 'ddozier@western-forge.com'],
            ['name' => 'Julia Santini', 'title' => 'Senior Nuclear & Commercial Sales Specialist', 'phone' => '281-727-7036', 'fax' => '281-727-7060', 'email' => 'jsantini@western-forge.com'],
            ['name' => 'Jorge Mendoza', 'title' => 'Inside Sales', 'phone' => '281-727-7023', 'fax' => '281-727-7060', 'email' => 'jmendoza@western-forge.com'],
            ['name' => 'David Torres', 'title' => 'Inside Sales', 'phone' => '281-727-7014', 'fax' => '281-727-7060', 'email' => 'dtorres@western-forge.com'],
            ['name' => 'Todd Tillotson', 'title' => 'Inside Sales', 'phone' => '281-727-7027', 'fax' => '281-727-7060', 'email' => 'ttillotson@western-forge.com'],
            ['name' => 'Derrick Hollman', 'title' => 'Regional Sales – Gulf Coast', 'phone' => '281-221-6063', 'fax' => '281-727-7060', 'email' => 'dhollman@western-forge.com'],
            ['name' => 'Joshua Venable', 'title' => 'Regional Sales – Northern US / Canada', 'phone' => '832-226-6086', 'fax' => '281-727-7060', 'email' => 'jvenable@western-forge.com'],
            ['name' => 'Travis Roberts', 'title' => 'Regional Sales – West Coast', 'phone' => '360-624-4298', 'fax' => '281-727-7060', 'email' => 'troberts@western-forge.com'],
            ['name' => 'Martha McGreevy', 'title' => 'Order Entry', 'phone' => '281-727-7021', 'fax' => '281-727-7060', 'email' => 'mmcgreevy@western-forge.com'],
            ['name' => 'Jennifer Young', 'title' => 'Order Entry / Sales Assistant', 'phone' => '281-727-7025', 'fax' => '281-727-7060', 'email' => 'jyoung@western-forge.com'],
        ],
    ],
    'quality' => [
        'label' => 'Quality',
        'people' => [
            ['name' => 'Vinu Varghese', 'title' => 'Director of Quality', 'phone' => '281-727-7011', 'fax' => '281-727-7062', 'email' => 'vvarghese@western-forge.com'],
            ['name' => 'Sarah Williams', 'title' => 'Metallurgical Engineer', 'phone' => '281-727-7039', 'fax' => '281-727-7060', 'email' => 'wffquality@western-forge.com'],
            ['name' => 'Karri Adams', 'title' => 'QA Technician', 'phone' => '281-727-7010', 'fax' => '281-727-7060', 'email' => 'wffquality@western-forge.com'],
        ],
    ],
    'accounting' => [
        'label' => 'Accounting',
        'people' => [
            ['name' => 'Clyde Turner', 'title' => 'Controller', 'phone' => '281-727-7005', 'fax' => '281-727-7060', 'email' => 'cturner@western-forge.com'],
            ['name' => 'Sarah Faircloth', 'title' => 'Accounts Receivable', 'phone' => '281-727-7007', 'fax' => '281-727-7062', 'email' => 'sfaircloth@western-forge.com'],
            ['name' => 'Tamara Posey', 'title' => 'Purchasing', 'phone' => '281-727-7026', 'fax' => '281-727-7061', 'email' => 'tposey@western-forge.com'],
            ['name' => 'Paula Hoberg', 'title' => 'Human Resources/Payroll', 'phone' => '281-727-7006', 'fax' => '281-727-7061', 'email' => 'phoberg@western-forge.com'],
            ['name' => 'Brandi Cole', 'title' => 'Accounts Payable', 'phone' => '281-727-7064', 'fax' => '281-727-7061', 'email' => 'bcole@western-forge.com'],
        ],
    ],
];

include __DIR__ . '/header.php';
?>

<section class="contact-hero">
    <div class="container">
        <h1>Staff Directory</h1>
    </div>
</section>

<section class="directory-page">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3">
                <div class="nav flex-column directory-nav" role="tablist" aria-label="Staff departments">
                    <?php $first = true; foreach ($directory as $id => $group): ?>
                        <button class="directory-nav-link<?php echo $first ? ' active' : ''; ?>" id="tab-<?php echo $id; ?>" data-bs-toggle="tab" data-bs-target="#panel-<?php echo $id; ?>" type="button" role="tab" aria-controls="panel-<?php echo $id; ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>"><?php echo htmlspecialchars($group['label'], ENT_QUOTES, 'UTF-8'); ?></button>
                    <?php $first = false; endforeach; ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <?php $first = true; foreach ($directory as $id => $group): ?>
                        <div class="tab-pane fade<?php echo $first ? ' show active' : ''; ?>" id="panel-<?php echo $id; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $id; ?>">
                            <div class="row g-4 g-lg-5">
                                <?php foreach ($group['people'] as $person): ?>
                                    <div class="col-md-6">
                                        <article class="directory-card">
                                            <h2><?php echo htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                            <p class="directory-title"><?php echo htmlspecialchars($person['title'], ENT_QUOTES, 'UTF-8'); ?></p>
                                            <p class="directory-meta">
                                                Ph <?php echo htmlspecialchars($person['phone'], ENT_QUOTES, 'UTF-8'); ?><br>
                                                Fax <?php echo htmlspecialchars($person['fax'], ENT_QUOTES, 'UTF-8'); ?><br>
                                                Email: <a href="mailto:<?php echo htmlspecialchars($person['email'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($person['email'], ENT_QUOTES, 'UTF-8'); ?></a>
                                            </p>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php $first = false; endforeach; ?>
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
