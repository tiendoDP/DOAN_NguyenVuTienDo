<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductModel;
use Illuminate\Pagination\Paginator;

class Filter extends Component
{
    use WithPagination;

    // private $products;
    // public $countProduct, $cate, $cateKey =[], $price = 1000000, $sortPrice, $keyword = '';
    public $cate;
    
    public $category = [];
    public $price = 1000000;
    public $sortPrice = 'all';
    public $keyword = '';
    public $gender;
    // protected $queryString = ['category'];

    protected $paginationTheme = 'bootstrap';

    public function mount($cate,$gender = null, $keyword = null) {
        $this->cate = $cate;
        $this->gender = $gender;
        $this->keyword = $keyword;
    }

    public function notFilter() {
        $this->category = [];
        $this->updatingFilter();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function changeCategory() {
        $this->updatingFilter();
        //dd($this->sortPrice);
    }

    public function render()
    {
        $products = ProductModel::
        when($this->category, function($q) {
            $q->wherein('category_id', $this->category);
        })
        ->when($this->sortPrice && $this->sortPrice !== 'all', function($q) {
            $q->orderby('price', $this->sortPrice);
        })
        ->where('price', '<', $this->price)
        ->when($this->keyword, function($q) {
            $q->where('name', 'like', '%'.$this->keyword.'%');
        })
        ->when(isset($this->gender), function($q) {
            $q->where('sex', '=', $this->gender);
        })
        ->orderby('name')
        ->paginate(6);
        return view('livewire.products.filter', ['products' => $products]);
    }
}
