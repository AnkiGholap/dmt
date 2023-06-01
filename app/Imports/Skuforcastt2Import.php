<?php

namespace App\Imports;

use App\Models\Skuforcastt2;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class Skuforcastt2Import implements ToCollection
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

