@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Users Details') }}
        </div>
        <div class="card-body">
            <div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2">+ Add User</a>
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
            <table id="user_list" class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                     <p class="btn btn-sm btn-info">{{ $role->name . ',' }}</p>
                                @endforeach
                            </td>
                            <td class="">
                                <a href="{{ route('admin.users.edit',$user) }}" class="btn btn-sm btn-success">edit</a>
                                  <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="float-left mx-1">
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
$(document).ready( function () {
    $('#user_list').DataTable();
} );
        </script>

        <div class="card-footer">
     {{ $users->links() }}
        </div>
    </div>
@endsection
