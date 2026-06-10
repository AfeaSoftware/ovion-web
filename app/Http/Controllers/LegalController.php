<?php

namespace App\Http\Controllers;

use Afea\Cms\Settings\Settings\CompanySettings;
use App\Models\PageContent;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LegalController extends Controller
{
    private const PAGES = ['privacy', 'cookies', 'terms'];

    public function show(CompanySettings $company, string $page)
    {
        abort_unless(in_array($page, self::PAGES, true), Response::HTTP_NOT_FOUND);

        $locale = App::getLocale();

        abort_unless(PageContent::existsFor($page, $locale), Response::HTTP_NOT_FOUND);

        $content = PageContent::contentFor($page, $locale);

        return view('pages.legal', [
            'page' => $page,
            'content' => $content,
            'company' => $company,
        ]);
    }
}
