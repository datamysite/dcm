<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\AppliedVacancies;
use Carbon\Carbon;


class CareerController extends Controller
{
    public function index()
    {
        $response = [];

        $currentDate = Carbon::now()->format('Y-m-d');
        $data['vacancies'] = Vacancies::where('status', 1)->where('del', 0)->where('end_date' ,'>=', $currentDate)->paginate(3);

        return view('web.careers.index', [app()->getLocale(), 'data' => $data]);
    }

    public function details($locale, $id)
    {
        $id = base64_decode($id);
        $data['vacancies'] = Vacancies::where('id', $id)->first();
        return view('web.careers.job-details', [app()->getLocale(), 'data' => $data]);
    }

    public function apply($locale, Request $request)
    {

        $data = $request->all();
        $vac = AppliedVacancies::where('vacancie_id', $data['vac_id'])->where('user_id', $data['user_id'])->get();

        if (count($vac) == 0) {

            $file = $request->file('resume_file');
            $ext = $file->getClientOriginalExtension();
            $allowedExtensions = ['doc', 'docx', 'pdf'];
            $maxFileSize = 3 * 1024 * 1024; // 3MB in bytes

            if (!in_array($ext, $allowedExtensions)) {

                session()->flash('extensions', 'extensions');

            }elseif ($file->getSize() > $maxFileSize) {

                session()->flash('filesize', 'filesize');
                
            } else{

                $id = AppliedVacancies::create($data);

                $newname = $id . date('dmyhis') . '.' . $ext;

                $file->move(public_path() . '/storage/resume', $newname);
                $c = AppliedVacancies::find($id);
                $c->resume_file = $newname;

                if ($c->save()) {

                    session()->flash('success', 'success');
                } else {
                    session()->flash('failure', 'failure');
                }
            }
        } else {
            session()->flash('exist', 'exist');
        }
        return redirect()->back();
    }
}
