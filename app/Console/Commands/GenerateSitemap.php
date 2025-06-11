<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Tambahkan halaman statis
        $sitemap->add(Url::create('/'));
        $sitemap->add(Url::create('/tentang-kami'));
        $sitemap->add(Url::create('/portfolio'));
        $sitemap->add(Url::create('/blog'));
        $sitemap->add(Url::create('/konsultasi'));

        // Tambahkan halaman layanan
        $sitemap->add(Url::create('/layanan'));
        $sitemap->add(Url::create('/layanan/website-development'));
        $sitemap->add(Url::create('/layanan/mobile-app-development'));
        $sitemap->add(Url::create('/layanan/ui-ux-brand-design'));
        $sitemap->add(Url::create('/layanan/iot'));
        $sitemap->add(Url::create('/layanan/sosial-media-ads'));

        // Jika ada karir dinamis dari database
        foreach (\App\Models\Karir::all() as $karir) {
            $sitemap->add(Url::create("/karir/{$karir->id}"));
        }

        // Simpan ke public folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap berhasil dibuat: public/sitemap.xml');
    }
}
