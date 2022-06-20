@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <h2 class="content-title my-4 font-weight-bold">Record Fields</h2>
        <form method="POST" action="{{ route('store.fields') }}" id="create_fields_form">
            @csrf
            <div class="form_fields_container">
                @foreach($records as $record)
                <div class="mb-3">
                    <input type="text" name="update_{{$record->id}}" class="form-control" value="{{$record->field_label}}" placeholder="Write Title" required>
                </div>
                @endforeach
            </div>
            <p class="fs-4 create_field">
                <a href="javascript:;" class="text-success font-weight-bold fs-3"><i class="bi bi-plus-circle"></i></a>
                Create New Field
            </p>
            <button type="submit" class="btn btn-success visually-hidden" id="hidden_field_submit">Save</button>
        </form>
    </div>
    <div class="col-12">
        <div class="text-end" id="create_fields_buttons">
            <!-- <button type="button" class="btn btn-outline-secondary">Delete</button> -->
            <button type="submit" class="btn btn-success" id="submit_fields_button">Save</button>
        </div>
    </div>
</div>
@endsection
