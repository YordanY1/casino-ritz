<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;
use App\Models\Album;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Генерира sitemap.xml за Casino Ritz';

    public function handle()
    {
        $urls = [];

        $langs = ['bg', 'en', 'el', 'tr'];

        foreach ($langs as $lang) {
            $urls[] = url("/{$lang}");
            $urls[] = url("/{$lang}/about");
            $urls[] = url("/{$lang}/live-game");
            $urls[] = url("/{$lang}/slot");
            $urls[] = url("/{$lang}/poker");
            $urls[] = url("/{$lang}/gallery");
            $urls[] = url("/{$lang}/contacts");
            $urls[] = url("/{$lang}/promotions");
            $urls[] = url("/{$lang}/careers");

            $urls[] = url("/{$lang}/live-games/caribbean-stud-poker");

            $galleries = Gallery::with('albums')->get();
            foreach ($galleries as $gallery) {
                $urls[] = url("/{$lang}/gallery/{$gallery->slug}");

                foreach ($gallery->albums as $album) {
                    $urls[] = url("/{$lang}/gallery/{$gallery->slug}/{$album->slug}");
                }
            }
        }


        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= "  <url>" . PHP_EOL;
            $xml .= "    <loc>" . e($url) . "</loc>" . PHP_EOL;
            $xml .= "    <lastmod>" . now()->toAtomString() . "</lastmod>" . PHP_EOL;
            $xml .= "    <changefreq>weekly</changefreq>" . PHP_EOL;
            $xml .= "    <priority>0.8</priority>" . PHP_EOL;
            $xml .= "  </url>" . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('✅ Sitemap sitemap.xml е генериран успешно!');
    }
}
