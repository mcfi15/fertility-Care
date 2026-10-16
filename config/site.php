<?php

/**
 * Site identity / branding / global content blocks.
 *
 * The admin panel renders these definitions automatically (Admin ▸ Site
 * Settings), and the public site reads them through the `setting()` helper or
 * `SettingService`, both of which are cached.
 *
 * `default` is the fallback used when the field has never been saved, so the
 * site works with an empty site_settings table and an admin can always see the
 * live value before editing it.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Site identity & contact details
    |--------------------------------------------------------------------------
    */
    'identity' => [
        'site_name'        => ['label' => 'Website name / app title', 'type' => 'text', 'default' => 'FertilityCare Centers of Nigeria'],
        'site_tagline'     => ['label' => 'Tagline', 'type' => 'text', 'default' => 'Creighton Model & NaProTECHNOLOGY'],
        'site_url'         => ['label' => 'Canonical website URL', 'type' => 'text', 'default' => 'https://fccnig.org/'],

        'contact_email'    => ['label' => 'Primary contact email', 'type' => 'text', 'default' => 'info@fccnig.org'],
        'support_email'    => ['label' => 'Secondary support email', 'type' => 'text', 'default' => 'support@fccnig.org'],
        'contact_receiver_email' => ['label' => 'Contact Form Receiving Email', 'type' => 'text', 'default' => 'info@fccnig.org'],
        'contact_phone'    => ['label' => 'Primary phone number', 'type' => 'text', 'default' => ''],
        'support_phone'    => ['label' => 'Secondary phone number', 'type' => 'text', 'default' => ''],
        'address'          => ['label' => 'Physical office / business address', 'type' => 'textarea', 'default' => ''],

        'facebook_url'     => ['label' => 'Facebook URL', 'type' => 'text', 'default' => ''],
        'instagram_url'    => ['label' => 'Instagram URL', 'type' => 'text', 'default' => ''],
        'youtube_url'      => ['label' => 'YouTube URL', 'type' => 'text', 'default' => ''],
        'twitter_url'      => ['label' => 'X / Twitter URL', 'type' => 'text', 'default' => ''],
        'linkedin_url'     => ['label' => 'LinkedIn URL', 'type' => 'text', 'default' => ''],

        'footer_about'     => ['label' => 'Footer short description', 'type' => 'textarea', 'default' => 'We teach women and couples to read the signs of their cycle with the Creighton Model, and we support their reproductive health alongside a network of professionals in restorative medicine across Nigeria.'],
        'footer_copyright' => ['label' => 'Footer copyright line', 'type' => 'text', 'default' => '© 2026 FertilityCare Centers of Nigeria'],

        'meta_description' => ['label' => 'Default meta description', 'type' => 'textarea', 'default' => 'We teach women and couples to read the signs of their cycle with the Creighton Model, and we support their reproductive health alongside a network of professionals in restorative medicine across Nigeria.'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Branding uploads (logo / favicon)
    |--------------------------------------------------------------------------
    | Stored on the `public` disk under `branding/`, served through the
    | public/storage symlink, and purged from cache on every update.
    */
    'branding' => [
        'logo'        => ['label' => 'Global logo (header)', 'type' => 'image', 'default' => null, 'extensions' => ['png', 'svg', 'ico', 'webp', 'jpg', 'jpeg'], 'max_kb' => 2048],
        'logo_footer' => ['label' => 'Footer logo', 'type' => 'image', 'default' => null, 'extensions' => ['png', 'svg', 'ico', 'webp', 'jpg', 'jpeg'], 'max_kb' => 2048],
        'favicon'     => ['label' => 'Favicon (browser tab icon)', 'type' => 'image', 'default' => null, 'extensions' => ['png', 'svg', 'ico', 'webp'], 'max_kb' => 512],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global content blocks
    |--------------------------------------------------------------------------
    | Reusable marketing blocks that are repeated on several pages.
    */
    'blocks' => [
        'cta_heading'    => ['label' => 'Call-to-action heading', 'type' => 'text', 'default' => 'Your cycle has something to tell you'],
        'cta_sub'        => ['label' => 'Call-to-action sub-text', 'type' => 'textarea', 'default' => 'Learn to read it with a Practitioner near you.'],
        'cta_text'       => ['label' => 'Call-to-action button label', 'type' => 'text', 'default' => 'Take the first step'],
        'cta_href'       => ['label' => 'Call-to-action button URL', 'type' => 'text', 'default' => '/directory'],

        'contact_form_title'   => ['label' => '"Write to us" column heading', 'type' => 'text', 'default' => 'Write to us'],
        'contact_form_intro'   => ['label' => '"Write to us" column text', 'type' => 'textarea', 'default' => "Have questions or want to take the next step? Leave us a message and we'll get back to you soon."],
    ],
];
