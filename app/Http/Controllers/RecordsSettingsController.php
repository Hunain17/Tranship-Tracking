<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordsSettings;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class RecordsSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $data = array();
        if(isset($request->name)){
            foreach($request->name as $key => $name){
                $data[$key] = array(
                    'field_label' => $name,
                    'field_name' => str_replace(' ', '', strtolower($name)),
                    'order' => $key + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                );
            }
        }
        foreach($request->all() as $key => $value){
            if(strpos($key, '_') !== false){
                $id = explode('_', $key)[1];
                RecordsSettings::where('id', $id)->update(['field_label' => $value]);
            }
        }
        if(count($data))
            RecordsSettings::insert($data);
        return redirect()->route('home')->with('success', 'Fields created successfully');
    }
}
