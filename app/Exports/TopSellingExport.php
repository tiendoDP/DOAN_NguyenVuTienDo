<?php

namespace App\Exports;

use App\Models\OrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class TopSellingExport implements FromCollection, WithMapping, WithHeadings, WithTitle
{
    private $monthAgo;
    protected $stt = 1;

    public function __construct($monthAgo) {
        $this->monthAgo = $monthAgo;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderDetail::getProductTopSelling($this->monthAgo);
    }

    public function map($product): array
    {
        return [
            $this->stt++,
            $product->name,
            $product->price,
            $product->total_quantity,
        ];
    }

    public function headings(): array
    {
        return [
            'STT',
            'Name',
            'Price',
            'Sales'
        ];
    }

    public function title(): string
    {
        return 'Top Selling In '. $this->monthAgo;
    }
}
