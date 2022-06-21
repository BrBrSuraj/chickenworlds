<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>chicken world</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body id="appbody">
    <div class="container">
        <div class="row" style="margin-top:60px;">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-info">
                        {{ __('Print Invoice') }}
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div id="inventory-invoice">
                                <div id="print_data" class="invoice overflow-auto">
                                    <div style="min-width: 600px">
                                        <header>
                                            <div class="row">
                                                <div class="col">
                                                    <a target="_blank" href="#">
                                                        <img src="" alt="Company logo">
                                                    </a>
                                                </div>
                                                <div class="col company-details">
                                                    <h4 class="name">
                                                        <a class="" target="_blank" href="#">
                                                            Belly Bridge ColdStore & Suppliers
                                                        </a>
                                                    </h4>
                                                    <div>Kamane-7, Hetauda,Bagmati province, Nepal</div>
                                                    <div>phone: +9779840298236</div>
                                                    <div>email: dulalsaroj@gmail.com</div>
                                                </div>
                                            </div>
                                        </header>
                                        {{-- end of header --}}
                                        <main>
                                            <div class="row contacts" id="invoiceId">
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light">INVOICE ID:</div>
                                                    <h4 class="to text-info"> {{ $invoice->invoice_number }}</h4>
                                                </div>
                                            </div>
                                            <div class="col invoice-details" id="invoiceDate">
                                                <div class="date">Date of Invoice:</div>
                                                <h4 class="to text-info"> {{ $invoice->invoice_date }}</h4>
                                            </div>
                                    </div>
                                    <table class="table" cellspacing="0" cellpadding="0" id="table">
                                        <thead class="bg-danger">
                                            <tr class="text-dark">
                                                <th scope="col">SN</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Rate</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoice_item as $item)
                                                <tr>
                                                    <td class="no">1</td>
                                                    <td class="text-left">{{ $item->good->name }}</td>
                                                    <td class="unit">{{ $item->quantity . ' ' . 'kg' }}</td>
                                                    <td class="tax">{{ $item->price . ' ' . '/kg' }}</td>
                                                    <td class="total">{{ 'Rs.' . ' ' . $item->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">GRAND TOTAL</td>
                                                <td>{{ 'Rs.' . ' ' . $invoice_item->sum('total') }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="notices">
                                        <div>Info</div>
                                        <div class="notice">System Generated Invoice by <h5
                                                class="to">
                                                {{ auth()->user()->name }}</h5>
                                        </div>
                                    </div>
                                    </main>
                                    <footer>
                                        Invoice was generated on a computer and is valid without the signature and seal.
                                    </footer>
                                </div>
                                <hr>

                                    <div class="text-right">
                                        <a onclick="printme()" class="btn btn-info"><i
                                                class="fa fa-print"></i>
                                            Print</a>
                                             <a href="{{ route('shops.index') }}" class="btn btn-warning"><i
                                                class="fa fa-print"></i>
                                            create new Invoice</a>
                                    </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function printme() {
            window.print();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>


{{--  --}}
