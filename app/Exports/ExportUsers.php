<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Query\Builder;
use App\report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('user')
            ->join('package', 'package.username', '=', 'user.username')
            ->join('report', 'report.mobileappid', '=', 'package.mobileappid')
            ->where('user.username', Session::get('username'))
            ->select('report.*')
            ->orderBy('report.days', 'DESC')
            ->get();

        return $data;
    }
    
    public function headings(): array
    {
        return [
            'No', 'Mobilea App Id', 'Days', 'DFP Adunits', 'Ad Requests', 'Matched Requests',
            'Clicks', 'CTR', 'Estimated Revenue', 'Ad Impressions', 'Adecpm',
        ];
    }
}
