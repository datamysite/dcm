<?php

namespace App\Exports\admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Models\Newsletter;
use Carbon\Carbon;
use Auth;
use DB;

class NewsletterExport implements FromArray, withHeadings
{
    use Exportable;
    private $fromdate;
    private $todate;


    public function __construct($fromdate = null, $todate = null){
        $this->fromdate = $fromdate;
        $this->todate = $todate;
    }

    public function headings(): array
    {
        $headings = [
            '#',
            'Email',
            'Registerd at'

        ];
        return $headings;
    }

    public function array(): array{
        $dat['start_date'] = $this->fromdate;
        $dat['end_date'] = $this->todate;

        $users = Newsletter::when(!empty($dat['start_date']) && !empty($dat['end_date']), function ($q) use ($dat) {
                                return $q->whereBetween('created_at',[$dat['start_date'], $dat['end_date']] );
                            })->orderBy('id', 'desc')->get();
        $data = array();
        $i = 0;
        foreach($users as $key => $val){
            $data[$i][0] = ++$key;
            $data[$i][2] = $val->email;
            $data[$i][5] = date('d-M-Y | h:i A', strtotime($val->created_at));

            $i++;
        }

        return $data;
    }
}
