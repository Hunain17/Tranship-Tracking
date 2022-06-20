@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('admin-settings.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="content-title font-weight-bold">Update Admin</h2>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label fw-bold mb-0">First Name</label>
                    <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label fw-bold mb-0">Last Name</label>
                    <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-8">
                    <label for="exampleFormControlInput1" class="form-label fw-bold mb-0">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            @if($user->profile_photo)
            <img class="user_profile_img" src="{{URL($user->profile_photo)}}">
            @else
            <img class="user_profile_img" src="{{URL('storage/profiles/default.png')}}">
            @endif
            <img class="user_profile_new" src="">
            <input type="file" name="user_profile" class="d-none" id="user_profile" accept="image/*">
            <span class="px-3 py-1 user_profile_upload fw-bold">
                <i class="bi bi-cloud-arrow-up-fill"></i>
                Upload
            </span>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label d-block fw-bold mb-0">Accessibility</label>
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="role_id" <?php if($user->role_id == 1){ echo 'checked'; }?> value="1" id="radio1" autocomplete="off">
                    <label class="btn btn-outline-success me-4 rounded" for="radio1">Master Admin</label>
                
                    <input type="radio" class="btn-check" name="role_id" value="2" id="radio2" autocomplete="off" <?php if($user->role_id == 2){ echo 'checked'; }?>>
                    <label class="btn btn-outline-success me-4 rounded" for="radio2">Create Record</label>
                
                    <input type="radio" class="btn-check" name="role_id" value="3" id="radio3" autocomplete="off" <?php if($user->role_id == 3){ echo 'checked'; }?>>
                    <label class="btn btn-outline-success me-4 rounded" for="radio3">Record</label>
                
                    <input type="radio" class="btn-check" name="role_id" value="4" id="radio4" autocomplete="off" <?php if($user->role_id == 4){ echo 'checked'; }?>>
                    <label class="btn btn-outline-success rounded" for="radio4">Records Setting</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="create_admin_form_btn" class="d-none">save</button>
</form>
<div class="row">
    <div class="col-12 text-end">
        <hr class="mt-4">
        <button class="btn btn-success" id="submit_create_admin">Save Changes</button>
    </div>
</div>
@endsection