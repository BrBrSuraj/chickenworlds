@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Specific Order Details') }} <div class="float-right"><a
                    href="{{ route('orders/edit', $order->id) }}" class="btn btn-info btn-sm rounded">Edit</a></div>
        </div>

        <div class="card-body">
            <div>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>

                            <th scope="col">Title</th>
                            <th scope="col">Details</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center bg-warning font-weight-bold">Order Details</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td>{{ $product->name }}</td>

                        </tr>
                        <tr>
                            <td>Order Request Date</td>
                            <td> {{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Order Received Date</td>
                            <td>
                                  @if ($order->status == 0)
                                    Not Receive yet
                                @else
                                    {{ $order->received_date }}</td>
                                @endif
                        </tr>
                        <tr>
                            <td>Deliver Status</td>
                            <td
                                class="font-weight-bold @if ($order->status == 0) text-danger @else text-success @endif">
                                @if ($order->status == 0)
                                    pending
                                @else
                                    Delivered
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Transaction Code</td>
                            <td> {{ $order->transactionCode }}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td> {{ $order->weight }}</td>
                        </tr>
                        <tr>
                            <td>Rate</td>
                            <td> {{ $order->rate }}</td>
                        </tr>
                        <tr>
                            <td>Total Expenditure</td>
                            <td> {{ $order->weight * $order->rate }}</td>
                        </tr>
                        <tr>
                            <td>Alocated Staff for laod</td>
                            <td> {{ $order->staff }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center bg-warning font-weight-bold">Suppliers Details</td>
                        </tr>
                        @isset($order->supplier)
                            <tr>
                                <td>Supplier Type</td>
                                <td> {{ $order->supplier->selectedSupplier }}</td>
                            </tr>
                            <tr>
                                <td>Supplier Name</td>
                                <td> {{ $order->supplier->supplierName }}</td>
                            </tr>
                            <tr>
                                <td>Supplier Address</td>
                                <td> {{ $order->supplier->supplierAddress }}</td>
                            </tr>
                            <tr>
                                <td>Supplier's Contact</td>
                                <td>{{ $order->supplier->supplierMobileNumber }}</td>
                            </tr>
                        @endisset

                        <tr>
                            <td colspan="2" class="text-center bg-warning font-weight-bold">Payment Details</td>
                        </tr>
                        @isset($order->payment)
                        @if ($order->payment->typesId==null)
                         <tr>
                                <td>Payment Type</td>
                                <td> Cash on Delivary</td>
                            </tr>
                        @else
                            <tr>
                                <td>Payment Type</td>
                                <td> {{ $order->payment->titlesName }}</td>
                            </tr>
                            <tr>
                                <td>Payment ID</td>
                                <td> {{ $order->payment->typesId }}</td>
                            </tr>
                            <tr>
                                <td>Payment Issue Person Name</td>
                                <td> {{ $order->payment->issuesName }}</td>
                            </tr>
                            <tr>
                                <td>Payment Date</td>
                                <td>{{ $order->payment->issuesDate }}</td>
                            </tr>
                            <tr>
                                <td>Payment verification Image</td>
                                <td></td>
                            </tr>
                              @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
