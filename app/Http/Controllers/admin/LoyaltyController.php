<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\ConversionRate;
use App\Models\ClaimType;
use App\Models\Wishcategories;
use App\Models\RewardType;

class LoyaltyController extends Controller
{
    //Settings

        //Conversion Rate

            public function settings(){

                $data['menu'] = 'settings.loyalty';

                $data['countries'] = Countries::all();
                $data['ConversionRate'] = ConversionRate::all();
                $data['claimtype'] = ClaimType::all();
                $data['rewardtype'] = RewardType::all();
                $data['categories'] = Wishcategories::where('del', '0')->get();

                return view('admin.loyalty.settings.index')->with($data);
            }

            public function addConverstionRate(Request $request){
                $data = $request->all();

                $rate = ConversionRate::where('country_id', $data['country_id'])->first();

                if(empty($rate->id)){
                    $r = new ConversionRate;
                    $r->country_id = $data['country_id'];
                    $r->coins  = $data['coins'];
                    $r->value = $data['value'];
                    $r->save();

                    return redirect()->back()->with('success', 'Success!');
                }else{
                    return redirect()->back()->with('error', 'This Country already had Conversion Rate!');
                }

            }

            public function deleteConverstionRate($id){
                $id = base64_decode($id);

                $rate = ConversionRate::destroy($id);

                return 'success';

            }

            public function editConverstionRate($id){
                $data['id'] = $id;
                $id = base64_decode($id);

                $data['countries'] = Countries::all();
                $data['rate'] = ConversionRate::find($id);

                return view('admin.loyalty.settings.edit')->with($data);
            }

            public function updateConverstionRate(Request $request){
                $data = $request->all();

                $rate = ConversionRate::find(base64_decode($data['rate_id']));

                if(!empty($rate->id)){
                    $rate->coins  = $data['coins'];
                    $rate->value = $data['value'];
                    $rate->save();

                    return redirect()->back()->with('success', 'Success!');
                }else{
                    return redirect()->back()->with('error', 'Something went wrong!');
                }

            }

        //Eligibility

            public function editEligibility($id){
                $data['id'] = $id;
                $id = base64_decode($id);

                $data['countries'] = Countries::all();
                $data['type'] = ClaimType::find($id);

                return view('admin.loyalty.settings.editParameter')->with($data);
            }

            public function updateEligibility(Request $request){
                $data = $request->all();

                $type = ClaimType::find(base64_decode($data['type_id']));

                if(!empty($type->id)){
                    $type->eligibility  = $data['eligibility'];
                    $type->save();

                    return redirect()->back()->with('success', 'Success!');
                }else{
                    return redirect()->back()->with('error', 'Something went wrong!');
                }

            }



        //Reward

            public function editReward($id){
                $data['id'] = $id;
                $id = base64_decode($id);

                $data['countries'] = Countries::all();
                $data['type'] = RewardType::find($id);

                return view('admin.loyalty.settings.editReward')->with($data);
            }

            public function updateReward(Request $request){
                $data = $request->all();

                $type = RewardType::find(base64_decode($data['type_id']));

                if(!empty($type->id)){
                    $type->reward  = $data['reward'];
                    $type->save();

                    return redirect()->back()->with('success', 'Success!');
                }else{
                    return redirect()->back()->with('error', 'Something went wrong!');
                }

            }


        //Wish Categories

            public function addCategories(Request $request){
                $data = $request->all();

                $cat = Wishcategories::where('name', $data['name'])->first();

                if(empty($cat->id)){
                    $c = new Wishcategories;
                    $c->name = $data['name'];
                    $c->save();

                    return redirect()->back()->with('success', 'Success!');
                }else{
                    return redirect()->back()->with('error', 'This category already exists!');
                }

            }

            public function deleteCategories($id){
                $id = base64_decode($id);

                $cat = Wishcategories::find($id);
                $cat->del = '1';
                $cat->save();

                return 'success';

            }

            public function editCategories($id){
                $data['id'] = $id;
                $id = base64_decode($id);

                $data['cat'] = Wishcategories::find($id);

                return view('admin.loyalty.settings.editCategory')->with($data);
            }

            public function updateCategories(Request $request){
                $data = $request->all();

                $cat = Wishcategories::where('name', $data['name'])->where('id', '!=', base64_decode($data['cat_id']))->first();

                if(empty($cat->id)){
                    $c = Wishcategories::find(base64_decode($data['cat_id']));

                    if(!empty($c->id)){
                        $c->name = $data['name'];
                        $c->save();

                        return redirect()->back()->with('success', 'Success!');
                    }else{
                        return redirect()->back()->with('error', 'Something went wrong!');
                    }
                }else{
                    return redirect()->back()->with('error', 'This category already exists!');
                }

                

            }
}
