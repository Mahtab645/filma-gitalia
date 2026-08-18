<?php

function wf_stock_products()
{
    $ff = 'DM Sans, sans-serif';

    return [
        [
            'title' => 'Return Bend',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1" to 12" (33.4mm to 323.9mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v52c0 23.2 18.8 42 42 42s42-18.8 42-42V22" stroke="#111" stroke-width="2.2"/><path d="M70 22v52c0 16.6 13.4 30 30 30s30-13.4 30-30V22" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M130 22h24" stroke="#111" stroke-width="2.2"/><path d="M100 22v118" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="38" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="156" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="104" y="148" fill="#111" font-size="10" font-family="' . $ff . '">O</text></svg>',
        ],
        [
            'title' => 'Elbow 90°',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M52 24v50c0 27.6 22.4 50 50 50h54" stroke="#111" stroke-width="2.2"/><path d="M64 24v50c0 21 17 38 38 38h54" stroke="#111" stroke-width="2.2"/><path d="M40 24h24M156 112v24" stroke="#111" stroke-width="2.2"/><path d="M102 24v50M156 124H102" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="32" y="20" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="162" y="148" fill="#111" font-size="10" font-family="' . $ff . '">B</text><text x="70" y="86" fill="#111" font-size="10" font-family="' . $ff . '">R</text></svg>',
        ],
        [
            'title' => 'Elbow 45°',
            'specs' => [
                'ASME B16.9, DIN 2605 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M58 22v44c0 16 6.5 30.5 18 41.5L122 154" stroke="#111" stroke-width="2.2"/><path d="M70 22v44c0 11.2 4.6 21.4 12.6 29.2L128 148" stroke="#111" stroke-width="2.2"/><path d="M46 22h24M114 147l17 17" stroke="#111" stroke-width="2.2"/><text x="38" y="18" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="136" y="168" fill="#111" font-size="10" font-family="' . $ff . '">B</text><text x="62" y="84" fill="#111" font-size="10" font-family="' . $ff . '">C</text></svg>',
        ],
        [
            'title' => 'Tee',
            'specs' => [
                'ASME B16.9, DIN 2615 Teil 1 – Teil 2',
                'Diameters from 1/2" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M28 70h144M92 70v72M108 70v72" stroke="#111" stroke-width="2.2"/><path d="M28 58v24M172 58v24M80 142h40" stroke="#111" stroke-width="2.2"/><path d="M100 58v96" stroke="#111" stroke-width="1" stroke-dasharray="3 3"/><text x="22" y="52" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="174" y="52" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="112" y="164" fill="#111" font-size="10" font-family="' . $ff . '">M</text></svg>',
        ],
        [
            'title' => 'Concentric Reducer',
            'specs' => [
                'ASME B16.9, DIN 2616 Teil 1 – Teil 2',
                'Diameters from 1" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M24 48h44l56 64h52M24 72h44l56 40h52" stroke="#111" stroke-width="2.2"/><path d="M24 48v24M176 112v40" stroke="#111" stroke-width="2.2"/><text x="16" y="42" fill="#111" font-size="10" font-family="' . $ff . '">D</text><text x="178" y="108" fill="#111" font-size="10" font-family="' . $ff . '">D1</text><text x="96" y="78" fill="#111" font-size="10" font-family="' . $ff . '">H</text></svg>',
        ],
        [
            'title' => 'Eccentric Reducer',
            'specs' => [
                'ASME B16.9, DIN 2616 Teil 1 – Teil 2',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M24 40h48l64 80h40M24 64h48l64 56h40" stroke="#111" stroke-width="2.2"/><path d="M24 40v24M176 120v40" stroke="#111" stroke-width="2.2"/><text x="16" y="34" fill="#111" font-size="10" font-family="' . $ff . '">D</text><text x="178" y="116" fill="#111" font-size="10" font-family="' . $ff . '">D1</text></svg>',
        ],
        [
            'title' => 'Cap',
            'specs' => [
                'ASME B16.9, DIN 2617',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M56 48h88" stroke="#111" stroke-width="2.2"/><path d="M62 48v18c0 36 18 62 38 62s38-26 38-62V48" stroke="#111" stroke-width="2.2"/><path d="M50 48h12M138 48h12" stroke="#111" stroke-width="2.2"/><text x="44" y="42" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
        [
            'title' => 'Outlet',
            'specs' => [
                'ASME B31.1, BW-SW-Threaded',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'SR-LR-Special radius',
                'Any rating',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><path d="M28 78h144M28 102h144" stroke="#111" stroke-width="2.2"/><path d="M88 78v-28h24v28M88 102v28h24v-28" stroke="#111" stroke-width="2.2"/><path d="M28 66v36M172 66v36" stroke="#111" stroke-width="2.2"/><text x="22" y="60" fill="#111" font-size="10" font-family="' . $ff . '">A</text><text x="118" y="46" fill="#111" font-size="10" font-family="' . $ff . '">B</text></svg>',
        ],
        [
            'title' => 'Flange',
            'specs' => [
                'ASME B16.5, DIN 2635 – DIN 2527',
                'Diameters from 1" to 36" (26.7mm to 914.4mm)',
                'Any rating',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><circle cx="100" cy="90" r="54" stroke="#111" stroke-width="2.2"/><circle cx="100" cy="90" r="22" stroke="#111" stroke-width="2.2"/><circle cx="100" cy="44" r="5" stroke="#111" stroke-width="1.8"/><circle cx="146" cy="90" r="5" stroke="#111" stroke-width="1.8"/><circle cx="100" cy="136" r="5" stroke="#111" stroke-width="1.8"/><circle cx="54" cy="90" r="5" stroke="#111" stroke-width="1.8"/><text x="126" y="78" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
        [
            'title' => 'Pipes',
            'specs' => [
                'ASME B31.10, DIN 2635 – DIN 2527',
                'Diameters from 3/4" to 36" (26.7mm to 914.4mm)',
                'Any wall thickness',
            ],
            'icon' => '<svg viewBox="0 0 200 180" fill="none" aria-hidden="true"><ellipse cx="46" cy="90" rx="16" ry="28" stroke="#111" stroke-width="2.2"/><path d="M46 62h108M46 118h108" stroke="#111" stroke-width="2.2"/><ellipse cx="154" cy="90" rx="16" ry="28" stroke="#111" stroke-width="2.2"/><text x="24" y="54" fill="#111" font-size="10" font-family="' . $ff . '">D</text></svg>',
        ],
    ];
}
