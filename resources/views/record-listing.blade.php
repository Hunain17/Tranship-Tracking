@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul class="mb-0">
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <h2 class="content-title my-4 font-weight-bold">Records</h2>
        <table class="table">
            <thead>
                <tr class="mb-2">
                    <th>HBL</th>
                    <th>Consignee</th>
                    <th>Container Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach($data as $item)
                <tr class="mb-2 align-middle">
                    <td>
                        <a class="text-decoration-none" href="{{URL('record/edit')}}/{{$item['id']}}">
                        {{$item['hblcode']}}
                        </a>
                        
                    </td>
                    <td>{{$item['consignee']}}</td>
                    <td>{!! implode('<br>', $item['containernumber']) !!}</td>
                    <td class="text-uppercase">{!! implode('<br>', $item['status']) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection