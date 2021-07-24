<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use function PHPUnit\Framework\returnArgument;

class BaocaoTSExport implements FromView,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    protected $phong;

    public function __construct($data,$phong)
    {
        $this->data = $data;
        $this->phong = $phong;
    }

    public function view(): View
    {
        return view('baocao.export_ts',['taisan'=>$this->data,'phongts' =>$this->phong]);
    }

    public function styles(Worksheet $sheet)
    {
        // $sheet->getStyle('A1:N1')->getFont()->setBold(true);
        // $sheet->getStyle('A1:N1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
    }
    
}
