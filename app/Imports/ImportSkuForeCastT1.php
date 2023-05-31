<?php

namespace App\Imports;

use App\Models\Skuforecastt1;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class ImportSkuForeCastT1 implements ToCollection
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
