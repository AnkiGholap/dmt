<?php

namespace App\Imports;

use App\Models\Salesdata;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class ImportSalesData implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

    }    
}
