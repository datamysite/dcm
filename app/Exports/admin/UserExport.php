<?php

namespace App\Exports\admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use DB;

class UserExport implements FromArray, withHeadings
{
    
    use Exportable;
    private $fromdate;
    private $todate;
    private $email_verified;


    public function __construct($fromdate = null, $todate = null, $email_verified = null){
        $this->fromdate = $fromdate;
        $this->todate = $todate;
        $this->email_verified = $email_verified;
    }

    public function headings(): array
    {
        $headings = [
            '#',
            'Name',
            'Email',
            'Email Verification',
            'Phone',
            'Registerd at'

        ];
        return $headings;
    }

    public function array(): array{
        $dat['start_date'] = $this->fromdate;
        $dat['end_date'] = $this->todate;
        $dat['email_verified'] = $this->email_verified;

        $users = User::when(!empty($dat['start_date']) && !empty($dat['end_date']), function ($q) use ($dat) {
                                return $q->whereBetween('created_at',[$dat['start_date'], $dat['end_date']] );
                            })->when(!empty($dat['email_verified']) || $dat['email_verified'] == '0', function ($q) use ($dat) {
                                return $q->where('email_verified', $dat['email_verified']);
                            })->get();
        $data = array();
        $i = 0;
        foreach($users as $key => $val){
            $data[$i][0] = ++$key;
            $data[$i][1] = $val->name;
            $data[$i][2] = $val->email;
            $data[$i][3] = $val->email_verified == '0' ? 'Non verified' : 'verified';
            $data[$i][4] = $val->phone;
            $data[$i][5] = date('d-M-Y | h:i A', strtotime($val->created_at));

            $i++;
        }

        return $data;
    }
}
