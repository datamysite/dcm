<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\AppliedVacancies;
use Illuminate\Support\Facades\DB ;


class CareerController extends Controller
{
    
    public function index()
    {
        $data['menu'] = 'careers.add';
        return view('admin.careers.index')->with($data);
    }

    public function applied()
    {
        $data['menu'] = 'careers.applied';
        return view('admin.careers.view_jobs')->with($data);
    }

    public function load()
    {
        $response = [];
        $data = Vacancies::where('del' , 0)->get();
        return view('admin.careers.load', ['data' => $data]);
    }

    public function load_jobs()
    {
        $response = [];

        $data['vacancies'] = Vacancies::where('del' , 0)->get();

        return view('admin.careers.load_jobs', ['data' => $data]);
    }

    public function load_details()
    {
        $response = [];

        $data['vacancies'] = AppliedVacancies::where('del' , 0)->get();
        
        return view('admin.careers.load_details', ['data' => $data]);
    }


    public function details($id){

        $id = base64_decode($id);
        $data['vacancies'] = Vacancies::where('id' , $id)->where('del' , 0)->first();

        $applied_vacancies = AppliedVacancies::where('vacancie_id' , $id)->where('del' , 0)->get();

        $data['applied_vacancies'] = AppliedVacancies::where('vacancie_id' , $id)->where('del' , 0)->with('userDetails')->get();
        
        $count  = count($applied_vacancies) ;
        $data['count'] = $count ;

        return view('admin.careers.details',['data' => $data , 'menu'=>'careers.applied']);

    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];
    
        if (empty($data['title']) || empty($data['job_desc']) || empty($data['salary_from']) || empty($data['salary_to']) || empty($data['end_date'])  || empty($data['status']) ) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {
;
            $endDate = strtotime($data['end_date']);
            $currentDate = strtotime(date('Y-m-d'));
        
            if ($endDate < $currentDate) {
                $response['success'] = false;
                $response['errors'] = 'Closing date must be greater than current date.';
            } else {

            $vac = Vacancies::where('title', $data['title'])->get();

            if (count($vac) == 0 && empty($data['vac_id'])) {

                $id = Vacancies::create($data);

                $response['success'] = 'success';
                $response['message'] = 'Success! New Job Created.';
            } else {
                if (!empty($data['vac_id'])) {
                    $vac = Vacancies::where('title', $data['title'])->where('id', '!=', base64_decode($data['vac_id']))->get();

                    if (count($vac) == 0) {

                        $vac = Vacancies::find(base64_decode($data['vac_id']));

                        $vac->title = $data['title'];
                        $vac->desc = $data['job_desc'];
                        $vac->salary_from = $data['salary_from'];
                        $vac->salary_to = $data['salary_to'];
                        $vac->end_date = date('Y-m-d', strtotime($data['end_date']));
                        $vac->status = $data['status'];
                    
                        $vac->save();

                        $response['success'] = 'success';
                        $response['message'] = 'Success! Job Updated.';
                    } else {
                        $response['success'] = false;
                        $response['errors'] = 'Alert! This Job (' . $data["title"] . ') already exist.';
                    }
                } else {
                    $response['success'] = false;
                    $response['errors'] = 'Alert! This Job (' . $data["title"] . ') already exist.';
                }
            }
        }
    }

        echo json_encode($response);
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $data = Vacancies::find($id);
        return view('admin.careers.edit', ['data' => $data]);
    }

    public function delete($id)
    {

        $response = [];
        $id = base64_decode($id);
        $vac = Vacancies::where('id', $id)->get();

        if (count($vac) != 0) {
            $ab = Vacancies::find($id);

            $ab->del = 1;

            if ($ab->save()) {
                $response = 'success';
            } else {
                $response['errors'] = 'Cannot delete this job !';
            }
        } else {
            $response['errors'] = 'Error While Deleting Job !';
        }
        return $response;
    }

    public function deleteAplicant($id)
    {

        $response = [];
        $id = base64_decode($id);
        $apv = AppliedVacancies::where('id', $id)->get();
    
        if (count($apv) != 0) {

            $av = AppliedVacancies::find($id);

            if ($av) {

                $av->del = 1;

                if ($av->save()) {
                    $response = 'success';
                } else {
                    $response['errors'] = 'Cannot delete this job!';
                }
            } else {
                $response['errors'] = 'No matching record found!';
            }
        } else {
            $response['errors'] = 'Error while deleting job!';
        }
    
        return $response;
}

}