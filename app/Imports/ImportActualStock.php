<?php

namespace App\Imports;

use App\Models\Actualstock;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class ImportActualStock implements ToCollection
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
