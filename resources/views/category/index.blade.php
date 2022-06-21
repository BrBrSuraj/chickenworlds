@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-info">
        {{ __('Category List') }}
    </div>
    <div class="card-body">
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">+ Add Category</a>
            <div class="float-right">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                @if(session()->has('messages'))
                <div class="alert alert-danger">
                    {{ session()->get('messages') }}
                </div>
                @endif

            </div>

        </div>
        <table id="category_list" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Category Name</th>

                    <th scope="col">Operation</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>


                    <td class="">
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-success">edit</a>
                        <form action="{{ route('categories.destroy',$category->id) }}" method="POST" class="float-left mx-1">
                            @csrf
                            @method('DELETE')
                            <input type="submit" onClick="return confirm('Are You Sure to Delete')" value="Delete" class="text-sm btn btn-danger btn-sm">
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script>
        $(document).ready(function() {
            $('#category_list').DataTable();
        });
    </script>

    <div class="card-footer">
        {{ $categories->links() }}
    </div>
</div>
@endsection
