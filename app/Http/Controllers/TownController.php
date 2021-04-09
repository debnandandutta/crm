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

class TownController extends Controller
{
    public function index()
    {
        $towns = Town::all();
        return view('location.town.index', compact('towns'));
    }

    public function  addTown(){
        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();
        return view('location.town.create',compact('territories','regions','areas'));
    }
    public function  editTown(Request $request){
        $town = Town::findOrFail($request->townId);
        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();
        return view('location.town.edit',compact('town','territories','regions','areas'));
    }
    public function saveTown(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $territory = $request->territory;
        $area = $request->area;
        $region = $request->region;

        $saved = Town::create([
            'townName' => $name,
            'areaId' => $area,
            'regionId' => $region,
            'territoryId' => $territory,
        ]);

        if ($saved) {
            $notify = storeNotify('Town');
        }else{
            $notify = errorNotify('Town add');
        }

        return redirect()->back()->with($notify);
    }
    public function updateTown(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $territory = $request->territory;
        $area = $request->area;
        $region = $request->region;

        $town =Town::find($request->id);

        $town->townName = $name;
        $town->regionId = $region;
        $town->areaId = $area;
        $town->territoryId = $territory;

        if ($town->save()) {
            $notify = updateNotify('Town info');
        }else{
            $notify = errorNotify('Town info update');
        }
        $towns = Town::all();
        return view('location.town.index')->with($notify);

    }
    public function getTowns(Request $request)
    {

        $data = DB::table('towns')
            ->join('regions', 'towns.regionId', '=', 'regions.id')
            ->join('areas', 'towns.areaId', '=', 'areas.id')
            ->join('territories', 'towns.territoryId', '=', 'territories.id')
            ->select('towns.id as townId','towns.*','areas.id as aid','territories.id as tid','territories.*','areas.*','regions.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

         if (Auth::user()->is_admin){
                $statusRoute = route('edit-town');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="townId" value="' . $data->townId .'">
                                              
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
