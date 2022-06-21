@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Products Details') }}
        </div>
        <div class="card-body">
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">+ Add Product</a>
                <div class="float-right">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if (session()->has('messages'))
                        <div class="alert alert-danger">
                            {{ session()->get('messages') }}
                        </div>
                    @endif

                </div>

            </div>
            <table id="product_list" class="table table-border table-sm">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Name</th>
                           <th scope="col">Association Rate</th>
                        <th scope="col">category</th>
                        <th scope="col">Operation</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                            <td class="text-danger rounded">

                                    {{ $product->category->name }}

                            </td>
                            {{-- <td>{{ $product->products->name }}</td> --}}

                            <td class="">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success">edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="float-left mx-1">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" onClick="return confirm('Are You Sure to Delete')" value="Delete"
                                        class="text-sm btn btn-danger btn-sm">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <script>
            $(document).ready(function() {
                $('#product_list').DataTable();
            });
        </script>

        {{-- <div class="card-footer">
        {{ $products->links() }}
    </div> --}}
    </div>
@endsection
