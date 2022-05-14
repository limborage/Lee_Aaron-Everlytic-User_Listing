@extends('base_layout')

@section('title', 'User Index')

@section('content')
    <div class="container mt-15">
        @include('messages')

        <button type="button" data-user-create-route="{{route('user_create')}}" class="btn btn-md pull-right btn-main new-user" data-toggle="modal" data-target="#addUserModal">
            Add new user
        </button>

        <form method="post" action="{{ route('user_index') }}">
            {{ csrf_field() }}

            @isset($users)
                <table class="table">
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->name . ' ' . $user->surname }} </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->position }}</td>
                            <td class="text-right w-15">
                                <button type="button" class="btn btn-ghost delete-user index-button" data-user-delete-route="{{ route('user_delete', ['id' => $user->id])  }}" data-toggle="modal" data-target="#deleteUserModal"><i class="glyphicon glyphicon-trash text-danger"></i></button>
                                <button type="button" class="btn btn-ghost edit-user index-button" data-user-id="{{ $user->id }}" data-user-edit-route="{{ route('user_update', ['id' => $user->id])  }}" data-toggle="modal" data-target="#addUserModal"><i class="glyphicon glyphicon-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            <div class="pull-right">
                {{ $users->links() }}
            </div>
            @endisset
        </form>

        @include('users.modals.add_user_modal')
        @include('users.modals.delete_user_modal')
@endsection

@section('post_scripts')
    <script src="{{asset('js/user_modal.js')}}"></script>
@endsection
