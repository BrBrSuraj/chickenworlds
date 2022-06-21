<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Vaichele;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class OrderCreate extends Component
{
    use WithFileUploads;

    public $categories, $products, $users;
    public $selectedCategory, $selectedProduct, $selectedSupplier, $selectedPayment;
    public $supplierName, $supplierAddress, $supplierMobileNumber, $customRate;
    public $typeId, $titleName, $issuedName, $issueDate, $typeImage; //field label Name
    public $typesId, $titlesName, $issuesName, $issuesDate, $typesImage;  //field value
    public $associationRate, $weight = null, $rate, $vaicheles, $vaichele, $staff = [];
    public $transactionCode, $msg, $total;

    public function mount()
    {
        $this->vaicheles=Vaichele::select('id','number')->get();
        $this->categories = Category::select('id','name')->get();
        $this->users = User::select('id','name')->get();
        $this->products = collect();
        $newOrder = new Order;
        $this->transactionCode = $newOrder->getTransactionId();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
        if ($field == "farmer") {
            $this->rate = $this->associationRate;
        } else {
            $this->rate == $this->customRate;
        }
    }

    protected $rules = [
        'selectedCategory' => 'required',
        'selectedProduct' => 'required',
        'selectedSupplier' => 'required',
        'supplierName' => 'required|string',
        'supplierAddress' => 'required|string',
        'supplierMobileNumber' => 'nullable|numeric',
        'customRate'=>'required|numeric',
        'weight' => 'nullable|numeric',
        'selectedPayment' => 'required',
        'titlesName'        => 'nullable|required|max:30',
        'typesId' => 'nullable|numeric',
        'issuesName' => 'nullable|string',
        'issuesDate' => 'nullable|string',
        'typesImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
        'vaichele' => 'required',
        'staff' => 'required',
    ];

    public function order()
    {

        try {
            DB::transaction(function () {
                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'transactionCode' => $this->transactionCode,
                    'selectedCategory' => $this->selectedCategory,
                    'selectedProduct' => $this->selectedProduct,
                    'weight' => $this->weight,
                    'rate' => $this->rate,
                    'vaichele' => $this->vaichele,
                    'staff' => json_encode($this->staff),

                ]);
                Supplier::create([
                    'order_id' => $order->id,
                    'selectedSupplier' =>$this->selectedSupplier,
                    'supplierName' => $this->supplierName,
                    'supplierAddress' => $this->supplierAddress,
                    'supplierMobileNumber' => $this->supplierMobileNumber,
                ]);
                Payment::create([
                    'order_id' => $order->id,
                    'selectedPayment' => $this->selectedPayment,
                    'titlesName' => $this->titlesName,
                    'typesId' => $this->typesId,
                    'issuesName' => $this->issuesName,
                    'issuesDate' => $this->issuesDate,
                    'typesImage' => ($this->typesImage)? $this->typesImage->store('photos'):null,


                ]);
            });
            return redirect()->route('orders.index')->with('message','Order Placed Successfully');
        } catch (\Exception $ex) {
            $this->msg = "Order Process failed.";
        }
    }



    public function updatedSelectedCategory($categoryId)
    {
        $this->products = Product::where('category_id', $categoryId)->select('id', 'name', 'price')->get();
    }
    public function updatedSelectedProduct($productId)
    {

        $productPrice = Product::where('id', $productId)->select('price')->first();
        $this->associationRate = $productPrice->price;
    }

    public function updatedSelectedSupplier($supplierName)
    {

        if ($supplierName == "farmer") {
            $this->rate = $this->associationRate;
        } else {
            $this->rate = $this->customRate;
        }
    }

    public function updatedCustomRate()
    {
        $this->rate = $this->customRate;
    }

    public function updatedSelectedPayment($selectedPayment)
    {
        if ($selectedPayment == "cheque") {
            $this->titleName = "Bank Name";
            $this->typeId = "Cheque Number";
            $this->issuedName = "Issued Person Name";
            $this->issueDate = "Issue Date";
            $this->typeImage = "cheque scaned Image";
            $this->reset(['titlesName', 'typesId', 'issuesName', 'issuesDate', 'typesImage']);
        } elseif ($selectedPayment == "banking") {
            $this->titleName = "Bank Name";
            $this->typeId = "Acount Number";
            $this->issuedName = "Receiver Person Name";
            $this->issueDate = "Issue Date";
            $this->typeImage = "Receipt scaned Image";
            $this->reset(['titlesName', 'typesId', 'issuesName', 'issuesDate', 'typesImage']);
        } elseif ($selectedPayment == "esewa") {
            $this->titleName = "org. Esewa Number";
            $this->typeId = "Receiver Esewa Number";
            $this->issuedName = "Receiver Person Name";
            $this->issueDate = "Issue Date";
            $this->typeImage = "Receipt scaned Image";
        } elseif ($selectedPayment == "khalti") {
            $this->titleName = "org. Khalti Number";
            $this->typeId = "Receiver Khalti Number";
            $this->issuedName = "Receiver Person Name";
            $this->issueDate = "Issue Date";
            $this->typeImage = "Receipt scaned Image";
            $this->reset(['titlesName', 'typesId', 'issuesName', 'issuesDate', 'typesImage']);
        } elseif ($selectedPayment == "vauchar") {
            $this->titleName = "Bank Name";
            $this->typeId = "Vauchar Number";
            $this->issuedName = "Receiver Person Name";
            $this->issueDate = "Issue Date";
            $this->typeImage = "Vauchar scaned Image";
            $this->reset(['titlesName', 'typesId', 'issuesName', 'issuesDate', 'typesImage']);
        } elseif ($selectedPayment == "cash") {
            $this->titleName =  null;
            $this->typeId = null;
            $this->issuedName = null;
            $this->issueDate = null;
            $this->typeImage = null;
        } else {
            $this->errorMessage = "Chose one of them.";
        }
    }

    public function render()
    {
        $vaicheles=Vaichele::all();
        return view('livewire.order-create');
    }
}
