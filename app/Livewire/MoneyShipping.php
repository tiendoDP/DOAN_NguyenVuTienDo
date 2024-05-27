<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartModel;

class MoneyShipping extends Component
{
    public $total, $fnTotal;
 
    public function mount()
    {
        $this->total = CartModel::total();
        $this->fnTotal = $this->total;
    }

    public function finalTotal($tt) {
        if($tt == 0) {
            $this->fnTotal = $this->total;
            session()->put('type_shipping', 'Miễn phí vận chuyển');
        }
        else if($tt == 10000) {
            $this->fnTotal = $this->total + $tt;
            session()->put('type_shipping', 'Bình thường');
        }
        else {
            $this->fnTotal = $this->total + $tt;
            session()->put('type_shipping', 'Hỏa tốc');
        }
        session()->put('fntotal', $this->fnTotal);
    }

    public function render()
    {
        //dd($this->fnTotal);
        return view('livewire.money-shipping', [
            'total' => $this->total,
            'fnTotal' => $this->fnTotal
        ]);
    }
}
