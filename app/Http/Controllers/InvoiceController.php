<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Shop;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $invoiceNumber = $request->invoiceNumber;
        $invoice = Invoice::where('invoice_number', $invoiceNumber)->first();
        $invoice_item = InvoiceItem::where('invoice_id', $invoice->id)->with('product','good')->get();

        return view('invoice.printInvoice', compact('invoice_item', 'invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $invoiceNumber = $request->input('product_id') . uniqid();
      $product_name=  $request->input('product_name');

        $invoice = Invoice::create([
            'invoice_number' => $invoiceNumber,
            'invoice_date' => now(),
        ]);
        info($invoice);
        if ("Current Invoice=".$invoice) {
            foreach ($request->sellGoods as $good) {
                $invoiceItem = InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $request->input('product_id'),
                    'good_id' => $good['good_id'],
                    'quantity' =>  $good['quantity'],
                    'price' => Good::where('id', $good['good_id'])->select('sp')->first()->sp,
                    'total'=> $good['quantity']* Good::where('id', $good['good_id'])->select('sp')->first()->sp
                ]);
            }
            info("Current Invoice Item=".$invoiceItem);
            $totalQuantity=$invoiceItem->where('invoice_id', $invoice->id)->sum('quantity');
            info("total quantity current sell=".$totalQuantity);
            info("current sell product name=" . $product_name);
            info("weight before sell=".Shop::where('name', $product_name)->select('weight')->first()->weight);
            DB::table('shops')->where('name', $product_name)->decrement('weight', $totalQuantity);
            info("weight after sell=" . Shop::where('name', $product_name)->select('weight')->first()->weight);

        }

        return \to_route('invoices.create', ['invoiceNumber' => $invoiceNumber]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
       $invoice_item= InvoiceItem::where('invoice_id',$invoice->id)->get();
        return view('invoice.printableInvoice',\compact('invoice','invoice_item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function createInvoice($name)
    {
        $id = Product::where('name', $name)->select('id')->first();
        $product_id = $id->id;
        $goods = Good::all();
        $shops = Shop::all();
        return view('invoice.create', \compact('name','goods', 'shops', 'product_id'));
    }

    public function createInvoicePdf()
    {
        return "success";
    }
}
