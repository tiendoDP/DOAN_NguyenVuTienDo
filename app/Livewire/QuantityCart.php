<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartModel;
use App\Models\ProductModel;

class QuantityCart extends Component
{
    public $carts = null;

    public function mount() {
        $this->updateCartData();
    }

    private function updateCartData() {
        $this->carts = CartModel::getRecord();
    }

    public function decrementQuantity($id) {
        $cart = $this->carts->firstWhere('id', $id);
        if (!$cart) {
            $this->dispatch('show-alert', 'Cart not exist!');
            return;
        }
        if($cart->quantity > 1) {
            $product = ProductModel::where('id', $cart->product_id)->first();
            $cart->decrement('quantity');
            ($product->discount === null) ? 
            $cart->money = (int) $cart->quantity * (int) $product->price
            : $cart->money =  $cart->money - $product->price + $product->price * $product->discount / 100;
            $cart->save();
        }
        $this->updateCartData();
    }

    public function incrementQuantity($id) {
        $cart = $this->carts->firstWhere('id', $id);
        if (!$cart) {
            $this->dispatch('show-alert', 'Cart not exist!');
            return;
        }
        $product = ProductModel::where('id', $cart->product_id)->first();
        $cart->increment('quantity');
        ($product->discount == null) ? $cart->money = $cart->quantity * $product->price 
        : $cart->money = $cart->money + $product->price - $product->price * $product->discount / 100;
        $cart->save();
        $this->updateCartData();
    }

    public function render()
    {
        return view('livewire.quantity-cart', [
            'all_cart' => $this->carts
        ]);
    }
}
