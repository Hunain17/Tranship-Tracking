@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul class="mb-0">
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('record.store') }}">
            @csrf
            @foreach($settings as $setting)
                @if($setting->field_name == 'containerinformation')
                <label for="exampleFormControlInput1" class="form-label">{{$setting->field_label}}</label>
                <div class="ri_container mb-3">
                    <div class="container_record">
                        <div class="row">
                            <div class="col-3 text-center">
                                <label class="form-label font-weight-bold">Containers number</label>
                            </div>
                            <div class="col-3 text-center">
                                <label class="form-label font-weight-bold">Status</label>
                            </div>
                            <div class="col-3 text-center">
                                <label class="form-label font-weight-bold">Activity Date</label>
                            </div>
                            <div class="col-3 text-center">
                                <label class="form-label font-weight-bold">Remarks</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="containernumber[]" value="" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-3">
                                <select name="status[]" class="form-select">
                                    <option value="arvd">ARVD</option>
                                    <option value="disc">DISC</option>
                                    <option value="dct">DCT</option>
                                    <option value="rct">RCT</option>
                                    <option value="rcnee">RCNEE</option>
                                    <option value="rty">RTY</option>
                                    <option value="rshpr">RSHPR</option>
                                    <option value="load">LOAD</option>
                                    <option value="sail">SAIL</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="text" name="activitydate[]" value="" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-3">
                                <input type="text" name="remarks[]" value="" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <p class="fs-4 create_ri_record text-center mb-0 mt-3">
                        <a href="javascript:;" class="text-success font-weight-bold fs-3"><i class="bi bi-plus-circle"></i></a>
                    </p>
                </div>
                @elseif($setting->field_name == 'consignee')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{$setting->field_label}}</label>
                    <input type="text" name="{{$setting->field_name}}" class="form-control consignee_input" placeholder="Write Name" required>
                </div>
                @else
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{$setting->field_label}}</label>
                    <input type="text" name="{{$setting->field_name}}" class="form-control" placeholder="Write Name" required>
                </div>
                @endif
            @endforeach
            <div class="mb-3 mt-3">
                <div class="generate_password p-3 bg-success text-white">
                    <a href="javascript:;" class="text-success bg-white p-1 text-decoration-none">Generate Password</a>
                    <span class="ms-1 p-1"> </span> 
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection