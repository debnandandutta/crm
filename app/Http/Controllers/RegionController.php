<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;

class RegionController extends Controller
{
    public function index()
    {

        $regions = Region::all();
        return view('location.region', compact('regions'));
    }

    public function  addRegion(){
        return view('location.createRegion');
    }
    public function  editRegion(Request $request){
        $region = Region::findOrFail($request->id);
        return view('location.editRegion',compact('region'));
    }
    public function saveRegion(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $saved = Region::create([
            'title' => $name
        ]);

        if ($saved) {
            $notify = storeNotify('Region');
        }else{
            $notify = errorNotify('Region add');
        }

        return redirect()->back()->with($notify);
    }
    public function updateRegion(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $region =Region::find($request->id);
        $region->title = $name;
        if ($region->save()) {
            $notify = updateNotify('Region info');
        }else{
            $notify = errorNotify('Region info update');
        }
        $regions = Region::all();
        return view('location.region', compact('regions'))->with($notify);

    }

    public function getRegions(Request $request)
    {
        $data = Region::query();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {


        if (Auth::user()->is_admin){
                $statusRoute = route('edit-regions');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->id .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
        }else{
            $value='';
        }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
}
