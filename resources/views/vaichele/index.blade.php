@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-info">
        {{ __('Vaichele Details') }}
    </div>
    <div class="card-body">
        <div>
            <a href="{{ route('vaicheles.create') }}" class="btn btn-primary mb-2">+ Add Vaichele</a>
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
        <table id="user_list" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Vaichele Id</th>
                    <th scope="col">Vaichele Type</th>
                      <th scope="col">Vaichele Number</th>

                    <th scope="col">Operation</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($vaicheles as $vaichele)
                     <tr>
                    <td>{{ $vaichele->id }}</td>
                    <td>{{ $vaichele->type }}</td>
                     <td>{{ $vaichele->number }}</td>


                    <td class="">
                        <form action="{{ route('vaicheles.destroy',$vaichele->id) }}" method="POST" class="float-left mx-1">
                            @csrf
                            @method('DELETE')
                            <input type="submit" onClick="return confirm('Are You Sure to Delete')" value="Delete" class="text-sm btn btn-danger btn-sm">
                        </form>

                    </td>
                </tr>
                @empty
                 <tr>
                    <td>Not Found</td>

                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <script>
        $(document).ready(function() {
            $('#user_list').DataTable();
        });
    </script>

    <div class="card-footer">
        {{ $vaicheles->links() }}
    </div>
</div>
@endsection
