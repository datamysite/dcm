<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Categories;
use App\Models\Contact_Us;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\Footer;
use App\Models\HomeStores;
use App\Models\Retailers;
use App\Models\Slider;
use Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CmsController extends Controller
{


    //Translation//
    public function translate(Request $request)
    {

        $tr = new GoogleTranslate('ar');
        $translation = $tr->translate($request->text);

        return response()->json($translation);
    }

    public function multi_translate(Request $request)
    {
        $tr = new GoogleTranslate('ar');
        $translations = [];

        foreach ($request->input('textArray') as $text) {
            $translation = $tr->translate($text);
            $translations[] = $translation;
        }

        return response()->json($translations);
    }

    // Store Section Start Here//
    public function stores()
    {
        $data['menu'] = 'home.stores';
        $data['stores'] = Retailers::where('status', '1')->get();
        return view('admin.cms.home.stores.index')->with($data);
    }

    public function getRetailers(Request  $request)
    {

        $data['menu'] = 'home.stores';

        //$data['stores'] = Retailers::where('type' , $request->retailer_type)->get();

        $retailerType = $request->input('retailer_type');
        $retailers = Retailers::when($retailerType == '3', function($q){
                                    return $q->where('type', '1')->orWhere('type', '2');
                                })
                                ->when($retailerType != '3', function($q) use ($retailerType){
                                    return $q->where('type', $retailerType);
                                })
                                ->orderBy('type', 'desc')
                                ->where('status', '1')
                                ->get();

        return response()->json($retailers);

    }
    
    public function create_stores(Request $request)
    {

        $data = $request->all();
        $response = [];

        if (
            empty($data['retailer_id']) || empty($data['retailer_type']) || empty($data['status'])
            || empty($data['retailer_order']) || empty($data['status'])
        ) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
            
        } else {

            $hs = HomeStores::where('retailer_id', $data['retailer_id'])->get();

            if (count($hs) == 0 && empty($data['homestore_id'])) {

                $id = HomeStores::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New Store Added To Home Page !';

            } else {

                if (!empty($data['homestore_id'])) {

                    $homestore = HomeStores::where('del', 0)->where('id', base64_decode($data['homestore_id']))->get();
                    if (count($homestore) > 0) {

                        $hs = HomeStores::find(base64_decode($data['homestore_id']));

                        $hs->retailer_id = $data['retailer_id'];
                        $hs->retailer_type = $data['retailer_type'];
                        if($data['retailer_type'] != '3'){
                            $hs->retailer_title = $data['retailer_title'];
                            $hs->retailer_title_ar = $data['retailer_title_ar'];
                            $hs->retailer_desc = $data['retailer_desc'];
                            $hs->retailer_desc_ar = $data['retailer_desc_ar'];
                        }
                        $hs->retailer_order = $data['retailer_order'];
                        $hs->status = $data['status'];

                        $hs->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Store Updated on Home Page!';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! Error While Updating the Store on Home !';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This Store Already Exist On Home !';
                }
            }
        }
        echo json_encode($response);
    }

    public function stores_filter(Request $request)
    {

        $req = $request->all();

        if ($req['name'] != '') {

            $name = $req['name'];
            $retailer = Retailers::where('name', 'LIKE', $req['name'] . "%")->first();
            $retailerId = $retailer->id;

            $data = HomeStores::when(!empty($name), function ($q) use ($retailerId) {
                return $q->where('retailer_id', $retailerId)->where('del', 0);
            })->get();
        } else {

            $data = HomeStores::when(!empty($req['retailer_type']), function ($q) use ($req) {
                return $q->where('retailer_type', $req['retailer_type'])->where('del', 0);
            })->when(!empty($req['status']), function ($q) use ($req) {
                return $q->where('status', $req['status'])->where('del', 0);
            })->get();
        }

        return view('admin.cms.home.stores.load', ['data' => $data]);
    }

    public function load_stores()
    {

        $data = HomeStores::where('del', 0)->with('retailer')->get();
        return view('admin.cms.home.stores.load', ['data' => $data]);
    }

    public function edit_store($id)
    {

        $id = base64_decode($id);

        $data['stores_data'] = HomeStores::find($id);
        $data['retailers_data'] = Retailers::when($data['stores_data']->retailer_type == '3', function($q){
                                                return $q->where('type', '1')->orWhere('type', '2');
                                            })
                                            ->when($data['stores_data']->retailer_type != '3', function($q) use ($data){
                                                return $q->where('type', $data['stores_data']->retailer_type);
                                            })
                                            ->orderBy('type', 'desc')->get();

        return view('admin.cms.home.stores.edit', ['data' => $data]);
    }


    public function delete_store($id)
    {

        $response = [];
        $id = base64_decode($id);

        $homestore = HomeStores::where('id', $id)->get();

        if (count($homestore) != 0) {
            $hs = HomeStores::find($id);

            $hs->del = 1;

            if ($hs->save()) {
                $response = 'success';
            } else {
                $response['errors'] = 'Error While Deleting Store From Home Page !';
            }
        } else {
            $response['errors'] = 'Error While Deleting Store!';
        }

        return $response;
    }
    // Store Section End Here//

    // Slider Section Start Here //
    public function slider()
    {
        $data['menu'] = 'home.slider';
        $data['countries'] = Countries::all();
        return view('admin.cms.home.slider.index')->with($data);
    }

    public function create(Request $request)
    {

        $data = $request->all();
        $response = [];
        
        if (empty($data['img_url']) || empty($data['country_id']) || empty($data['lang_id']) || empty($data['img_order'])) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $slider_t = Slider::where('img_url', $data['img_url'])->where('lang', $data['lang_id'])->get();

            if (count($slider_t) == 0 && empty($data['slider_id'])) {

                $id = Slider::create($data);

                if ($request->hasFile('slider_image')) {
                    $file = $request->file('slider_image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/slider', $newname);

                    $s = Slider::find($id);
                    $s->img_name = $newname;
                    $s->save();
                }

                $response['success'] = 'success';
                $response['message'] = 'Success! New Slider Created.';
            } else {

                if (!empty($data['slider_id'])) {

                    $slider = Slider::where('del', 0)->where('id',  base64_decode($data['slider_id']))->get();

                    if (count($slider) > 0) {

                        $sl = Slider::find(base64_decode($data['slider_id']));

                        $sl->lang = $data['lang_id'];
                        $sl->img_url = $data['img_url'];
                        $sl->country_id = $data['country_id'];
                        $sl->img_order = $data['img_order'];

                        if ($request->hasFile('edit_slider_image')) {
                            $file = $request->file('edit_slider_image');
                            $ext = $file->getClientOriginalExtension();
                            $newname = $sl->id . date('dmyhis') . '.' . $ext;
                            $file->move(public_path() . '/storage/slider', $newname);
                            $sl->img_name = $newname;
                        }

                        $sl->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Slider Updated !';
                    } else {

                        $response['success'] = false;
                        $response['errors'] = 'Alert! Error While Updating the Slider !';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This Slider Already Exist !';
                }
            }
        }
        echo json_encode($response);
    }

    public function load()
    {
        $response = [];
        $data = Slider::where('del', 0)->with('counteryName')->get();
        return view('admin.cms.home.slider.load', ['data' => $data]);
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $data['slider_data'] = Slider::find($id);
        $data['country_data'] = Countries::all();

        return view('admin.cms.home.slider.edit', ['data' => $data]);
    }

    public function delete($id)
    {
        $response = [];
        $id = base64_decode($id);

        $slider = Slider::where('id', $id)->get();

        if (count($slider) != 0) {
            $sl = Slider::find($id);

            $sl->del = 1;

            if ($sl->save()) {
                $response = 'success';
            } else {
                $response['errors'] = 'Error While Deleting Slider!';
            }
        } else {
            $response['errors'] = 'Error While Deleting Slider!';
        }

        return $response;
    }
    // Slider Section End Here//


    // About Us Section Start Here//
    public function about()
    {
        $data['menu'] = 'admin.about';

        return view('admin.cms.about.index')->with($data);
    }

    public function create_about(Request $request)
    {

        $data = $request->all();
        $response = [];

        if (empty($data['about_section']) || empty($data['about_title']) || empty($data['about_description'])) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $about = About::where('section_number', $data['about_section'])->get();

            if (count($about) == 0 && empty($data['about_id'])) {

                $id = About::create($data);

                if ($request->hasFile('about_us_image')) {
                    $file = $request->file('about_us_image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/about', $newname);

                    $a = About::find($id);
                    $a->img = $newname;
                    $a->save();
                }

                $response['success'] = 'success';
                $response['message'] = 'Success! About Us Content Created.';
            } else {

                if (!empty($data['about_id'])) {

                    $about = About::where('del', 0)->where('id', base64_decode($data['about_id']))->get();

                    if (count($about) > 0) {

                        $ab = About::find(base64_decode($data['about_id']));

                        $ab->section_number = $data['about_section'];
                        $ab->title = $data['about_title'];
                        $ab->desc = $data['about_description'];


                        if ($request->hasFile('edit_about_image')) {
                            $file = $request->file('edit_about_image');
                            $ext = $file->getClientOriginalExtension();
                            $newname = $ab->id . date('dmyhis') . '.' . $ext;
                            $file->move(public_path() . '/storage/about', $newname);
                            $ab->img = $newname;
                        }
                        $ab->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Abount Content Updated !';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! Error While Updating About Content !';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! About Content Already Exist !';
                }
            }
        }
        echo json_encode($response);
    }

    public function load_about()
    {
        $response = [];
        $data = About::where('del', 0)->get();
        return view('admin.cms.about.load', ['data' => $data]);
    }


    public function edit_about($id)
    {
        $id = base64_decode($id);
        $data['about_data'] = About::find($id);

        return view('admin.cms.about.edit', ['data' => $data]);
    }

    public function delete_about($id)
    {
        $response = [];
        $id = base64_decode($id);

        $about = About::where('id', $id)->get();

        if (count($about) != 0) {
            $ab = About::find($id);

            $ab->del = 1;

            if ($ab->save()) {
                $response = 'success';
            } else {
                $response['errors'] = 'Error While Deleting About-Us Content !';
            }
        } else {
            $response['errors'] = 'Error While Deleting About-Us Content !';
        }

        return $response;
    }
    // About Us Section End Here//


    // Contact Us Section Start Here//

    public function contact()
    {
        $data['menu'] = 'admin.contact';

        return view('admin.cms.contact_us.index')->with($data);
    }


    public function create_contact(Request $request)
    {

        $data = $request->all();
        $response = [];

        if (
            empty($data['name']) || empty($data['email']) || empty($data['phone'])
            || empty($data['subject']) || empty($data['msg'])
        ) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $contact_us = Contact_Us::where('id', $data['contact_id'])->where('del', 0)->get();

            if (count($contact_us) == 0 && empty($data['contact_id'])) {

                $id = Contact_Us::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success!';
            } else {

                if (!empty($data['contact_id'])) {


                    $contact_us = Contact_Us::where('id', '!=', base64_decode($data['contact_id']))->where('del', 0)->get();

                    if (count($contact_us) > 0) {

                        $c = Contact_Us::find(base64_decode($data['contact_id']));

                        $c->reply = $data['reply'];

                        $c->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Replied !';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! Error While Repling !';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! MSG Already Replied !';
                }
            }
        }

        echo json_encode($response);
    }


    public function load_contact()
    {
        $response = [];
        $data = Contact_Us::where('del', 0)->get();
        return view('admin.cms.contact_us.load', ['data' => $data]);
    }


    public function edit_contact($id)
    {
        $id = base64_decode($id);
        $data['contact_data'] = Contact_Us::find($id);

        return view('admin.cms.contact_us.edit', ['data' => $data]);
    }

    public function delete_contact($id)
    {
        $response = [];
        $id = base64_decode($id);

        $about = Contact_Us::where('id', $id)->get();

        if (count($about) != 0) {
            $ab = Contact_Us::find($id);

            $ab->del = 1;

            if ($ab->save()) {
                $response = 'success';
            } else {
                $response['errors'] = 'Error While Deleting Content !';
            }
        } else {
            $response['errors'] = 'Error While Deleting Content !';
        }

        return $response;
    }

    // Contact Us Section End Here//

    // Footer Content Section Start Here//
    public function footer()
    {

        $data['menu'] = 'admin.footer';

        $data['stores'] = Retailers::all();
        $data['categories'] = Categories::all();
        $data['section1'] = Footer::where('section_id', '1')->orderBy('order_number')->get();
        $data['section2'] = Footer::where('section_id', '2')->get();
        $data['section3'] = Footer::where('section_id', '3')->get();
        $data['section4'] = Footer::where('section_id', '4')->first();

        return view('admin.cms.footer.index')->with($data);
    }

    public function create_footer(Request $request)
    {
        $data = $request->all();
       // dd($data);
        $response = [];

        if (empty($data['section_id'])) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {
            $footer = [];
            if($data['section_id'] == '1'){
                $footer = Footer::where('section_id', $data['section_id'])->where('page_name', $data['page_name'])->first();
            }else if($data['section_id'] == '2'){
                $footer = Footer::where('section_id', $data['section_id'])->where('retailer_id', $data['retailer_id'])->first();
            }else if($data['section_id'] == '3'){
                $footer = Footer::where('section_id', $data['section_id'])->where('category_id', $data['category_id'])->first();
            }

            if (empty($footer->id) && empty($data['footer_id'])) {

                $id = Footer::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! Footer Content Created.';
            } else {

                if (!empty($data['footer_id'])) {

                    $footer = Footer::where('del', 0)->where('id', base64_decode($data['footer_id']))->get();

                    if (count($footer) > 0) {

                        $fo = Footer::find(base64_decode($data['footer_id']));

                        $fo->section_id = $data['section_id'];
                        $fo->page_name = $data['page_name'];
                        $fo->page_url = $data['page_url'];
                        $fo->retailer_id = $data['retailer_id'];
                        $fo->category_id = $data['category_id'];

                        $fo->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Footer Content Updated !';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! Error While Updating Footer Content !';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! Footer Content Already Exist !';
                }
            }
        }
        return redirect()->back()->with($response);
    }

    public function footer_copyright_save(Request $request){
        $data = $request->all();
       // dd($data);
        $response = [];

        if (empty($data['copyright'])) {

            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {
            $c = Footer::where('section_id', '4')->where('id', $data['footer_id'])->first();
            $c->text = $data['copyright'];
            $c->save();

            $response['success'] = 'success';
            $response['message'] = 'Success! Footer Content Updated !';
        }
        
        return $response;
    }


    public function load_footer()
    {

        $data = Footer::where('del', 0)->with('retailerName')->with('categoiresName')->get();

        return view('admin.cms.footer.load', ['data' => $data]);
    }


    public function edit_footer($id)
    {
        $id = base64_decode($id);

        $data['footer_data'] = Footer::find($id);
        $data['stores'] = Retailers::all();
        $data['categories'] = Categories::all();

        return view('admin.cms.footer.edit', ['data' => $data]);
    }

    public function delete_footer($id)
    {

        $response = [];
        $id = base64_decode($id);
        $footer = Footer::where('id', $id)->first();

        if (!empty($footer->id)) {
            Footer::destroy($id);

            $response = 'success';

        } else {
            $response['errors'] = 'Error While Deleting Footer Content !';
        }

        return $response;
    }
    // Footer Content Section Start Here//
}
