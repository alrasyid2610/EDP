<?php

namespace App\Imports;

use App\Models\Laptop;
use Maatwebsite\Excel\Concerns\ToModel;

class LaptopImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Laptop([
            'laptop_device_id' => $row[8],
            'user' => $row[0],
            'no_laptop' => $row[1],
            'batch' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'departement' => $row[3],
            'division' => $row[4],
            'location' => $row[5],
            'code2' => $row[6],
            'status' => $row[7],
            'current_user' => $row[9],
        ]);
    }
}
