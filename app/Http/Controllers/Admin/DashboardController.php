<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $pages = config('site_pages', []);

        $stats = [
            'settings'     => SiteSetting::query()->count(),
            'pages'        => count($pages),
            'posts'        => Post::query()->count(),
            'testimonials' => Testimonial::query()->count(),
            'faqs'         => Faq::query()->count(),
            'centers'      => Center::query()->count(),
            'messages'     => ContactMessage::query()->count(),
            'unread'       => ContactMessage::query()->unread()->count(),
            'media'        => count(Storage::disk('public')->allFiles()),
        ];

        // Newest five messages, for the at-a-glance audit panel.
        $recentMessages = ContactMessage::query()->newest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
