<?php

namespace App\Exports;

use App\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Products::all();
        foreach ($products as $row) {
            $product[] = array(
                '0' => $row->id,
                '1' => $row->title,
                '2' => number_format($row->views),
                '3' => $row->dates,
                '4' => number_format($row->revenues),
                '5' => $row->rates,
                '6' => $row->revenueshare,
                '7' => $row->doitac->name,
            );
        }
        return (collect($product));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tiêu đề',
            'Lượt xem',
            'Tháng',
            'Doanh thu',
            'Tỉ lệ',
            'Doanh thu đã chia',
            'Đối tác',
        ];
    }
}
