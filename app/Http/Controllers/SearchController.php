<?php

namespace App\Http\Controllers;

use Afea\Cms\Blog\Models\BlogPost;
use Afea\Cms\Core\Models\SeoMetadata;
use Afea\Cms\Faq\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->query('q', ''));
        $results = collect();

        if ($query !== '') {
            $results = $this->search($query);
        }

        return view('pages.search', [
            'query' => $query,
            'results' => $results,
        ]);
    }

    private function search(string $term): Collection
    {
        $like = '%'.$term.'%';

        // SEO metadata matches across all seoable models.
        $seoMatches = SeoMetadata::query()
            ->whereIn('seoable_type', [Product::class, BlogPost::class])
            ->where(function ($q) use ($like): void {
                $q->where('slug', 'like', $like)
                    ->orWhere('title', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('keywords', 'like', $like);
            })
            ->limit(50)
            ->get();

        $hits = collect();

        foreach ($seoMatches as $seo) {
            $hit = $this->mapSeoToHit($seo, $term);
            if ($hit !== null) {
                $hits->push($hit);
            }
        }

        // Direct matches on Product (name/tagline/description) — extra coverage
        Product::query()
            ->active()
            ->where(function ($q) use ($like): void {
                $q->where('name', 'like', $like)
                    ->orWhere('tagline', 'like', $like)
                    ->orWhere('eyebrow', 'like', $like);
            })
            ->limit(20)
            ->get()
            ->each(function (Product $p) use ($hits): void {
                if ($hits->contains(fn ($h) => $h['type'] === 'product' && $h['id'] === $p->id)) {
                    return;
                }

                $hits->push([
                    'type' => 'product',
                    'label' => $this->productLabel($p->type),
                    'id' => $p->id,
                    'title' => $p->name,
                    'description' => $p->tagline ?: '',
                    'url' => $this->productUrl($p),
                ]);
            });

        // FAQ direct matches
        Faq::query()
            ->where(function ($q) use ($like): void {
                $q->where('question', 'like', $like)->orWhere('answer', 'like', $like);
            })
            ->limit(20)
            ->get()
            ->each(function (Faq $f) use ($hits): void {
                $hits->push([
                    'type' => 'faq',
                    'label' => 'SSS',
                    'id' => $f->id,
                    'title' => $f->question,
                    'description' => strip_tags((string) $f->answer),
                    'url' => (request()->segment(1) === 'en' ? route('en.support') : route('destek')).'#faq',
                ]);
            });

        return $hits->take(50)->values();
    }

    private function mapSeoToHit(SeoMetadata $seo, string $term): ?array
    {
        $model = $seo->seoable;
        if (! $model) {
            return null;
        }

        return match (true) {
            $model instanceof Product => [
                'type' => 'product',
                'label' => $this->productLabel($model->type),
                'id' => $model->id,
                'title' => $seo->title ?: $model->name,
                'description' => $seo->description ?: ($model->tagline ?? ''),
                'url' => $this->productUrl($model),
            ],
            $model instanceof BlogPost => [
                'type' => 'blog',
                'label' => 'Blog',
                'id' => $model->id,
                'title' => $seo->title ?: $model->title,
                'description' => $seo->description ?: '',
                'url' => method_exists($model, 'publicUrl') ? $model->publicUrl() : '#',
            ],
            default => null,
        };
    }

    private function productUrl(Product $product): string
    {
        $isEn = request()->segment(1) === 'en';
        $prefix = $isEn ? 'en.' : '';

        return match ($product->type) {
            'phone' => route("{$prefix}phones.show", ['slug' => $product->slug]),
            'watch' => route("{$prefix}watches.show", ['slug' => $product->slug]),
            'headphone' => route("{$prefix}headphones.show", ['slug' => $product->slug]),
            default => '#',
        };
    }

    private function productLabel(string $type): string
    {
        return match ($type) {
            'phone' => 'Telefon',
            'watch' => 'Akıllı Saat',
            'headphone' => 'Kulaklık',
            default => 'Ürün',
        };
    }
}
