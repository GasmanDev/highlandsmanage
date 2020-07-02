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
                '1' => $row->name,
                '2' => number_format($row->price),
            );
        }
        return (collect($product));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tên sản phẩm',
            'Giá tiền'
        ];
    }
}
