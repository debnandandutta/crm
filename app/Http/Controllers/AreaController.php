<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Controllers\Controller;
use App\Region;
use App\Territory;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Auth;

class AreaController extends Controller
{
    public function index()
    {
        return view('location.area.index');
    }

    public function  addArea(){
        $regions = Region::all();
        return view('location.area.create', compact('regions'));

    }
    public function saveArea(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',

        ]);

        $name = $request->name;
        $region = $request->region;

        $saved = Area::create([
            'areaName' => $name,
            'regionId' => $region,
        ]);

        if ($saved) {
            $notify = storeNotify('Area');
        }else{
            $notify = errorNotify('Area add');
        }

        return redirect()->back()->with($notify);
    }


    public function  editArea(Request $request){
        $area = Area::where('id', $request->aid)->first();
        $regions = Region::all();
        return view('location.area.edit',compact('area', 'regions'));
    }

    public function updateArea(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $regionId= $request->region;

         $area =Area::find($request->id);
        $area->areaName = $name;
        $area->regionId = $regionId;

        if ($area->save()) {
            $notify = updateNotify('Area info');
        }else{
            $notify = errorNotify('Area info update');
        }

        return view('location.area.index')->with($notify);


    }

    public function getAreas(Request $request)
    {
        $data = DB::table('areas')
            ->join('regions', 'areas.regionId', '=', 'regions.id')
            ->select('areas.id as aid','areas.*','regions.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

        if (Auth::user()->is_admin){
                $statusRoute = route('edit-area');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="aid" value="' . $data->aid .'">
                                              
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
