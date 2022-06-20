@extends('layouts.app')

@section('content')
<div class="row">
    @if (\Session::has('success'))
    <div class="col-12">
        <div class="alert alert-success">
            <ul class="mb-0">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    </div>
    @endif
    <div class="col-lg-12">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="content-title font-weight-bold">Admin Settings</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{route('admin-settings.create') }}" class="btn btn-success">
                    <i class="bi bi-plus"></i>
                    Create New
                </a>
            </div>
        </div>
        <table class="table bg-white">
            <thead>
                <tr class="mb-2">
                    <th>Admins</th>
                    <th>Email</th>
                    <th>Accessibility</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($users as $user)
                <tr class="mb-2 align-middle">
                    <td>
                        <a class="text-decoration-none" href="{{URL('user/edit')}}/{{$user->id}}">
                            @if($user->profile_photo)
                                <img src="{{URL($user->profile_photo)}}" class="user_listing_image">
                            @else
                                <img src="{{URL('storage/profiles/default.png')}}" class="user_listing_image">
                            @endif
                        {{$user->first_name}} {{$user->last_name}}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                        <form action="{{ route('admin-settings.delete', $user->id)}}" class="d-inline-block me-2" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger d-none" type="submit">Delete</button>
                        </form>
                        <div class="dropdown actions_dropdown">
                            <i class="bi bi-three-dots dropdown-toggle admin_settings_actions" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu bg-success text-white" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item text-white" href="{{route('admin-settings.edit', $user->id)}}">Edit</a></li>
                                <li><a class="dropdown-item text-white delete_user" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection