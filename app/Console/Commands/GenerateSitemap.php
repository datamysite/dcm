<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\States;
use App\Models\Categories;
use App\Models\Retailers;
use App\Models\Blogs;

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
            $blogSitemap = Sitemap::create();
            States::get()->each(function (States $state) use ($ensitmap, $blogSitemap) {
                $ensitmap->add(
                    Url::create("/en/".$state->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );

                $ensitmap->add(Url::create("/en/".$state->slug."/stores/online")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/stores/retail")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

                Categories::get()->each(function (Categories $cat) use ($ensitmap, $state) {

                   $string = strtolower(trim($cat->name));
                   $string = str_replace('&', 'and', $string);
                   $string = str_replace(' ', '-', $string);
                   $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                    $ensitmap->add(
                        Url::create("/en/".$state->slug."/".$slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );

                });

                Retailers::where('type', '1')->get()->each(function (Retailers $ret) use ($ensitmap, $state) {

                    $ensitmap->add(
                        Url::create("/en/".$state->slug."/".$ret->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                });

                Retailers::where('type', '2')
                ->whereHas('states', function($q) use ($state){
                    $q->where('state_id', $state->id);
                })
                ->get()->each(function (Retailers $ret) use ($ensitmap, $state) {

                    $ensitmap->add(
                        Url::create("/en/".$state->slug."/".$ret->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                });

                $ensitmap->add(Url::create("/en/".$state->slug."/about-Us")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/sell-sith-dcm")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/faqs")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/privacy-policy")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/terms")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/en/".$state->slug."/anti-spam")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));


                //Blogs

                $blogSitemap->add(Url::create("/en/".$state->slug."/blogs")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                Blogs::where('status', '1')->get()->each(function (Retailers $b) use ($blogSitemap, $state) {

                    $blogSitemap->add(
                        Url::create("/en/".$state->slug."/blogs/".$b->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                });




            });
            $ensitmap->writeToFile(base_path('/en/sitemap.xml'));
            $blogSitemap->writeToFile(base_path('/blogs/sitemap.xml'));




// Ar Sitemap----------------------------------------------------------------------------------------------------------

            $ensitmap = Sitemap::create();
            States::get()->each(function (States $state) use ($ensitmap) {
                $ensitmap->add(
                    Url::create("/ar/".$state->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );

                $ensitmap->add(Url::create("/ar/".$state->slug."/stores/online")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/stores/retail")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

                Categories::get()->each(function (Categories $cat) use ($ensitmap, $state) {

                   $string = strtolower(trim($cat->name));
                   $string = str_replace('&', 'and', $string);
                   $string = str_replace(' ', '-', $string);
                   $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                    $ensitmap->add(
                        Url::create("/ar/".$state->slug."/".$slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );

                });

                Retailers::where('type', '1')->get()->each(function (Retailers $ret) use ($ensitmap, $state) {

                    $ensitmap->add(
                        Url::create("/ar/".$state->slug."/".$ret->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );

                });

                Retailers::where('type', '2')
                ->whereHas('states', function($q) use ($state){
                    $q->where('state_id', $state->id);
                })
                ->get()->each(function (Retailers $ret) use ($ensitmap, $state) {

                    $ensitmap->add(
                        Url::create("/ar/".$state->slug."/".$ret->slug)->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );

                });


                $ensitmap->add(Url::create("/ar/".$state->slug."/about-Us")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/sell-sith-dcm")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/faqs")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/privacy-policy")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/terms")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
                $ensitmap->add(Url::create("/ar/".$state->slug."/anti-spam")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

            });
            $ensitmap->writeToFile(base_path('/ar/sitemap.xml'));
    }
}
