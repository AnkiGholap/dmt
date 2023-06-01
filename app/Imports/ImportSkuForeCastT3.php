<?php

namespace App\Imports;

use App\Models\Skuforecastt3;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class ImportSkuForeCastT3 implements ToCollection
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
