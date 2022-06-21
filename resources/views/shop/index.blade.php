@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('shop') }}

        </div>
        <div class="card-body">

            <table id="shopItem_list" class="table table-sm table-secondary">
                <thead class="thead text-center">
                    <th>Product Name</th>
                    <th>Availabel Weight</th>
                    <th>Operation</th>
                </thead>
                <tbody class="rounded text-center">
                    @forelse ($shops as $shop)

                        <tr>
                            <td class="text-dark">{{ $shop->name }}</td>
                            <td class="text-dark">{{ round($shop->weight, 3) }}</td>
                             <td class="text-dark"><a class="@if($shop->weight==0) disabled @endif" href="{{ route('invoice/create',$shop->name) }}">
                            Create Invoice
                            </a>@if($shop->weight==0) Contact with manager for more product @endif </td>
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
                $('#shopItem_list').DataTable();
            });
        </script>
        <div>

        </div>
    </div>
@endsection
