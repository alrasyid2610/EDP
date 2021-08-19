<?php

namespace App\Imports;

use App\Models\Section;

use Maatwebsite\Excel\Concerns\ToModel;

class ImportSectionData implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        
        return new Section([
            //
            'section_name' => $row[0],
            'section_location' => $row[1]
        ]);
    }
}
