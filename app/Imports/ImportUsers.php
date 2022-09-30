<?php

namespace App\Imports;

use App\report;
use Illuminate\Config\Repository;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUsers implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $row)
    {
        return new report([
            'no' => 0,
            'date'     => $row[1],
            'packagename'    => $row[2],
            'adunit'     => $row[3],
            'impressions'    => $row[4],
            'clicks'     => $row[5],
            'adrequest'    => $row[6],
            'matchadrequest'     => $row[7],
            'ctr'    => $row[8],
            'coverage'     => $row[9],
            'revenue'    => $row[10],
            'adecpm'     => $row[11],

        ]);
    }
}
