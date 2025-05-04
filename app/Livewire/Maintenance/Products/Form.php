<?php

namespace App\Livewire\Maintenance\Products;

use App\Models\Product;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $product;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($product = null)
    {
        try {
            if ($product) {
                $productModel = Product::findOrFail($product);
                $this->product = $productModel->toArray();
                $this->isEdit = true;
            } else {
                $this->product = [
                    'name' => '',
                    'code' => '',
                    'description' => '',
                    'gross' => 0,
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Product not found.');
            return redirect()->route('maintenance.products.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the product.');
            return redirect()->route('maintenance.products.index');
        }
    }

    protected function rules()
    {
        return [
            'product.name' => 'required|string|max:255',
            'product.code' => 'required|string|max:50|unique:products,code' . ($this->isEdit ? ',' . $this->product['id'] : ''),
            'product.description' => 'nullable|string',
            'product.gross' => 'required|numeric|min:0',
        ];
    }

    protected function messages()
    {
        return [
            'product.name.required' => 'The name field is required.',
            'product.code.required' => 'The code field is required.',
            'product.code.unique' => 'This code is already in use.',
            'product.gross.required' => 'The gross field is required.',
            'product.gross.numeric' => 'The gross must be a number.',
            'product.gross.min' => 'The gross must be at least 0.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();
            
            $product = new Product();
            $product->fill($validatedData['product']);
            $product->save();
            
            DB::commit();

            session()->flash('message', 'Product created successfully.');
            $this->redirectRoute('maintenance.products.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create product. Please try again.');
            $this->errorMessage = 'An error occurred while saving the product.';
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $product = Product::findOrFail($this->product['id']);
            $product->fill($validatedData['product']);
            $product->save();
            
            DB::commit();

            session()->flash('message', 'Product updated successfully.');
            $this->redirectRoute('maintenance.products.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Product not found.');
            $this->redirectRoute('maintenance.products.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update product. Please try again.');
            $this->errorMessage = 'An error occurred while updating the product.';
        }
    }

    public function render()
    {
        return view('livewire.maintenance.products.form');
    }
}