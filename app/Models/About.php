<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'hero_title',
        'hero_subtitle',
        'hero_background',
        'service_area',
        'focus_services',
        'highlight_text',
        'vision',
        'cta_title',
        'cta_subtitle',
        'cta_whatsapp_text',
        'cta_whatsapp_number',
        'cta_packages_text',
        'cta_background',
    ];
}
