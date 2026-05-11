<?php

use App\Models\PageContent;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $iconMap = [
            1 => 'shield',
            2 => 'wrench',
            3 => 'book',
            4 => 'question',
            5 => 'chat',
            6 => 'pin',
        ];

        PageContent::query()->where('type', 'support')->each(function (PageContent $page) use ($iconMap) {
            $content = $page->content ?? [];

            if (isset($content['quick_actions']) && is_array($content['quick_actions'])) {
                return;
            }

            $cards = [];

            for ($i = 1; $i <= 6; $i++) {
                $title = $content["act{$i}_title"] ?? null;
                $desc = $content["act{$i}_desc"] ?? null;
                $cta = $content["act{$i}_cta"] ?? null;
                $url = $content["act{$i}_url"] ?? null;

                if (! $title && ! $desc && ! $cta && ! $url) {
                    continue;
                }

                $cards[] = [
                    'icon' => $iconMap[$i] ?? 'shield',
                    'title' => $title ?? '',
                    'desc' => $desc ?? '',
                    'cta' => $cta ?? '',
                    'url' => $url ?? '',
                ];

                unset(
                    $content["act{$i}_title"],
                    $content["act{$i}_desc"],
                    $content["act{$i}_cta"],
                    $content["act{$i}_url"],
                );
            }

            if (! empty($cards)) {
                $content['quick_actions'] = $cards;
            }

            $page->content = $content;
            $page->save();
        });
    }

    public function down(): void
    {
        PageContent::query()->where('type', 'support')->each(function (PageContent $page) {
            $content = $page->content ?? [];
            $cards = $content['quick_actions'] ?? null;

            if (! is_array($cards)) {
                return;
            }

            foreach (array_values($cards) as $i => $card) {
                $n = $i + 1;
                if ($n > 6) {
                    break;
                }
                $content["act{$n}_title"] = $card['title'] ?? '';
                $content["act{$n}_desc"] = $card['desc'] ?? '';
                $content["act{$n}_cta"] = $card['cta'] ?? '';
                $content["act{$n}_url"] = $card['url'] ?? '';
            }

            unset($content['quick_actions']);

            $page->content = $content;
            $page->save();
        });
    }
};
