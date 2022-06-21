@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Order List') }}
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-primary p-1 mb-2 mt-2" href="{{ route('orders.create') }}">Place New Orders</a>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <table id="order_list" class="table table-sm text-center">
                <thead class="thead">
                    <th>Transaction Code</th>
                    <th>Product Name</th>
                    <th>Order Date</th>
                    <th>Vaichele</th>
                    <th>Status</th>

                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ "BB".$order->id."-".$order->transactionCode }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->vaichele }}</td>
                             <td>@if ($order->status==1)
                                  <p class="text-success">Received</p>
                             @else
                                <p class="text-danger">Pending</p>
                             @endif</td>

                            <td> <a class="btn btn-sm btn-rounded btn-info text-center"
                                    href="{{ route('orders.show', $order->id) }}">View</a></td>
                            <td> <a class="btn btn-sm btn-rounded btn-primary text-center @if($order->status==1) disabled @endif"
                                    href="{{ route('orders.edit', $order->id) }}">Receive</a></td>
                            <td>
                                <form action="{{ route('orders.destroy', $order) }}" method="post">
                                    @csrf
                                    @method('delete')
 <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure')">Delt</button>
                                </form>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>not found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
        <script>
            $(document).ready(function() {
                $('#order_list').DataTable();

            });
        </script>

    </div>
@endsection
