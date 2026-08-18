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


function wf_stock_product_image($file, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/images/' . ltrim((string) $file, '/');
}

function wf_stock_products()
{
    $materials = 'Hot or cold formed in carbon, austenitic stainless, nickel, and other special alloys in accordance with ASME/ASTM, EN and other international standards. Other materials available on request.';
    $inspection = 'Rigid conformity tests and NDE inspections are performed for each product and can be certified on request. Emergency delivery and ocean or air freight are available worldwide.';

    return [
        [
            'slug' => 'return-bend',
            'image' => 'return-bend.jpg',
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
            'story' => [
                '180° compact U-turn',
                'Heater coils and furnace loops',
                'Short, long, or special radius',
                'Seamless construction to ASME B16.9',
            ],
        ],
        [
            'slug' => 'elbow-90',
            'image' => 'elbow90.jpg',
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
            'story' => [
                '90° direction change',
                'Process, power, and petrochemical lines',
                'Short, long, or special radius',
                'Diameters from 1/2" to 36"',
            ],
        ],
        [
            'slug' => 'elbow-45',
            'image' => 'elbow45.jpg',
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
            'story' => [
                '45° change of direction',
                'Gentler flow path where specified',
                'Short, long, or special radius',
                'Same diameter envelope as 90° elbows',
            ],
        ],
        [
            'slug' => 'tee',
            'image' => 'tee.jpg',
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
            'story' => [
                'Equal and reducing branches',
                'High-temperature, high-pressure service',
                'Seamless butt-weld construction',
                'Run and branch diameters to 36"',
            ],
        ],
        [
            'slug' => 'concentric-reducer',
            'image' => 'concentric-reducer.jpg',
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
            'story' => [
                'Aligned pipe centerline',
                'Even flow on vertical runs',
                'Large to small end as specified',
                'Any required wall thickness',
            ],
        ],
        [
            'slug' => 'eccentric-reducer',
            'image' => 'eccentric-reducer.jpg',
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
            'story' => [
                'Flat-on-bottom or flat-on-top',
                'Avoids air pockets and drainage issues',
                'Horizontal line diameter changes',
                'Any required wall thickness',
            ],
        ],
        [
            'slug' => 'cap',
            'image' => 'cap.jpg',
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
            'story' => [
                'Closes line or vessel nozzle ends',
                'Seamless butt-weld construction',
                'ASME B16.9 and DIN 2617',
                'Any required wall thickness',
            ],
        ],
        [
            'slug' => 'outlet',
            'image' => 'outlet.jpg',
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
            'story' => [
                'Branch connections on headers',
                'Butt-weld, socket-weld, or threaded',
                'Any specified pressure rating',
                'Short, long, or special radius',
            ],
        ],
        [
            'slug' => 'flange',
            'image' => 'flange.jpg',
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
            'story' => [
                'Bolted piping and nozzle connections',
                'ASME B16.5 coverage',
                'DIN 2635 through DIN 2527',
                'Any specified pressure rating',
            ],
        ],
        [
            'slug' => 'pipes',
            'image' => 'pipes.jpg',
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
            'story' => [
                'Matched material with Filmag fittings',
                'Same wall and documentation',
                'ASME B31.10 supply',
                'Any specified wall thickness',
            ],
        ],
    ];
}
