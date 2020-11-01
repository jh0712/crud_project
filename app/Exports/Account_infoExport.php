<?php

namespace App\Exports;

use App\Models\Account_info;
use Maatwebsite\Excel\Concerns\FromCollection;

class Account_infoExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Account_info::all();
    }
}
