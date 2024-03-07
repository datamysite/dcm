<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // En Sitemap

            $ensitmap = Sitemap::create();
            $ensitmap->add(
                Url::create("/en/dubai")
                    ->setPriority(1)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
            /*Post::get()->each(function (Post $post) use ($postsitmap) {
                $ensitmap->add(
                    Url::create("/post/{$post->slug}")
                        ->setPriority(0.9)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                );
            });*/
            $ensitmap->writeToFile(base_path('/en/sitemap.xml'));
    }
}
