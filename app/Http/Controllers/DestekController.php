<?php

namespace App\Http\Controllers;

use Afea\Cms\Faq\Models\Faq;
use Afea\Cms\Settings\Settings\CompanySettings;
use Afea\Cms\Testimonials\Models\Testimonial;
use App\Models\PageContent;
use Illuminate\Support\Facades\App;

class DestekController extends Controller
{
    public function index(CompanySettings $company)
    {
        $faqs = Faq::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $content = PageContent::contentFor('support', App::getLocale());

        return view('pages.destek', compact('faqs', 'testimonials', 'content', 'company'));
    }
}
