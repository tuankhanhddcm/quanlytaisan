<?php

namespace App\Exports;

use App\Models\Taisan;
use App\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Cache;
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

class TaisanExport implements WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($dk)
    {
        $this->taisan = $dk;
    }

    public function registerEvents(): array
    {
        
      return [
            
         BeforeExport::class => function(BeforeExport $event){
            $event->writer->reopen(new \Maatwebsite\Excel\Files\LocalTemporaryFile('phieukiemke/kiemke.xlsx'),Excel::XLSX);

            $event->writer->getSheetByIndex(0);
            $event->getWriter()->getSheetByIndex(0)->setCellValue('A8',"Thời điểm kiểm kê: ".Carbon::now('Asia/Ho_Chi_Minh')->format('H:i d-m-Y'));
            $i=17;
            $n =1;
            foreach($this->taisan as $val){
                $event->getWriter()->getSheetByIndex(0)->setCellValue('A'.$i,$n);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('B'.$i,$val->ten_ts);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('C'.$i,$val->ten_phong);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('D'.$i,$val->soluong);
                $event->getWriter()->getSheetByIndex(0)->setCellValue('E'.$i,$val->nguyengia);
                $i++;
                $n++;
            }
            return $event->getWriter()->getSheetByIndex(0);
         }
      ];
    }
}
