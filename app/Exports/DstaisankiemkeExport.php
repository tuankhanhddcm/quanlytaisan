<?php

namespace App\Exports;

use App\Models\Phongban;
use App\Models\Taisan;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Excel;
Use \Maatwebsite\Excel\Sheet;

class DstaisankiemkeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($taisan,$tenphong)
    {
        $this->taisan = $taisan;
        $this->tenphong = $tenphong;
    }
    
    public function view(): View
    {
        return view('kiemke.mau_kiemke', [
            'taisan' => $this->taisan,
            'tenphong'=>$this->tenphong
        ]);
    }
    
}
