<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keywords',
        'meta_description',
        'address',
        'email',
        'email2',
        'phone',
        'phone2',
        'phone1',
        'logo',
        'footerlogo',
        'favicon',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'clients',
        'exp',
        'emp',
        'products',
        'longitude',
        'latitude',
        'about_title',
        'about_image',
        'about_button_text',
        'about_button_link',
        'feature1_title',
        'feature1_description',
        'feature1_icon',
        'feature2_title',
        'feature2_description',
        'feature2_icon',
        'feature3_title',
        'feature3_description',
        'feature3_icon',
        'faq_heading',
        'faq_items',
        'opening_hours',
        'google_analytics',
        'header_scripts',
        'footer_scripts'
    ];
}
