<?php

use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// Only login and logout are needed: this is an admin-only back office, so the
// registration, password-reset and password-confirmation routes (whose views
// were never shipped with the template) are switched off.
Auth::routes([
    'register' => false,
    'reset'    => false,
    'confirm'  => false,
]);

/*
|--------------------------------------------------------------------------
| FertilityCare site — English (public front end)
|--------------------------------------------------------------------------
| Assets live in public/fertilitycare-replica/assets/ — see the README there.
| This section IS the public site: the homepage lives at "/" and every page
| uses an English URL. It replaces the old template front end, which has been
| removed further down this file.
*/
Route::get('/', function () {
    return view('fertilitycare.index', [
        'homeTestimonial' => App\Models\Testimonial::query()->active()->ordered()->first(),
        'posts'           => App\Models\Post::query()->published()->latestFirst()->take(3)->get(),
        'faqs'            => App\Models\Faq::query()->active()->ordered()->take(6)->get(),
    ]);
})->name('fertilitycare.home');

// Keep the previous /fertilitycare address working for existing bookmarks.
Route::redirect('/fertilitycare', '/');

Route::view('/what-is-fertilitycare', 'fertilitycare.what-is-fertilitycare')->name('fc.what');
Route::view('/the-system', 'fertilitycare.the-system')->name('fc.system');
Route::view('/creighton-model', 'fertilitycare.creighton-model')->name('fc.creighton');
Route::view('/what-is-a-practitioner', 'fertilitycare.what-is-a-practitioner')->name('fc.practitioner');
Route::view('/naprotechnology', 'fertilitycare.naprotechnology')->name('fc.napro');
Route::get('/faq', function () {
    return view('fertilitycare.faq', [
        'faqGroups' => App\Models\Faq::query()->active()->ordered()->get()->groupBy('category'),
    ]);
})->name('fc.faq');
Route::get('/testimonials', function () {
    return view('fertilitycare.testimonials', [
        'testimonials' => App\Models\Testimonial::query()->active()->ordered()->get(),
    ]);
})->name('fc.testimonials');
Route::view('/about-us', 'fertilitycare.about-us')->name('fc.about');
Route::get('/directory', function () {
    return view('fertilitycare.directory', [
        'countries' => App\Models\Center::query()->active()
            ->where('type', App\Models\Center::TYPE_CENTER)
            ->ordered()->get()->groupBy('country'),
    ]);
})->name('fc.directory');
Route::get('/directory/napro-doctors', function () {
    return view('fertilitycare.napro-doctors', [
        'doctors' => App\Models\Center::query()->active()
            ->where('type', App\Models\Center::TYPE_DOCTOR)
            ->ordered()->get(),
    ]);
})->name('fc.doctors');
Route::view('/find-support', 'fertilitycare.find-support')->name('fc.support');
Route::view('/professional-training', 'fertilitycare.professional-training')->name('fc.training');
Route::view('/contact', 'fertilitycare.contact')->name('fc.contact');
Route::view('/resources', 'fertilitycare.resources')->name('fc.resources');
Route::view('/resources/scientific-articles', 'fertilitycare.scientific-articles')->name('fc.articles');
Route::get('/blog', function () {
    return view('fertilitycare.blog', [
        'posts' => App\Models\Post::query()->published()->latestFirst()->get(),
    ]);
})->name('fc.blog');
Route::view('/privacy-notice', 'fertilitycare.privacy-notice')->name('fc.privacy');

// Public contact form (Contact page + footer). Stores the message and notifies
// the address set in Admin ▸ Site Settings → Contact Form Receiving Email.
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])
    ->name('fc.contact.send');

// Blog posts live in the `posts` table (Admin ▸ Blog is the single source of
// truth). The slug is resolved from the database, drafts 404.
Route::get('/blog/{slug}', function (string $slug) {
    $post = App\Models\Post::query()
        ->published()
        ->where('slug', $slug)
        ->firstOrFail();

    return view('fertilitycare.blog-post', ['post' => $post]);
})->where('slug', '[a-z0-9-]+')->name('fc.blog.post');

