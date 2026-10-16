<?php

/**
 * Editable public page content - Admin > Page Content.
 *
 * One entry per public page (and per blog article) with every field the
 * admin may edit. All current site writeups live here and are persisted into
 * site_settings by Database/Seeders/SiteSettingsSeeder.
 *
 * Key shape: page.{slug}.{field}   ->   setting('page.about-us.title')
 */

return array (
  'index' => 
  array (
    'label' => 'Home',
    'url' => '/',
    'route' => 'fertilitycare.home',
    'fields' => 
    array (
      'badge_primary' => 
      array (
        'label' => 'Hero trust badge 1',
        'type' => 'text',
        'default' => 'Evidence-based',
      ),
      'badge_secondary' => 
      array (
        'label' => 'Hero trust badge 2',
        'type' => 'text',
        'default' => 'Reproductive science',
      ),
      'hero_title' => 
      array (
        'label' => 'Hero headline (line 1)',
        'type' => 'text',
        'default' => 'Your cycles speak.',
      ),
      'hero_title_accent' => 
      array (
        'label' => 'Hero headline (accent line 2)',
        'type' => 'text',
        'default' => 'Learn to listen to them.',
      ),
      'hero_cta_primary_text' => 
      array (
        'label' => 'Primary CTA label',
        'type' => 'text',
        'default' => 'Find support',
      ),
      'hero_cta_primary_href' => 
      array (
        'label' => 'Primary CTA URL',
        'type' => 'text',
        'default' => '/directory',
      ),
      'hero_cta_secondary_text' => 
      array (
        'label' => 'Secondary CTA label',
        'type' => 'text',
        'default' => 'See testimonials',
      ),
      'hero_cta_secondary_href' => 
      array (
        'label' => 'Secondary CTA URL',
        'type' => 'text',
        'default' => '/testimonials',
      ),
      'hero_media_image' => 
      array (
        'label' => 'Hero image (replaces the video when set)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'hero_media_alt' => 
      array (
        'label' => 'Hero media alt text',
        'type' => 'text',
        'default' => 'Doctor smiling in a bright clinic, reviewing a cycle chart on a tablet.',
      ),
      'body_001' => 
      array (
        'label' => 'Hero paragraph',
        'type' => 'textarea',
        'default' => 'At FertilityCare Centers of Nigeria we teach women and couples to read the signs of their cycle with the
          Creighton Model — also known as the Creighton method — and we support their reproductive health alongside a
          network of professionals in restorative medicine.',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — 10 countries',
        'type' => 'text',
        'default' => '10 countries',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — Presence across Nigeria',
        'type' => 'text',
        'default' => 'Presence across Nigeria',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — What brings you here?',
        'type' => 'text',
        'default' => 'What brings you here?',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Choose where to start. Every path leads to the…',
        'type' => 'text',
        'default' => 'Choose where to start. Every path leads to the same care: science that listens and close, personal support.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Creighton Method',
        'type' => 'text',
        'default' => 'Creighton Method',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Learn to observe and track the signs of your c…',
        'type' => 'text',
        'default' => 'Learn to observe and track the signs of your cycle with the Creighton Model and personalized support.',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — NaProTECHNOLOGY®',
        'type' => 'text',
        'default' => 'NaProTECHNOLOGY®',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — Discover the medical science that works with y…',
        'type' => 'text',
        'default' => 'Discover the medical science that works with your cycle and seeks the causes of reproductive and gynecological conditions.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — Find support',
        'type' => 'text',
        'default' => 'Find support',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — A directory of Centers and NaPro consultant do…',
        'type' => 'textarea',
        'default' => 'A directory of Centers and NaPro consultant doctors across Nigeria, plus testimonials from those who
          have already taken the next step.',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — In addition to our presence in North America a…',
        'type' => 'textarea',
        'default' => 'In addition to our presence in North America and other continents, here we focus on Nigeria, currently
          in 10 countries. Browse our directory.',
      ),
      'body_013' => 
      array (
        'label' => 'Writeup body_013 — Professional training',
        'type' => 'text',
        'default' => 'Professional training',
      ),
      'body_014' => 
      array (
        'label' => 'Writeup body_014 — Train as a Practitioner or consultant doctor t…',
        'type' => 'text',
        'default' => 'Train as a Practitioner or consultant doctor to teach the Creighton Model and support women and couples.',
      ),
      'body_015' => 
      array (
        'label' => 'Writeup body_015 — Continuing Education',
        'type' => 'text',
        'default' => 'Continuing Education',
      ),
      'body_016' => 
      array (
        'label' => 'Writeup body_016 — The continuing education space for Practitione…',
        'type' => 'text',
        'default' => 'The continuing education space for Practitioners and consultant doctors.',
      ),
      'body_017' => 
      array (
        'label' => 'Writeup body_017 — Fertility is a gift that deserves to be known,…',
        'type' => 'text',
        'default' => 'Fertility is a gift that deserves to be known, cared for, and supported with science, respect, and love.',
      ),
      'body_018' => 
      array (
        'label' => 'Writeup body_018 — K. Diane Daly, RN, CFCE',
        'type' => 'text',
        'default' => 'K. Diane Daly, RN, CFCE',
      ),
      'body_019' => 
      array (
        'label' => 'Writeup body_019 — Co-founder of the Creighton Model of the Ferti…',
        'type' => 'text',
        'default' => 'Co-founder of the Creighton Model of the FertilityCare System',
      ),
      'body_020' => 
      array (
        'label' => 'Writeup body_020 — Our approach',
        'type' => 'text',
        'default' => 'Our approach',
      ),
      'body_021' => 
      array (
        'label' => 'Writeup body_021 — Where others see a cycle, we see a language of…',
        'type' => 'text',
        'default' => 'Where others see a cycle, we see a language of health',
      ),
      'body_022' => 
      array (
        'label' => 'Writeup body_022 — At FertilityCare™ we look for causes instead o…',
        'type' => 'textarea',
        'default' => 'At FertilityCare™ we look for causes instead of silencing symptoms. We see your reproductive health as part
          of your overall well-being, not as an isolated problem to be switched off.',
      ),
      'body_023' => 
      array (
        'label' => 'Writeup body_023 — Diagnosing causes',
        'type' => 'text',
        'default' => 'Diagnosing causes',
      ),
      'body_024' => 
      array (
        'label' => 'Writeup body_024 — Before proposing a treatment, we seek to under…',
        'type' => 'text',
        'default' => 'Before proposing a treatment, we seek to understand what is really happening in your cycle.',
      ),
      'body_025' => 
      array (
        'label' => 'Writeup body_025 — Dignity of the person',
        'type' => 'text',
        'default' => 'Dignity of the person',
      ),
      'body_026' => 
      array (
        'label' => 'Writeup body_026 — An approach that respects the woman, the coupl…',
        'type' => 'text',
        'default' => 'An approach that respects the woman, the couple, and every story, without judging the path already traveled.',
      ),
      'body_027' => 
      array (
        'label' => 'Writeup body_027 — Our doctors',
        'type' => 'text',
        'default' => 'Our doctors',
      ),
      'body_028' => 
      array (
        'label' => 'Writeup body_028 — A network of consultant doctors certified in N…',
        'type' => 'textarea',
        'default' => 'A network of consultant doctors certified in NaProTECHNOLOGY®, present in different Nigerian countries,
          supporting each case with an approach that seeks the causes before proposing a treatment.',
      ),
      'body_029' => 
      array (
        'label' => 'Writeup body_029 — Find a Center near you',
        'type' => 'text',
        'default' => 'Find a Center near you',
      ),
      'body_030' => 
      array (
        'label' => 'Writeup body_030 — Explore our directory of Centers and Practitio…',
        'type' => 'textarea',
        'default' => 'Explore our directory of Centers and Practitioners across Nigeria. If we\'re not in your city yet,
          write to us: the network keeps growing.',
      ),
      'quote_image_1' => 
      array (
        'label' => 'Quote section image 1 (couple)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'quote_image_2' => 
      array (
        'label' => 'Quote section image 2 (consultation)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'approach_video_poster' => 
      array (
        'label' => 'Approach section video poster',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'approach_video' => 
      array (
        'label' => 'Approach section video (mp4)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'mp4',
        ),
        'max_kb' => 10240,
      ),
      'doctors_image' => 
      array (
        'label' => 'Doctors section image',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'body_033' => 
      array (
        'label' => 'Writeup body_033 — Resources and news',
        'type' => 'text',
        'default' => 'Resources and news',
      ),
      'body_034' => 
      array (
        'label' => 'Writeup body_034 — Articles on the cycle, fertility, and reproduc…',
        'type' => 'text',
        'default' => 'Articles on the cycle, fertility, and reproductive health, in clear language and backed by professionals.',
      ),
      'body_041' => 
      array (
        'label' => 'Writeup body_041 — Dive into our community',
        'type' => 'text',
        'default' => 'Dive into our community',
      ),
      'body_042' => 
      array (
        'label' => 'Writeup body_042 — Content, stories, and news on our social chann…',
        'type' => 'text',
        'default' => 'Content, stories, and news on our social channels.',
      ),
      'body_043' => 
      array (
        'label' => 'Writeup body_043 — Instagram',
        'type' => 'text',
        'default' => 'Instagram',
      ),
      'body_044' => 
      array (
        'label' => 'Writeup body_044 — Stories, cycle tips, and behind the scenes of …',
        'type' => 'text',
        'default' => 'Stories, cycle tips, and behind the scenes of the network.',
      ),
      'body_045' => 
      array (
        'label' => 'Writeup body_045 — Facebook',
        'type' => 'text',
        'default' => 'Facebook',
      ),
      'body_046' => 
      array (
        'label' => 'Writeup body_046 — Community, events, and articles to support you…',
        'type' => 'text',
        'default' => 'Community, events, and articles to support you.',
      ),
      'body_047' => 
      array (
        'label' => 'Writeup body_047 — YouTube',
        'type' => 'text',
        'default' => 'YouTube',
      ),
      'body_048' => 
      array (
        'label' => 'Writeup body_048 — Testimonials, talks, and educational video con…',
        'type' => 'text',
        'default' => 'Testimonials, talks, and educational video content.',
      ),
      'body_049' => 
      array (
        'label' => 'Writeup body_049 — Get your questions answered',
        'type' => 'text',
        'default' => 'Get your questions answered',
      ),
      'body_050' => 
      array (
        'label' => 'Writeup body_050 — Clear answers about the Creighton Model, NaPro…',
        'type' => 'text',
        'default' => 'Clear answers about the Creighton Model, NaProTECHNOLOGY, and how to take the first step.',
      ),
    ),
  ),
  'what-is-fertilitycare' => 
  array (
    'label' => 'What is FertilityCare',
    'url' => '/what-is-fertilitycare',
    'route' => 'fc.what',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'The system',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'What is FertilityCare?',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'FertilityCare is an educational and medical system that teaches women and couples to know, understand, and care for their reproductive health — with science, respect, and personalized support.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — It is used both to care for reproductive healt…',
        'type' => 'textarea',
        'default' => 'It is used both to care for reproductive health in general and to address specific concerns such as irregular
          cycles, pain, or difficulty achieving a pregnancy — always starting by looking for the causes.',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — A woman\'s cycle is not a problem to be silence…',
        'type' => 'text',
        'default' => 'A woman\'s cycle is not a problem to be silenced: it is information to be understood.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — The principle behind the entire FertilityCare …',
        'type' => 'text',
        'default' => 'The principle behind the entire FertilityCare system.',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — Three parts, one system',
        'type' => 'text',
        'default' => 'Three parts, one system',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Each part has a clear role, and together they …',
        'type' => 'text',
        'default' => 'Each part has a clear role, and together they cover education, support, and medical care.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Creighton Model',
        'type' => 'text',
        'default' => 'Creighton Model',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Observe and chart the biomarkers of the cycle …',
        'type' => 'text',
        'default' => 'Observe and chart the biomarkers of the cycle with standardized criteria.',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — The Practitioner',
        'type' => 'text',
        'default' => 'The Practitioner',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — The trained professional who teaches the metho…',
        'type' => 'text',
        'default' => 'The trained professional who teaches the method and accompanies you over time.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — NaProTECHNOLOGY®',
        'type' => 'text',
        'default' => 'NaProTECHNOLOGY®',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — The medical science that works with the chart …',
        'type' => 'text',
        'default' => 'The medical science that works with the chart to find and treat causes.',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — What can it be used for?',
        'type' => 'text',
        'default' => 'What can it be used for?',
      ),
      'story_image' => 
      array (
        'label' => 'Story image (couple charting with Creighton materials)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'the-system' => 
  array (
    'label' => 'The System',
    'url' => '/the-system',
    'route' => 'fc.system',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'The big picture',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Explore the full system',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'FertilityCare connects education, support, and medicine. Here is how the pieces fit together, from the first session to medical care.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Go deeper',
        'type' => 'text',
        'default' => 'Go deeper',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Each part of the system has its own page.',
        'type' => 'text',
        'default' => 'Each part of the system has its own page.',
      ),
    ),
  ),
  'creighton-model' => 
  array (
    'label' => 'Creighton Model',
    'url' => '/creighton-model',
    'route' => 'fc.creighton',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'The educational part',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'The Creighton Model',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'The Creighton Model teaches you to observe and record the signs your body shows every day, so you can understand your cycle and make decisions with reliable information.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — What does it observe?',
        'type' => 'text',
        'default' => 'What does it observe?',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Instead of estimating fertile days from a cale…',
        'type' => 'textarea',
        'default' => 'Instead of estimating fertile days from a calendar, the Creighton Model teaches you to observe, in real time,
          the biomarkers that your body shows each day. These are recorded using standardized criteria, so the
          information is objective, consistent, and useful for both you and your doctor.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — How does it work in practice?',
        'type' => 'text',
        'default' => 'How does it work in practice?',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — Learning is progressive and always accompanied…',
        'type' => 'text',
        'default' => 'Learning is progressive and always accompanied. You are never left to figure it out on your own.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — It is not a calendar method',
        'type' => 'text',
        'default' => 'It is not a calendar method',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Calendar methods estimate fertile days from pr…',
        'type' => 'textarea',
        'default' => 'Calendar methods estimate fertile days from previous cycles. The Creighton Model does the opposite: it observes
          what is happening in your body today, records it, and interprets it. That is why it adapts to irregular cycles
          and provides useful clinical information.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Who can learn it?',
        'type' => 'text',
        'default' => 'Who can learn it?',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — Any woman of reproductive age — single or in a…',
        'type' => 'text',
        'default' => 'Any woman of reproductive age — single or in a relationship — who wants to understand and care for her health.',
      ),
      'chart_image' => 
      array (
        'label' => 'Page image (cycle chart / consultation)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'what-is-a-practitioner' => 
  array (
    'label' => 'What is a Practitioner',
    'url' => '/what-is-a-practitioner',
    'route' => 'fc.practitioner',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Your guide',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'What is a Practitioner?',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'A Practitioner is the trained professional who teaches you the Creighton Model and accompanies you session after session, so the method becomes a habit that genuinely helps you.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — More than a class',
        'type' => 'text',
        'default' => 'More than a class',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Learning the Creighton Model is not a one-time…',
        'type' => 'textarea',
        'default' => 'Learning the Creighton Model is not a one-time class. It is a progressive process: you learn the foundations,
          start charting, and then meet with your Practitioner regularly to review what the chart is showing. Over time,
          you gain confidence in reading your own cycle.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — The Practitioner\'s role is to teach with clear…',
        'type' => 'textarea',
        'default' => 'The Practitioner\'s role is to teach with clear and standardized criteria, to answer your questions honestly,
          and to know when to refer you to a doctor when the chart suggests something that needs medical attention.',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — What a Practitioner does',
        'type' => 'text',
        'default' => 'What a Practitioner does',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Teaches the system\'s rules and terminology.',
        'type' => 'text',
        'default' => 'Teaches the system\'s rules and terminology.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Guides you through your first charts.',
        'type' => 'text',
        'default' => 'Guides you through your first charts.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Reviews each follow-up chart with you and reso…',
        'type' => 'text',
        'default' => 'Reviews each follow-up chart with you and resolves doubts.',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — Helps you understand what information your doc…',
        'type' => 'text',
        'default' => 'Helps you understand what information your doctor needs.',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — Refers you to a NaPro consultant doctor when a…',
        'type' => 'text',
        'default' => 'Refers you to a NaPro consultant doctor when appropriate.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — Education and care are separate',
        'type' => 'text',
        'default' => 'Education and care are separate',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — The Practitioner teaches the method; the docto…',
        'type' => 'textarea',
        'default' => 'The Practitioner teaches the method; the doctor provides medical diagnosis and treatment. Keeping those
            roles distinct is part of what makes the system clear and trustworthy.',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — What your sessions look like',
        'type' => 'text',
        'default' => 'What your sessions look like',
      ),
      'body_013' => 
      array (
        'label' => 'Writeup body_013 — Find a Practitioner',
        'type' => 'text',
        'default' => 'Find a Practitioner',
      ),
      'body_014' => 
      array (
        'label' => 'Writeup body_014 — Search the directory of Centers and Practition…',
        'type' => 'text',
        'default' => 'Search the directory of Centers and Practitioners across Nigeria.',
      ),
      'body_015' => 
      array (
        'label' => 'Writeup body_015 — Become a Practitioner',
        'type' => 'text',
        'default' => 'Become a Practitioner',
      ),
      'body_016' => 
      array (
        'label' => 'Writeup body_016 — Learn about the training, the stages, and who …',
        'type' => 'text',
        'default' => 'Learn about the training, the stages, and who can apply.',
      ),
      'practitioner_image' => 
      array (
        'label' => 'Page image (practitioner / consultation)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'naprotechnology' => 
  array (
    'label' => 'NaProTECHNOLOGY',
    'url' => '/naprotechnology',
    'route' => 'fc.napro',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'The medical part',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'NaProTECHNOLOGY®',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Medicine that seeks the causes, not the shortcuts. NaProTECHNOLOGY works with the cycle chart to understand what is happening and to guide diagnosis and treatment.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — What is it?',
        'type' => 'text',
        'default' => 'What is it?',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — NaProTECHNOLOGY is practiced by consultant doc…',
        'type' => 'textarea',
        'default' => 'NaProTECHNOLOGY is practiced by consultant doctors who train specifically in this approach and who work
          alongside Practitioners who teach the Creighton Model.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — What can it help with?',
        'type' => 'text',
        'default' => 'What can it help with?',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — NaProTECHNOLOGY is used across a range of repr…',
        'type' => 'text',
        'default' => 'NaProTECHNOLOGY is used across a range of reproductive and gynecological concerns, always starting from the cause.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — An approach, not a promise',
        'type' => 'text',
        'default' => 'An approach, not a promise',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — No medical approach can guarantee a pregnancy,…',
        'type' => 'textarea',
        'default' => 'No medical approach can guarantee a pregnancy, and NaProTECHNOLOGY does not claim to. What it offers is a
          methodical way of looking for causes and restoring health where possible — respecting the person, the couple,
          and the natural functioning of the body.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Important: every case is unique. Only a qualif…',
        'type' => 'textarea',
        'default' => 'Important: every case is unique. Only a qualified professional, after evaluating your case, can indicate
            whether this approach is appropriate for you.',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — Seeks causes',
        'type' => 'text',
        'default' => 'Seeks causes',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — Starts by understanding what is happening in t…',
        'type' => 'text',
        'default' => 'Starts by understanding what is happening in the cycle.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — Respects the person',
        'type' => 'text',
        'default' => 'Respects the person',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — Works with the couple\'s values and decisions.',
        'type' => 'text',
        'default' => 'Works with the couple\'s values and decisions.',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — Uses the chart',
        'type' => 'text',
        'default' => 'Uses the chart',
      ),
      'body_013' => 
      array (
        'label' => 'Writeup body_013 — Relies on objective, day-by-day cycle data.',
        'type' => 'text',
        'default' => 'Relies on objective, day-by-day cycle data.',
      ),
      'body_014' => 
      array (
        'label' => 'Writeup body_014 — Restores where possible',
        'type' => 'text',
        'default' => 'Restores where possible',
      ),
      'body_015' => 
      array (
        'label' => 'Writeup body_015 — Aims to support natural function rather than r…',
        'type' => 'text',
        'default' => 'Aims to support natural function rather than replace it.',
      ),
      'team_image' => 
      array (
        'label' => 'Page image (NaPro consultant doctors)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'faq' => 
  array (
    'label' => 'FAQ',
    'url' => '/faq',
    'route' => 'fc.faq',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Before you start',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Frequently asked questions',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'The questions we hear most often about the Creighton Model, NaProTECHNOLOGY, and how to take the first step.',
      ),
    ),
  ),
  'testimonials' => 
  array (
    'label' => 'Testimonials',
    'url' => '/testimonials',
    'route' => 'fc.testimonials',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Real stories',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Testimonials',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Every story is different. These are shared experiences from people who learned to understand their cycle and found a path forward.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Fertility is a gift that deserves to be known,…',
        'type' => 'text',
        'default' => 'Fertility is a gift that deserves to be known, cared for, and supported with science, respect, and love.',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — K. Diane Daly, RN, CFCE — Co-founder of the Cr…',
        'type' => 'text',
        'default' => 'K. Diane Daly, RN, CFCE — Co-founder of the Creighton Model of the FertilityCare System',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — Testimonials are illustrative and adapted for …',
        'type' => 'text',
        'default' => 'Testimonials are illustrative and adapted for privacy. Individual experiences vary.',
      ),
    ),
  ),
  'about-us' => 
  array (
    'label' => 'About Us',
    'url' => '/about-us',
    'route' => 'fc.about',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Who we are',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'About us',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'We are a Nigerian network of professionals who teach the Creighton Model and support women and couples in caring for their reproductive health with science, respect, and closeness.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Our mission',
        'type' => 'text',
        'default' => 'Our mission',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — We exist so that every woman and every couple …',
        'type' => 'textarea',
        'default' => 'We exist so that every woman and every couple can know and care for their reproductive health. We do this by
          teaching the Creighton Model with rigor, accompanying each person with warmth, and connecting them with
          medical professionals trained in NaProTECHNOLOGY.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — Our philosophy',
        'type' => 'text',
        'default' => 'Our philosophy',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — We look for causes instead of silencing sympto…',
        'type' => 'textarea',
        'default' => 'We look for causes instead of silencing symptoms. We respect the dignity of every person and every story. And
          we believe that good science and genuine care belong together — never one without the other.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — In addition to our presence in North America a…',
        'type' => 'textarea',
        'default' => 'In addition to our presence in North America and other continents, our focus here is Nigeria, where we
          are currently present in 10 countries through Centers, Practitioners, and consultant doctors.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — 10',
        'type' => 'text',
        'default' => '10',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Countries in Nigeria',
        'type' => 'text',
        'default' => 'Countries in Nigeria',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — A network that keeps growing',
        'type' => 'text',
        'default' => 'A network that keeps growing',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — What guides us',
        'type' => 'text',
        'default' => 'What guides us',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — The network',
        'type' => 'text',
        'default' => 'The network',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — Behind every chart there is a team: Practition…',
        'type' => 'textarea',
        'default' => 'Behind every chart there is a team: Practitioners who teach, consultant doctors who treat, and Centers that
          make it all accessible. Together they form the Nigerian network of FertilityCare.',
      ),
      'story_image' => 
      array (
        'label' => 'Mission image (couple with Practitioner)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'network_image' => 
      array (
        'label' => 'Network image (team of doctors)',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'directory' => 
  array (
    'label' => 'Directory',
    'url' => '/directory',
    'route' => 'fc.directory',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Our Directory',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Centers Directory',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Centers and Practitioners across Nigeria, organized by country. Find the closest option and start your first session.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Don\'t see your country?',
        'type' => 'text',
        'default' => 'Don\'t see your country?',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — The network keeps growing. Write to us and we …',
        'type' => 'textarea',
        'default' => 'The network keeps growing. Write to us and we will help you find the closest option, which may include remote
        follow-up where available.',
      ),
    ),
  ),
  'napro-doctors' => 
  array (
    'label' => 'NaPro Doctors',
    'url' => '/directory/napro-doctors',
    'route' => 'fc.doctors',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Our Directory',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'NaPro consultant doctors',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Specialists who work with the cycle chart to look for the causes of reproductive and gynecological conditions, and to guide diagnosis and treatment.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Doctors by country',
        'type' => 'text',
        'default' => 'Doctors by country',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Important: this directory is a guide, not a gu…',
        'type' => 'textarea',
        'default' => 'Important: this directory is a guide, not a guarantee. Availability, specialties, and contact details change.
        Always confirm directly before scheduling.',
      ),
    ),
  ),
  'find-support' => 
  array (
    'label' => 'Find Support',
    'url' => '/find-support',
    'route' => 'fc.support',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Where to start',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'See all support options',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Depending on what you need, here are the different ways to connect with the network across Nigeria.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Centers Directory',
        'type' => 'text',
        'default' => 'Centers Directory',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Centers and Practitioners by country. The star…',
        'type' => 'text',
        'default' => 'Centers and Practitioners by country. The starting point for most people.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — NaPro consultant doctors',
        'type' => 'text',
        'default' => 'NaPro consultant doctors',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — Specialists trained in restorative medicine wh…',
        'type' => 'text',
        'default' => 'Specialists trained in restorative medicine who work with your chart.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Testimonials',
        'type' => 'text',
        'default' => 'Testimonials',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Stories from people who already took the first…',
        'type' => 'text',
        'default' => 'Stories from people who already took the first step.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Not in your city yet?',
        'type' => 'text',
        'default' => 'Not in your city yet?',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — The network keeps growing. Tell us where you a…',
        'type' => 'textarea',
        'default' => 'The network keeps growing. Tell us where you are and we will help you find the closest option — which may include
        remote follow-up where available.',
      ),
    ),
  ),
  'professional-training' => 
  array (
    'label' => 'Professional Training',
    'url' => '/professional-training',
    'route' => 'fc.training',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'For professionals',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Professional training',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Become a Practitioner or a NaPro consultant doctor and join the network that teaches the Creighton Model and supports women and couples across Nigeria.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Become a Practitioner',
        'type' => 'text',
        'default' => 'Become a Practitioner',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — A FertilityCare Practitioner is the profession…',
        'type' => 'textarea',
        'default' => 'A FertilityCare Practitioner is the professional who teaches the Creighton Model and accompanies women and
          couples over time. It is a role that combines teaching, listening, and rigor: you help people understand
          their own cycle and, when needed, connect them with medical care.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — Many Practitioners come from health, education…',
        'type' => 'textarea',
        'default' => 'Many Practitioners come from health, education, or social fields, but the program is structured so that anyone
          who meets the requirements can learn the method thoroughly and practice with confidence.',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — Training stages',
        'type' => 'text',
        'default' => 'Training stages',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — The program combines education, supervised pra…',
        'type' => 'text',
        'default' => 'The program combines education, supervised practice, and evaluation.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Continuing education is required to maintain c…',
        'type' => 'text',
        'default' => 'Continuing education is required to maintain certification.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Who can apply',
        'type' => 'text',
        'default' => 'Who can apply',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — Ready to apply?',
        'type' => 'text',
        'default' => 'Ready to apply?',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — Write to us and tell us a little about your ba…',
        'type' => 'textarea',
        'default' => 'Write to us and tell us a little about your background and your interest in the program. We will guide you
          through the next steps.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — Educational programs',
        'type' => 'text',
        'default' => 'Educational programs',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — Programs are offered in person at different lo…',
        'type' => 'text',
        'default' => 'Programs are offered in person at different locations. Dates and brochures are updated each cycle.',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — Past cohorts',
        'type' => 'text',
        'default' => 'Past cohorts',
      ),
      'body_013' => 
      array (
        'label' => 'Writeup body_013 — A look back at previous programs across the re…',
        'type' => 'text',
        'default' => 'A look back at previous programs across the region.',
      ),
      'body_014' => 
      array (
        'label' => 'Writeup body_014 — Professional training program',
        'type' => 'text',
        'default' => 'Professional training program',
      ),
      'body_015' => 
      array (
        'label' => 'Writeup body_015 — Training for consultant doctors',
        'type' => 'text',
        'default' => 'Training for consultant doctors',
      ),
      'body_016' => 
      array (
        'label' => 'Writeup body_016 — Doctors can train in NaProTECHNOLOGY to work w…',
        'type' => 'textarea',
        'default' => 'Doctors can train in NaProTECHNOLOGY to work with the cycle chart and practice restorative reproductive
            medicine. The Medical Consultant track builds on a medical degree and focuses on interpreting the chart
            clinically and on the approach to diagnosis and treatment.',
      ),
      'body_017' => 
      array (
        'label' => 'Writeup body_017 — Frequently asked questions',
        'type' => 'text',
        'default' => 'Frequently asked questions',
      ),
      'body_018' => 
      array (
        'label' => 'Writeup body_018 — About the professional training program.',
        'type' => 'text',
        'default' => 'About the professional training program.',
      ),
      'become_image' => 
      array (
        'label' => 'Become a Practitioner image',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'cohorts_image' => 
      array (
        'label' => 'Past cohorts image',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
      'medical_training_image' => 
      array (
        'label' => 'Consultant doctor training image',
        'type' => 'image',
        'default' => NULL,
        'extensions' => 
        array (
          0 => 'png',
          1 => 'svg',
          2 => 'ico',
          3 => 'webp',
          4 => 'jpg',
          5 => 'jpeg',
        ),
        'max_kb' => 4096,
      ),
    ),
  ),
  'contact' => 
  array (
    'label' => 'Contact',
    'url' => '/contact',
    'route' => 'fc.contact',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Contact',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Write to us',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Have a question or want to take the next step? Leave us a message and we will help you find the right option.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — How can we help?',
        'type' => 'text',
        'default' => 'How can we help?',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Follow us',
        'type' => 'text',
        'default' => 'Follow us',
      ),
    ),
  ),
  'resources' => 
  array (
    'label' => 'Resources',
    'url' => '/resources',
    'route' => 'fc.resources',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Library',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Resources',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Materials to go deeper: official sources, formats used with the method, and ways to request the resources you need.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Scientific articles',
        'type' => 'text',
        'default' => 'Scientific articles',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — Peer-reviewed sources on the Creighton Model a…',
        'type' => 'text',
        'default' => 'Peer-reviewed sources on the Creighton Model and restorative reproductive medicine.',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — Formats',
        'type' => 'text',
        'default' => 'Formats',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — The charts, stickers, and forms used with the …',
        'type' => 'text',
        'default' => 'The charts, stickers, and forms used with the Creighton Model. Ask your Practitioner for the versions in use.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Request your materials',
        'type' => 'text',
        'default' => 'Request your materials',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Need charts or materials for you or your Cente…',
        'type' => 'text',
        'default' => 'Need charts or materials for you or your Center? Let us know and we will help.',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — Official sources',
        'type' => 'text',
        'default' => 'Official sources',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — The organizations behind the Creighton Model a…',
        'type' => 'text',
        'default' => 'The organizations behind the Creighton Model and NaProTECHNOLOGY publish their own materials and certification information.',
      ),
    ),
  ),
  'scientific-articles' => 
  array (
    'label' => 'Scientific Articles',
    'url' => '/resources/scientific-articles',
    'route' => 'fc.articles',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Library',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Scientific articles',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'A starting point for professionals and curious readers: peer-reviewed sources on the Creighton Model and restorative reproductive medicine.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — This is a curated sample list. Always verify c…',
        'type' => 'textarea',
        'default' => 'This is a curated sample list. Always verify citations, authorship, and links against the original sources before
        citing them.',
      ),
    ),
  ),
  'blog' => 
  array (
    'label' => 'Blog',
    'url' => '/blog',
    'route' => 'fc.blog',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Resources and news',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Blog',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'Articles on the cycle, fertility, and reproductive health, in clear language and backed by professionals.',
      ),
    ),
  ),
  'privacy-notice' => 
  array (
    'label' => 'Privacy Notice',
    'url' => '/privacy-notice',
    'route' => 'fc.privacy',
    'fields' => 
    array (
      'eyebrow' => 
      array (
        'label' => 'Eyebrow label',
        'type' => 'text',
        'default' => 'Legal',
      ),
      'title' => 
      array (
        'label' => 'Page title (H1)',
        'type' => 'text',
        'default' => 'Privacy notice',
      ),
      'lead' => 
      array (
        'label' => 'Lead paragraph',
        'type' => 'textarea',
        'default' => 'How we handle the information you share with us, and the choices you have.',
      ),
      'body_001' => 
      array (
        'label' => 'Writeup body_001 — Last updated: [date]',
        'type' => 'text',
        'default' => 'Last updated: [date]',
      ),
      'body_002' => 
      array (
        'label' => 'Writeup body_002 — 1. Who we are',
        'type' => 'text',
        'default' => '1. Who we are',
      ),
      'body_003' => 
      array (
        'label' => 'Writeup body_003 — 2. What information we collect',
        'type' => 'text',
        'default' => '2. What information we collect',
      ),
      'body_004' => 
      array (
        'label' => 'Writeup body_004 — Information you send through our forms, such a…',
        'type' => 'text',
        'default' => 'Information you send through our forms, such as name, email, country, and message.',
      ),
      'body_005' => 
      array (
        'label' => 'Writeup body_005 — Information you voluntarily share when contact…',
        'type' => 'text',
        'default' => 'Information you voluntarily share when contacting us about programs or services.',
      ),
      'body_006' => 
      array (
        'label' => 'Writeup body_006 — Basic technical data needed for the site to fu…',
        'type' => 'text',
        'default' => 'Basic technical data needed for the site to function (for example, cookies strictly necessary for operation).',
      ),
      'body_007' => 
      array (
        'label' => 'Writeup body_007 — 3. How we use your information',
        'type' => 'text',
        'default' => '3. How we use your information',
      ),
      'body_008' => 
      array (
        'label' => 'Writeup body_008 — To answer your questions and help you find the…',
        'type' => 'text',
        'default' => 'To answer your questions and help you find the right option.',
      ),
      'body_009' => 
      array (
        'label' => 'Writeup body_009 — To connect you with Practitioners or consultan…',
        'type' => 'text',
        'default' => 'To connect you with Practitioners or consultant doctors when you ask us to.',
      ),
      'body_010' => 
      array (
        'label' => 'Writeup body_010 — To manage requests about professional training…',
        'type' => 'text',
        'default' => 'To manage requests about professional training or institutional collaboration.',
      ),
      'body_011' => 
      array (
        'label' => 'Writeup body_011 — 4. Sensitive information',
        'type' => 'text',
        'default' => '4. Sensitive information',
      ),
      'body_012' => 
      array (
        'label' => 'Writeup body_012 — We do not ask you to share medical details thr…',
        'type' => 'textarea',
        'default' => 'We do not ask you to share medical details through the public forms. If a topic requires it, arrange it directly
        with the professional who attends to you, under their own confidentiality obligations.',
      ),
      'body_013' => 
      array (
        'label' => 'Writeup body_013 — 5. Sharing',
        'type' => 'text',
        'default' => '5. Sharing',
      ),
      'body_014' => 
      array (
        'label' => 'Writeup body_014 — We do not sell your personal data. We may shar…',
        'type' => 'textarea',
        'default' => 'We do not sell your personal data. We may share the information strictly necessary with a Practitioner or
        consultant doctor when you ask us to put you in contact with one.',
      ),
      'body_015' => 
      array (
        'label' => 'Writeup body_015 — 6. Your rights',
        'type' => 'text',
        'default' => '6. Your rights',
      ),
      'body_016' => 
      array (
        'label' => 'Writeup body_016 — You may request access to, correction of, or d…',
        'type' => 'textarea',
        'default' => 'You may request access to, correction of, or deletion of your data at any time by writing to us. We will respond
        within the term required by applicable law.',
      ),
      'body_017' => 
      array (
        'label' => 'Writeup body_017 — 7. Changes to this notice',
        'type' => 'text',
        'default' => '7. Changes to this notice',
      ),
      'body_018' => 
      array (
        'label' => 'Writeup body_018 — We may update this notice. The version in forc…',
        'type' => 'text',
        'default' => 'We may update this notice. The version in force is the one published on this page, with its "last updated" date.',
      ),
      'body_019' => 
      array (
        'label' => 'Writeup body_019 — 8. Contact',
        'type' => 'text',
        'default' => '8. Contact',
      ),
    ),
  ),
);
