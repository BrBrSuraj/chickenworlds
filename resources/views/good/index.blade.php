@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-info">
            {{ __('Selling Goods') }}
        </div>
        <div class="card-body">
            <div>
                <a href="{{ route('goods.create') }}" class="btn btn-primary mb-2">+ Add Good</a>
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
            <table id="good_list" class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Goods Id</th>
                        <th scope="col">Goods Name</th>
                        <th scope="col">Goods Selling Price</th>

                        <th scope="col">Operation</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($goods as $good)
                        <tr>
                            <td>{{ $good->id }}</td>
                            <td>{{ $good->name }}</td>
                            <td>{{ $good->sp }}</td>
                            <td class="">
                                <a href="{{ route('goods.edit', $good) }}" class="btn btn-sm btn-success">edit</a>

                                <form action="{{ route('goods.destroy', $good) }}" method="POST" class="float-left mx-1">
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
                $('#good_list').DataTable();
            });
        </script>

        <div class="card-footer">
            {{ $goods->links() }}
        </div>
    </div>
@endsection
