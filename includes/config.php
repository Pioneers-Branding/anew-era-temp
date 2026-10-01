<?php
/**
 * Site-wide configuration.
 * Edit contact details, brand colours and navigation here — every
 * template reads from this file rather than hard-coding values.
 */

return [
    'name'        => 'Anew Era Health',
    'brand'       => ['Anew', 'Era'],           // split so the two halves can be coloured
    'tagline'     => 'Psychiatry, therapy and TMS for adults and adolescents. In-person and telehealth.',
    // The appointment helpline the practice publishes site-wide. Individual
    // clinics have their own lines in includes/data-locations.php, and those
    // are what the clinic and clinician pages print.
    'phone'       => '(888) 503-1549',
    'phone_href'  => 'tel:+18885031549',

    // No single head office to print: the practice is fifteen clinics, and the
    // footer's own directory lists them. This is the admission window every
    // one of them keeps — each clinic's address, phone and hours are in
    // includes/data-locations.php.
    'hours'       => ['Admissions 6:00am – 6:00pm', 'Monday to Friday'],

    // Kept in step with the 'meta' block in includes/data-reviews.php, which
    // is regenerated from the practice's review export — update both together.
    // Deliberately a count and not an average: the export is five-star reviews
    // only, so any average computed from it would overstate the real one.
    'rating'      => '★ 1,414 five-star reviews',

    'legal'       => 'Copyright © Anew Era Health. All rights reserved. Anew Era is a trading name of Anew Era Health, PLLC. Licensed to provide psychiatric care, therapy and TMS services in the states listed at booking.',

    'colors' => [
        'blue'   => '#0f639b',
        'orange' => '#e8922f',
        'green'  => '#86be52',
        'ink'    => '#14202b',
    ],

    // Primary navigation, rendered in includes/header.php. An item with a
    // 'menu' key opens the dropdown of that name from 'menus' below instead of
    // linking straight through; the same menus build the phone menu. An item
    // is marked current when the page being viewed is its href, or any page
    // in its menu. Anchors (index.php#…) never count as current.
    'nav' => [
        ['label' => 'Home', 'href' => 'index.php'],
        ['label' => 'Our Focus', 'href' => 'index.php#focus'],
        ['label' => 'Treatments', 'href' => 'index.php#treatments'],
        ['label' => 'Conditions', 'href' => 'index.php#conditions'],
        ['label' => 'Reviews', 'href' => 'index.php#reviews'],
        ['label' => 'FAQs', 'href' => 'index.php#faq'],
        ['label' => 'Contact', 'href' => 'contact.php'],
    ],

    // Dropdown contents. 'icon' names a line icon in nav_icon(); 'art' names
    // condition artwork in assets/img/conditions/, the same set the rest of
    // the site uses. Descriptions are kept to one short line — the menu is a
    // signpost, not a summary. 'all' is optional, and 'columns' => 1 stacks a
    // short list instead of leaving a hole in the two-column grid.
    'menus' => [
        'treatments' => [
            'eyebrow' => 'How we treat',
            'all'     => ['label' => 'All Treatments', 'href' => 'treatments.php'],
            'note'    => 'In person and by telehealth. Most insurance accepted.',
            'items'   => [
                ['label' => 'TMS therapy', 'href' => 'tms.php',        'desc' => 'Magnetic stimulation, no medication', 'icon' => 'coil'],
                ['label' => 'Psychiatry',  'href' => 'psychiatry.php', 'desc' => 'Evaluation and medication management', 'icon' => 'stethoscope'],
                ['label' => 'Therapy',     'href' => 'therapy.php',    'desc' => 'CBT, DBT, EMDR and ACT',             'icon' => 'chat'],
                ['label' => 'Telepsychiatry', 'href' => 'telepsychiatry.php', 'desc' => 'The same care, by secure video',      'icon' => 'chat'],
                ['label' => 'Spravato®',   'href' => 'spravato.php',   'desc' => 'Esketamine nasal spray, Texas only',  'icon' => 'spray'],
                ['label' => 'Our TMS system', 'href' => 'magstim-horizon.php', 'desc' => 'The Magstim Horizon® we treat on', 'icon' => 'grid'],
            ],
            'feature' => [
                'kind'    => 'photo',
                'href'    => 'tms.php',
                'image'   => 'nav/tms-feature.jpg',
                'eyebrow' => 'Our lead treatment',
                'title'   => 'TMS therapy',
                'copy'    => 'FDA-cleared, drug-free, and you drive yourself home.',
                'cta'     => 'Explore TMS',
            ],
        ],
        'conditions' => [
            'eyebrow' => 'What we treat',
            'all'     => ['label' => 'All Conditions', 'href' => 'conditions.php'],
            'note'    => 'Every plan starts with a full diagnostic assessment.',
            'items'   => [
                ['label' => 'Depression', 'href' => 'depression.php', 'desc' => 'Including treatment-resistant',  'art' => 'depression'],
                ['label' => 'Anxiety',    'href' => 'anxiety.php',    'desc' => 'Panic, social and generalised',  'art' => 'anxiety'],
                ['label' => 'Postpartum', 'href' => 'postpartum.php', 'desc' => 'Options that fit feeding',       'art' => 'postpartum'],
                ['label' => 'PTSD',       'href' => 'ptsd.php',       'desc' => 'Trauma-focused care',            'art' => 'ptsd'],
                ['label' => 'OCD',        'href' => 'ocd.php',        'desc' => 'ERP therapy and TMS',            'art' => 'ocd'],
                ['label' => 'Tinnitus',   'href' => 'tinnitus.php',   'desc' => 'When the ringing won’t stop',    'art' => 'tinnitus'],
                ['label' => 'Migraines',  'href' => 'migraines.php',  'desc' => 'Coordinated with mood and sleep', 'art' => 'migraines'],
            ],
            'feature' => [
                'kind'    => 'prompt',
                'href'    => 'phq9.php',
                'eyebrow' => 'Not sure where you fit?',
                'title'   => 'Take the PHQ-9',
                'copy'    => 'Two minutes, and a place to start. It is a screening questionnaire, not a diagnosis.',
                'cta'     => 'Start the Questionnaire',
            ],
        ],
        // Locations is the one menu built from groups rather than a flat list
        // of tiles: four regions, each with its clinics under it. See the
        // 'groups' branch in includes/header.php.
        //
        // ⚠ Every href below points at the team page filtered to that region,
        // because no per-location pages exist yet. They are real, relevant
        // destinations in the meantime — who you would be seen by there — and
        // become locations/<clinic>.php the moment those are written.
        'locations' => [
            'eyebrow' => 'Where to find us',
            'note'    => 'Fifteen clinics across California and Texas. Call and we will find your nearest.',
            'groups'  => [
                [
                    'name'  => 'California',
                    'href'  => 'team.php#ca',
                    'desc'  => 'Orange County & Greater LA',
                    'items' => [
                        ['label' => 'Newport Beach',     'href' => 'newport-beach.php'],
                        ['label' => 'Huntington Beach',  'href' => 'huntington-beach.php'],
                        ['label' => 'Laguna Hills',      'href' => 'laguna-hills.php'],
                        ['label' => 'Orange',            'href' => 'orange.php'],
                        ['label' => 'Long Beach',        'href' => 'long-beach.php'],
                        ['label' => 'Torrance',          'href' => 'torrance.php'],
                        ['label' => 'West Los Angeles',  'href' => 'west-los-angeles.php'],
                    ],
                ],
                [
                    'name'  => 'Austin',
                    'href'  => 'team.php#tx',
                    'desc'  => 'Austin & the Hill Country',
                    'items' => [
                        ['label' => 'Central Austin',    'href' => 'central-austin.php'],
                        ['label' => 'Cedar Park',        'href' => 'cedar-park.php'],
                        ['label' => 'Westlake',          'href' => 'westlake.php'],
                    ],
                ],
                [
                    'name'  => 'Dallas',
                    'href'  => 'team.php#tx',
                    'desc'  => 'Dallas & Fort Worth',
                    'items' => [
                        ['label' => 'Central Dallas',    'href' => 'central-dallas.php'],
                        ['label' => 'Allen',             'href' => 'allen.php'],
                        ['label' => 'Grapevine',         'href' => 'grapevine.php'],
                    ],
                ],
                [
                    'name'  => 'Houston',
                    'href'  => 'team.php#tx',
                    'desc'  => 'North and west of the city',
                    'items' => [
                        ['label' => 'Cypress',           'href' => 'cypress.php'],
                        ['label' => 'The Woodlands',     'href' => 'the-woodlands.php'],
                    ],
                ],
            ],
        ],

        'resources' => [
            'eyebrow' => 'Learn more',
            'note'    => 'Questions about care, cost or insurance? Call us.',
            'columns' => 1,
            'items'   => [
                // Blogs is a placeholder until the blog exists.
                ['label' => 'Blogs',   'href' => 'index.php#top',     'desc' => 'Articles on mental health and treatment', 'icon' => 'article'],
                ['label' => 'Insurance', 'href' => 'insurance.php',   'desc' => 'Carriers, coverage and what you will owe', 'icon' => 'shield'],
                ['label' => 'Reviews', 'href' => 'reviews.php',        'desc' => 'What patients say about their care',      'icon' => 'star'],
                ['label' => 'FAQs',    'href' => 'faq.php',           'desc' => 'Insurance, first visits and treatment',   'icon' => 'question'],
            ],
            'feature' => [
                'kind'    => 'prompt',
                'icon'    => 'chat',
                'href'    => 'index.php#book',
                'eyebrow' => 'Still have questions?',
                'title'   => 'Talk to our team',
                'copy'    => 'Most new patients are seen inside a week, and we check your benefits first.',
                'cta'     => 'Book a Consultation',
            ],
        ],
    ],

    // Footer link columns, rendered in includes/footer.php
    'footer_nav' => [
        'Explore' => [
            ['label' => 'Home', 'href' => 'index.php'],
            ['label' => 'Our focus', 'href' => 'index.php#focus'],
            ['label' => 'Treatments', 'href' => 'index.php#treatments'],
            ['label' => 'Conditions', 'href' => 'index.php#conditions'],
        ],
        'Get in touch' => [
            ['label' => 'Contact us', 'href' => 'contact.php'],
            ['label' => 'Book a Visit', 'href' => 'contact.php#message'],
            ['label' => 'FAQs', 'href' => 'index.php#faq'],
        ],
    ],

    // These documents are not part of the initial two-page launch.
    'legal_nav' => [],

    'badges' => ['HIPAA Compliant', 'Licensed Providers'],
];
