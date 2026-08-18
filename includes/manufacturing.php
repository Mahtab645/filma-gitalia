<?php

function wf_stock_product_url($slug, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/manufacturing/' . rawurlencode($slug) . '/';
}

function wf_request_stock_slug()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (is_string($path) && preg_match('#/manufacturing/([a-z0-9-]+)/?$#', $path, $matches)) {
        return strtolower($matches[1]);
    }

    $script = basename($_SERVER['SCRIPT_NAME'] ?? '');
    if ($script === 'manufacturing-product.php' && !empty($_GET['slug'])) {
        return strtolower(trim((string) $_GET['slug']));
    }

    return '';
}

function wf_get_stock_product($slug)
{
    $slug = strtolower(trim((string) $slug));
    foreach (wf_stock_products() as $item) {
        if (($item['slug'] ?? '') === $slug) {
            return $item;
        }
    }

    return null;
}

function wf_stock_products()
{
    $ff = 'DM Sans, sans-serif';
    $materials = 'Hot or cold formed in carbon, austenitic stainless, nickel, and other special alloys in accordance with ASME/ASTM, EN and other international standards. Other materials available on request.';
    $inspection = 'Rigid conformity tests and NDE inspections are performed for each product and can be certified on request. Emergency delivery and ocean or air freight are available worldwide.';

    return [
        [
            'slug' => 'return-bend',
            'title' => 'Return Bend',
            'sku' => 'FG-RB-001',
            'category' => 'Standard Production',
            'description' => 'Seamless 180° return bends for heater coils, furnace loops, and process piping where a compact U-turn is required. Produced to ASME and DIN dimensional standards, with short, long, or special radius and any specified wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1" to 12" (33.4mm to 323.9mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2605'],
                ['label' => 'Size range', 'value' => '1" – 12"'],
                ['label' => 'Radius', 'value' => 'SR / LR / Special'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2605 Teil 1 – Teil 2. Materials and documentation can follow ANSI, ASTM, ASME, and DIN as specified on the order.'],
                ['title' => 'Dimensions', 'copy' => 'Outside diameters from 1" to 12" (33.4 mm to 323.9 mm). Short radius, long radius, and special radius are available, with any wall thickness required by the piping class.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v52c0 23.2 18.8 42 42 42s42-18.8 42-42V22" stroke="#111" stroke-width="2.2"/><path d="M70 22v52c0 16.6 13.4 30 30 30s30-13.4 30-30V22" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M130 22h24" stroke="#111" stroke-width="2.2"/><path d="M100 22v118" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="38" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="156" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="104" y="148" fill="#111" font-size="10" font-family="' . $ff . '">O</text></svg>',
        ],
        [
            'slug' => 'elbow-90',
            'title' => 'Elbow 90°',
            'sku' => 'FG-E90-002',
            'category' => 'Standard Production',
            'description' => 'Butt-weld 90° elbows for direction changes in process, power, and petrochemical lines. Stock range covers 1/2" to 36" with short, long, or special radius and any wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2605'],
                ['label' => 'Size range', 'value' => '1/2" – 36"'],
                ['label' => 'Radius', 'value' => 'SR / LR / Special'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2605 Teil 1 – Teil 2, with materials to ANSI, ASTM, ASME, and DIN as required.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 1/2" to 36" (26.7 mm to 914.4 mm). Short radius, long radius, and special radius, any wall thickness.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M52 24v50c0 27.6 22.4 50 50 50h54" stroke="#111" stroke-width="2.2"/><path d="M64 24v50c0 21 17 38 38 38h54" stroke="#111" stroke-width="2.2"/><path d="M40 24h24M156 112v24" stroke="#111" stroke-width="2.2"/><path d="M102 24v50M156 124H102" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="32" y="20" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="162" y="148" fill="#111" font-size="10" font-family="' . $ff . '">B</text><text x="70" y="86" fill="#111" font-size="10" font-family="' . $ff . '">R</text></svg>',
        ],
        [
            'slug' => 'elbow-45',
            'title' => 'Elbow 45°',
            'sku' => 'FG-E45-003',
            'category' => 'Standard Production',
            'description' => 'Butt-weld 45° elbows used where a gentler change of direction is specified. Same diameter envelope as the 90° range, with SR, LR, or special radius and any wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2605'],
                ['label' => 'Size range', 'value' => '1/2" – 36"'],
                ['label' => 'Radius', 'value' => 'SR / LR / Special'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2605 Teil 1 – Teil 2 for 45° butt-weld elbows.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 1/2" to 36" (26.7 mm to 914.4 mm). Short radius, long radius, and special radius, any wall thickness.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v44c0 16 6.5 30.5 18 41.5L122 154" stroke="#111" stroke-width="2.2"/><path d="M70 22v44c0 11.2 4.6 21.4 12.6 29.2L128 148" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M114 147l17 17" stroke="#111" stroke-width="2.2"/><text x="38" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="136" y="168" fill="#111" font-size="10" font-family="' . $ff . '">B</text><text x="62" y="84" fill="#111" font-size="10" font-family="' . $ff . '">C</text></svg>',
        ],
        [
            'slug' => 'tee',
            'title' => 'Tee',
            'sku' => 'FG-TEE-004',
            'category' => 'Standard Production',
            'description' => 'Equal and reducing butt-weld tees for branch connections in high-temperature and high-pressure service. Available from 1/2" to 36" with any wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2615 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2615'],
                ['label' => 'Size range', 'value' => '1/2" – 36"'],
                ['label' => 'Type', 'value' => 'Equal / reducing'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2615 Teil 1 – Teil 2 for seamless butt-weld tees.'],
                ['title' => 'Dimensions', 'copy' => 'Run and branch diameters from 1/2" to 36" (26.7 mm to 914.4 mm), any wall thickness. Equal and reducing tees on request.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M28 70h144M92 70v72M108 70v72" stroke="#111" stroke-width="2.2"/><path d="M28 58v24M172 58v24M80 142h40" stroke="#111" stroke-width="2.2"/><path d="M100 58v96" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="22" y="52" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="174" y="52" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="112" y="164" fill="#111" font-size="10" font-family="' . $ff . '">M</text></svg>',
        ],
        [
            'slug' => 'concentric-reducer',
            'title' => 'Concentric Reducer',
            'sku' => 'FG-CR-005',
            'category' => 'Standard Production',
            'description' => 'Concentric reducers keep the pipe centerline aligned when changing diameter. Used on vertical runs and where even flow around the axis is required, from 1" to 36".',
            'specs' => [
                'ASME B16.9, DIN 2616 Teil 1 – Teil 2',
                'Diameters from 1" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2616'],
                ['label' => 'Size range', 'value' => '1" – 36"'],
                ['label' => 'Type', 'value' => 'Concentric'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2616 Teil 1 – Teil 2.'],
                ['title' => 'Dimensions', 'copy' => 'Large-end diameters from 1" to 36" (26.7 mm to 914.4 mm), any wall thickness. Reducing dimensions to the specified small end.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M24 48h44l56 64h52M24 72h44l56 40h52" stroke="#111" stroke-width="2.2"/><path d="M24 48v24M176 112v40" stroke="#111" stroke-width="2.2"/><text x="16" y="42" fill="#111" font-size="10" font-family="' . $ff . '">D</text><text x="178" y="108" fill="#111" font-size="10" font-family="' . $ff . '">D1</text><text x="96" y="78" fill="#111" font-size="10" font-family="' . $ff . '">H</text></svg>',
        ],
        [
            'slug' => 'eccentric-reducer',
            'title' => 'Eccentric Reducer',
            'sku' => 'FG-ER-006',
            'category' => 'Standard Production',
            'description' => 'Eccentric reducers hold a flat side on the bottom or top of the line to avoid air pockets or drainage issues. Stock sizes from 3/4" to 36" with any wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2616 Teil 1 – Teil 2',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2616'],
                ['label' => 'Size range', 'value' => '3/4" – 36"'],
                ['label' => 'Type', 'value' => 'Eccentric'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2616 Teil 1 – Teil 2 for eccentric reducers.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 3/4" to 36" (26.7 mm to 914.4 mm), any wall thickness. Flat-on-bottom or flat-on-top as specified.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M24 40h48l64 80h40M24 64h48l64 56h40" stroke="#111" stroke-width="2.2"/><path d="M24 40v24M176 120v40" stroke="#111" stroke-width="2.2"/><text x="16" y="34" fill="#111" font-size="10" font-family="' . $ff . '">D</text><text x="178" y="116" fill="#111" font-size="10" font-family="' . $ff . '">D1</text></svg>',
        ],
        [
            'slug' => 'cap',
            'title' => 'Cap',
            'sku' => 'FG-CAP-007',
            'category' => 'Standard Production',
            'description' => 'Butt-weld pipe caps close the end of a line or vessel nozzle. Seamless construction from 3/4" to 36" to ASME B16.9 and DIN 2617, any wall thickness.',
            'specs' => [
                'ASME B16.9, DIN 2617',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.9 / DIN 2617'],
                ['label' => 'Size range', 'value' => '3/4" – 36"'],
                ['label' => 'Type', 'value' => 'Butt-weld cap'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.9 and DIN 2617.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 3/4" to 36" (26.7 mm to 914.4 mm), any wall thickness.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M56 48h88" stroke="#111" stroke-width="2.2"/><path d="M62 48v18c0 36 18 62 38 62s38-26 38-62V48" stroke="#111" stroke-width="2.2"/><path d="M50 48h12M138 48h12" stroke="#111" stroke-width="2.2"/><text x="44" y="42" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
        [
            'slug' => 'outlet',
            'title' => 'Outlet',
            'sku' => 'FG-OUT-008',
            'category' => 'Standard Production',
            'description' => 'Welded outlets for branch connections on headers and process lines. Butt-weld, socket-weld, and threaded ends are available from 3/4" to 36", any rating.',
            'specs' => [
                'ASME B31.1, BW-SW-Threaded',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any rating',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B31.1'],
                ['label' => 'Size range', 'value' => '3/4" – 36"'],
                ['label' => 'Ends', 'value' => 'BW / SW / Threaded'],
                ['label' => 'Rating', 'value' => 'Any rating'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Designed to ASME B31.1. Ends available as butt-weld, socket-weld, or threaded.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 3/4" to 36" (26.7 mm to 914.4 mm). Short radius, long radius, and special radius. Any pressure rating.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M28 78h144M28 102h144" stroke="#111" stroke-width="2.2"/><path d="M88 78v-28h24v28M88 102v28h24v-28" stroke="#111" stroke-width="2.2"/><path d="M28 66v36M172 66v36" stroke="#111" stroke-width="2.2"/><text x="22" y="60" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="118" y="46" fill="#111" font-size="10" font-family="' . $ff . '">B</text></svg>',
        ],
        [
            'slug' => 'flange',
            'title' => 'Flange',
            'sku' => 'FG-FLG-009',
            'category' => 'Standard Production',
            'description' => 'Flanges for bolted connections on piping and equipment nozzles. ASME B16.5 and DIN 2635–2527 coverage from 1" to 36", any rating.',
            'specs' => [
                'ASME B16.5, DIN 2635 – DIN 2527',
                'Diameters from 1" to 36" (26.7mm to 914.4mm)',
                'Any rating',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B16.5 / DIN'],
                ['label' => 'Size range', 'value' => '1" – 36"'],
                ['label' => 'Range', 'value' => 'DIN 2635 – 2527'],
                ['label' => 'Rating', 'value' => 'Any rating'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Manufactured to ASME B16.5 and DIN 2635 through DIN 2527.'],
                ['title' => 'Dimensions', 'copy' => 'Nominal sizes from 1" to 36" (26.7 mm to 914.4 mm), any pressure rating specified on the order.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><circle cx="100" cy="90" r="54" stroke="#111" stroke-width="2.2"/><circle cx="100" cy="90" r="22" stroke="#111" stroke-width="2.2"/><circle cx="100" cy="44" r="5" stroke="#111" stroke-width="1.8"/><circle cx="146" cy="90" r="5" stroke="#111" stroke-width="1.8"/><circle cx="100" cy="136" r="5" stroke="#111" stroke-width="1.8"/><circle cx="54" cy="90" r="5" stroke="#111" stroke-width="1.8"/><text x="126" y="78" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
        [
            'slug' => 'pipes',
            'title' => 'Pipes',
            'sku' => 'FG-PIP-010',
            'category' => 'Standard Production',
            'description' => 'Pipe sections supplied with Filmag fittings for matched material, wall, and documentation. Diameters from 3/4" to 36" with any specified wall thickness.',
            'specs' => [
                'ASME B31.10, DIN 2635 – DIN 2527',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'highlights' => [
                ['label' => 'Standard', 'value' => 'ASME B31.10 / DIN'],
                ['label' => 'Size range', 'value' => '3/4" – 36"'],
                ['label' => 'Range', 'value' => 'DIN 2635 – 2527'],
                ['label' => 'Wall', 'value' => 'Any thickness'],
            ],
            'accordion' => [
                ['title' => 'Standards & codes', 'copy' => 'Supplied to ASME B31.10 and DIN 2635 through DIN 2527 as specified.'],
                ['title' => 'Dimensions', 'copy' => 'Diameters from 3/4" to 36" (26.7 mm to 914.4 mm), any wall thickness.'],
                ['title' => 'Materials', 'copy' => $materials],
                ['title' => 'Inspection & delivery', 'copy' => $inspection],
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><ellipse cx="46" cy="90" rx="16" ry="28" stroke="#111" stroke-width="2.2"/><path d="M46 62h108M46 118h108" stroke="#111" stroke-width="2.2"/><ellipse cx="154" cy="90" rx="16" ry="28" stroke="#111" stroke-width="2.2"/><text x="24" y="54" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
    ];
}
