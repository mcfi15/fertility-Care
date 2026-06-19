<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Orders;
use Livewire\Component;

class Order extends Component
{
    public $category, $product;
    public $name, $email, $phone, $quantity, $product_code, $price, $title;

    

    public function rules(){
        return [
            'name' => 'required|string',
            'email' => 'required|email:filter|string',
            'phone' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'product_code' => 'nullable|string',
            'price' => 'nullable|string',
            'title' => 'nullable|string'
        ];

    }

    public function resetInput(){
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->quantity = null;
    }

    // public function editBank(int $bank_id){

    //     $this->bank_id = $bank_id;
    //     $bank = Bank::findOrFail($bank_id);
    //     $this->bankname = $bank->bankname;
    //     $this->accountname = $bank->accountname;
    //     $this->accountnumber = $bank->accountnumber;
    // }

    public function storeOrder(){
        $validatedData = $this->validate();
        Orders::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'quantity' => $this->quantity,
            'product_code' => $this->product_code,
            'price' => $this->price,
            'title' => $this->title
        ]);
        session()->flash('message', 'Your order has been created successfully');
        $this->resetInput();
    }

    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.order',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
