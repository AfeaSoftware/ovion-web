<?php

namespace App\Http\Controllers;

use Afea\Cms\Faq\Models\Faq;
use Afea\Cms\Settings\Settings\CompanySettings;
use Afea\Cms\Testimonials\Models\Testimonial;
use App\Models\PageContent;
use App\Models\SupportTopic;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class DestekController extends Controller
{
    public function index(CompanySettings $company)
    {
        $faqs = Faq::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $content = PageContent::contentFor('support', App::getLocale());
        $supportTopics = SupportTopic::active()->ordered()->get();

        return view('pages.destek', compact('faqs', 'testimonials', 'content', 'company', 'supportTopics'));
    }

    public function show(CompanySettings $company, string $slug)
    {
        $locale = App::getLocale();

        $topic = SupportTopic::active()
            ->where(fn ($q) => $q
                ->where('slug->'.$locale, $slug)
                ->orWhere('slug->tr', $slug)
                ->orWhere('slug->en', $slug)
            )
            ->first();

        abort_if($topic === null, Response::HTTP_NOT_FOUND);

        return view('pages.support-topic', compact('topic', 'company'));
    }
}
