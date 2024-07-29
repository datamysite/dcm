<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\States;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\Blogs;
use Carbon\Carbon;

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

        //Links En Sitemap

            $linksensitmap = Sitemap::create();
            $linksensitmap->add(Url::create("/en/")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/about-Us")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/about-Us")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/sell-sith-dcm")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/faqs")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
            $linksensitmap->add(Url::create("/en/privacy-policy")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/terms")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/anti-spam")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksensitmap->add(Url::create("/en/claim/cashback")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));


            $linksensitmap->writeToFile(base_path('/sitemaps/links-en.xml'));

        //Links ar Sitemap

            $linksarsitmap = Sitemap::create();

            $linksarsitmap->add(Url::create("/ar/")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/about-Us")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/about-Us")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/sell-sith-dcm")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/faqs")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
            $linksarsitmap->add(Url::create("/ar/privacy-policy")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/terms")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/anti-spam")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $linksarsitmap->add(Url::create("/ar/claim/cashback")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));


            $linksarsitmap->writeToFile(base_path('/sitemaps/links-ar.xml'));



        //Listing En Sitemap

            $listingensitmap = Sitemap::create();

            $listingensitmap->add(Url::create("/en/stores")->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $listingensitmap->add(Url::create("/en/stores/online")->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $listingensitmap->add(Url::create("/en/stores/retail")->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));

            Categories::get()->each(function (Categories $cat) use ($listingensitmap) {

               $string = strtolower(trim($cat->name));
               $string = str_replace('&', 'and', $string);
               $string = str_replace(' ', '-', $string);
               $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                $listingensitmap->add(
                    Url::create("/en/".$slug)->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

                if($cat->id <= 6){
                    $listingensitmap->add(Url::create("/en/".$slug."/online")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
                    $listingensitmap->add(Url::create("/en/".$slug."/retail")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())); 
                }

            });

            Retailers::get()->each(function (Retailers $ret) use ($listingensitmap) {

                $listingensitmap->add(
                    Url::create("/en/".$ret->slug)->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

            });


            $listingensitmap->writeToFile(base_path('/sitemaps/listing-en.xml'));


            //Blogs
            $blogenSitemap = Sitemap::create();

            $blogenSitemap->add(Url::create("/en/blogs")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            Blogs::where('status', '1')->get()->each(function (Blogs $b) use ($blogenSitemap) {

                $blogenSitemap->add(
                    Url::create("/en/blogs/".$b->slug)->setPriority(0.85)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

            });

            $blogenSitemap->writeToFile(base_path('/sitemaps/blogs-en.xml'));

// Ar Sitemap----------------------------------------------------------------------------------------------------------

             //Listing ar Sitemap

            $listingarsitmap = Sitemap::create();

            $listingarsitmap->add(Url::create("/ar/stores")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $listingarsitmap->add(Url::create("/ar/stores/online")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            $listingarsitmap->add(Url::create("/ar/stores/retail")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));

            Categories::get()->each(function (Categories $cat) use ($listingarsitmap) {

               $string = strtolower(trim($cat->name));
               $string = str_replace('&', 'and', $string);
               $string = str_replace(' ', '-', $string);
               $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                $listingarsitmap->add(
                    Url::create("/ar/".$slug)->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

                if($cat->id <= 6){
                    $listingarsitmap->add(Url::create("/ar/".$slug."/online")->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
                    $listingarsitmap->add(Url::create("/ar/".$slug."/retail")->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())); 
                }

            });

            Retailers::get()->each(function (Retailers $ret) use ($listingarsitmap) {

                $listingarsitmap->add(
                    Url::create("/ar/".$ret->slug)->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

            });


            $listingarsitmap->writeToFile(base_path('/sitemaps/listing-ar.xml'));


            //Blogs
            $blogarSitemap = Sitemap::create();

            $blogarSitemap->add(Url::create("/ar/blogs")->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            Blogs::where('status', '1')->get()->each(function (Blogs $b) use ($blogarSitemap) {

                $blogarSitemap->add(
                    Url::create("/ar/blogs/".$b->slug)->setPriority(0.85)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now())
                );

            });

            $blogarSitemap->writeToFile(base_path('/sitemaps/blogs-ar.xml'));
    }
}
