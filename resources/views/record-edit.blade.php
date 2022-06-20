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
        <form method="POST" action="{{ route('record.update', $record->id) }}">
            @method('PUT')
            @csrf
            @foreach($fields as $setting)
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
                        @for($count = 0; $count < count($content['status']); $count++)
                        <div class="row mt-3">
                            <div class="col-3">
                                <input type="text" name="containernumber[]" value="<?php echo $content['containernumber'][$count]; ?>" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-3">
                                <select name="status[]" class="form-select">
                                    <option value="arvd" <?php if($content['status'][$count] == 'arvd'){ echo 'selected'; } ?>>ARVD</option>
                                    <option value="disc" <?php if($content['status'][$count] == 'disc'){ echo 'selected'; } ?>>DISC</option>
                                    <option value="dct" <?php if($content['status'][$count] == 'dct'){ echo 'selected'; } ?>>DCT</option>
                                    <option value="rct" <?php if($content['status'][$count] == 'rct'){ echo 'selected'; } ?>>RCT</option>
                                    <option value="rcnee" <?php if($content['status'][$count] == 'rcnee'){ echo 'selected'; } ?>>RCNEE</option>
                                    <option value="rty" <?php if($content['status'][$count] == 'rty'){ echo 'selected'; } ?>>RTY</option>
                                    <option value="rshpr" <?php if($content['status'][$count] == 'rshpr'){ echo 'selected'; } ?>>RSHPR</option>
                                    <option value="load" <?php if($content['status'][$count] == 'load'){ echo 'selected'; } ?>>LOAD</option>
                                    <option value="sail" <?php if($content['status'][$count] == 'sail'){ echo 'selected'; } ?>>SAIL</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="text" name="activitydate[]" value="<?php echo $content['activitydate'][$count]; ?>" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-3">
                                <input type="text" name="remarks[]" value="<?php echo $content['remarks'][$count]; ?>" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <p class="fs-4 create_ri_record text-center mb-0 mt-3">
                        <a href="javascript:;" class="text-success font-weight-bold fs-3"><i class="bi bi-plus-circle"></i></a>
                    </p>
                </div>
                @elseif($setting->field_name == 'consignee')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{$setting->field_label}}</label>
                    <input type="text" name="{{$setting->field_name}}" value="{{$content[$setting->field_name]}}" class="form-control consignee_input" placeholder="Write Name" required>
                </div>
                @else
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">{{$setting->field_label}}</label>
                    <input type="text" name="{{$setting->field_name}}" value="{{$content[$setting->field_name]}}" class="form-control" placeholder="Write Name" required>
                </div>
                @endif
            @endforeach
            <button type="submit" class="d-none edit_from_submit">Save</button>
        </form>
        
        <button type="submit" class="btn btn-success me-2" id="submit_edit_record">Save</button>
        <form action="{{ route('record.delete', $record->id)}}" class="d-inline-block me-2" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>
        @if($record->status == 1)
            <a href="{{route('record.inactive', $record->id)}}" type="button" class="btn btn-outline-secondary">Mark In-active</a>
        @else
        <a href="{{route('record.activate', $record->id)}}" type="button" class="btn btn-outline-secondary">Mark Active</a>
        @endif
    </div>
</div>
@endsection