/*
|----------------------------------------------------------------------
| XML sitemap — every public page from config/site_pages.php plus every
| published article from the posts table. The host always comes from the
| canonical URL in Admin ▸ Site Settings, so it is correct in dev and in
| production alike. robots.txt points here.
|----------------------------------------------------------------------
*/
Route::get('/sitemap.xml', function () {
    $base = rtrim((string) setting('identity.site_url', url('/')), '/');

    $siteUpdated = App\Models\SiteSetting::query()->max('updated_at');
    $pageLastmod = \Illuminate\Support\Carbon::parse($siteUpdated ?: now())->toIso8601String();

    $topPriority = ['/' => true, '/directory' => true, '/faq' => true, '/blog' => true, '/contact' => true, '/about-us' => true];

    $rows = [];

    foreach (config('site_pages', []) as $page) {
        $path = $page['url'] ?? null;

        if (! is_string($path) || $path === '') {
            continue;
        }

        $rows[$path] = [
            'loc'       => $base . $path,
            'lastmod'   => $pageLastmod,
            'changefreq' => $path === '/' ? 'daily' : 'weekly',
            'priority'  => isset($topPriority[$path]) ? '0.8' : '0.6',
        ];
    }

    $rows['/']['priority'] = '1.0';

    foreach (App\Models\Post::query()->published()->latestFirst()->get() as $post) {
        $path = '/blog/' . $post->slug;

        $rows[$path] = [
            'loc'       => $base . $path,
            'lastmod'   => ($post->updated_at ?? $post->published_at)->toIso8601String(),
            'changefreq' => 'monthly',
            'priority'  => '0.7',
        ];
    }

    ksort($rows);

    return response()->view('sitemap', ['rows' => $rows], 200, [
        'Content-Type' => 'application/xml; charset=UTF-8',
    ]);
})->name('fc.sitemap');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {

    Route::redirect('/', 'admin/dashboard');

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');

    // Site Configuration & Branding.
    Route::get('settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'index'])
        ->name('settings');
    Route::put('settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'update'])
        ->name('settings.update');

    // Page Content Manager.
    Route::get('pages', [App\Http\Controllers\Admin\PageContentController::class, 'index'])
        ->name('pages');
    Route::put('pages/{page}', [App\Http\Controllers\Admin\PageContentController::class, 'update'])
        ->name('pages.update');

    /*
    |----------------------------------------------------------------------
    | Content modules — each domain is managed ONLY in its own section.
    |----------------------------------------------------------------------
    */

    // Testimonials.
    Route::get('testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('testimonials/create', [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('testimonials/{testimonial}/edit', [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{testimonial}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::post('testimonials/{testimonial}/toggle', [App\Http\Controllers\Admin\TestimonialController::class, 'toggle'])->name('testimonials.toggle');
    Route::post('testimonials/{testimonial}/move', [App\Http\Controllers\Admin\TestimonialController::class, 'move'])->name('testimonials.move');

    // FAQs.
    Route::get('faqs', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faqs.index');
    Route::get('faqs/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faqs.create');
    Route::post('faqs', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faqs.store');
    Route::get('faqs/{faq}/edit', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('faqs/{faq}', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faqs.update');
    Route::delete('faqs/{faq}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faqs.destroy');
    Route::post('faqs/{faq}/toggle', [App\Http\Controllers\Admin\FaqController::class, 'toggle'])->name('faqs.toggle');
    Route::post('faqs/{faq}/move', [App\Http\Controllers\Admin\FaqController::class, 'move'])->name('faqs.move');

    // Blog.
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('posts/{post}/toggle', [App\Http\Controllers\Admin\PostController::class, 'toggle'])->name('posts.toggle');

    // Centers Directory.
    Route::get('centers', [App\Http\Controllers\Admin\CenterController::class, 'index'])->name('centers.index');
    Route::get('centers/create', [App\Http\Controllers\Admin\CenterController::class, 'create'])->name('centers.create');
    Route::post('centers', [App\Http\Controllers\Admin\CenterController::class, 'store'])->name('centers.store');
    Route::get('centers/{center}/edit', [App\Http\Controllers\Admin\CenterController::class, 'edit'])->name('centers.edit');
    Route::put('centers/{center}', [App\Http\Controllers\Admin\CenterController::class, 'update'])->name('centers.update');
    Route::delete('centers/{center}', [App\Http\Controllers\Admin\CenterController::class, 'destroy'])->name('centers.destroy');
    Route::post('centers/{center}/toggle', [App\Http\Controllers\Admin\CenterController::class, 'toggle'])->name('centers.toggle');

    // Contact messages (audit inbox).
    Route::get('messages', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{message}/toggle', [App\Http\Controllers\Admin\ContactMessageController::class, 'toggle'])->name('messages.toggle');
    Route::delete('messages/{message}', [App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Account.
    Route::get('change-password', [App\Http\Controllers\Admin\PasswordController::class, 'passwordCreate'])
        ->name('password');
    Route::post('change-password', [App\Http\Controllers\Admin\PasswordController::class, 'changePassword'])
        ->name('password.update');

});



/*
|--------------------------------------------------------------------------
| Legacy template front end — permanently removed
|--------------------------------------------------------------------------
| The old template's public pages, its admin modules (products, categories,
| offers, orders, jobs, applications, sliders, boards, about, testimonials,
| FAQs, subscribers, appointments, notifications) and their database tables
| have all been deleted in the clean-up. The public site is the FertilityCare
| block above; the admin is limited to the dashboard, site settings, page
| content and password management.
*/

