<?php

namespace App\Http\Controllers;

use App\Models\CreateRecord;
use Illuminate\Http\Request;
use App\Models\RecordsSettings;
use Carbon\Carbon;

class CreateRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = CreateRecord::all();
        $data = array();
        $listing = array('hblcode', 'containernumber', 'consignee', 'status');
        foreach($records as $key => $record){
            $id = $record->id;
            $status = $record->status ? 'Active' : 'Inactive';
            $arr = json_decode($record->content);
            $item = array();
            foreach($arr as $mykey => $value){
                $key = explode('_', $mykey)[0];
                if (in_array($key, $listing)) {
                    $item[$key] = $value;
                }
                
            }
            $item['id'] = $id;
            $item['record_status'] = $status;
            $data[] = $item;
        }
        return view('record-listing', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = RecordsSettings::all();
        return view('record', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $insert = array(
            'content' => json_encode($data),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        );
        CreateRecord::insert($insert);
        return redirect('record')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateRecord  $createRecord
     * @return \Illuminate\Http\Response
     */
    public function show(CreateRecord $createRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateRecord  $createRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fields = RecordsSettings::all();
        $record = CreateRecord::where('id', $id)->first();
        $content = json_decode($record->content, true);
        return view('record-edit', compact('fields', 'record', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateRecord  $createRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        CreateRecord::where('id', $id)->update(['content'=> json_encode($data)]);
        return redirect('/record')->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateRecord  $createRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CreateRecord::find($id)->delete();
        return redirect('/record')->with('success', 'Record deleted with id='.$id);
    }

    public function inactive($id){
        CreateRecord::where('id', $id)->update(['status' => '0']);
        return redirect('/record/edit/'.$id)->with("success", "Record with id=".$id." status changed to in-active");
    }

    public function activate($id){
        CreateRecord::where('id', $id)->update(['status' => '1']);
        return redirect('/record/edit/'.$id)->with("success", "Record with id=".$id." status changed to active");
    }
}
