@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Stock') }}
        </div>
        <div class="card-body">
            <table id="stock_list" class="table table-sm table-secondary">
                <thead class="thead">
                    <th>Product Name</th>
                    <th>Weight</th>
                    <th>Quantity</th>
                    <th>Average Weight</th>
                    <th>Select for sell</th>
                </thead>
                <tbody class="rounded">
                    @forelse ($stocks as $stock)
                        <tr class="">


                            <td class="text-dark">{{ $stock->product_name }}</td>

                            <td class="text-dark">{{ $stock->weight }}</td>

                            <td class="text-dark">{{ $stock->qty }}</td>
                            <td class="text-dark">
                                @if ($stock->qty == 0)
                                    <p>{{ 0 }}</p>
                                @else
                                    <p>{{ $stock->weight / $stock->qty }}</p>
                                @endif

                            </td>
                            <td class="text-dark">
                                <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-success btn-sm @if($stock->weight==0 || $stock->qty==0) disabled @endif">

                                    Send to Shop Store
                                </a>
                                <br>
                                  <span class="text-danger"> @if($stock->weight==0 || $stock->qty==0) stock empty !   order new product @endif</span>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('#stock_list').DataTable();
            });
        </script>
        <div>
            {{ $stocks->links() }}
        </div>
    </div>
@endsection
