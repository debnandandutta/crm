<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Controllers\Controller;
use App\Region;
use App\Town;
use App\Territory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Auth;

class TerritoryController extends Controller
{
    public function index()
    {
        return view('location.territory.index');
    }

    public function getTerritories(Request $request)
    {
        $data =  DB::table('territories')
            ->join('areas', 'territories.areaId', '=', 'areas.id')
            ->join('regions', 'territories.regionId', '=', 'regions.id')
            ->select('areas.id as aid','territories.id as tid','territories.*','areas.*','regions.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

        if (Auth::user()->is_admin){
                $statusRoute = route('edit-territory');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="tid" value="' . $data->tid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
            }else{
                    $value='';
                }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }

    public function  addTerritory(){

        $regions = Region::all();
        $areas = Area::all();

        return view('location.territory.create', compact('regions','areas'));

    }
    public function saveTerritory(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',

        ]);

        $name = $request->name;
        $area = $request->area;
        $region = $request->region;


        $saved = Territory::create([
            'territoryName' => $name,
            'areaId' => $area,
            'regionId' => $region,
        ]);

        if ($saved) {
            $notify = storeNotify('Territory');
        }else{
            $notify = errorNotify('Territory add');
        }

        return redirect()->back()->with($notify);
    }
    public function  editTerritory(Request $request){
         $territory = Territory::where('id', $request->tid)->first();
        $regions = Region::all();
        $areas = Area::all();
        return view('location.territory.edit',compact('territory','regions','areas'));
    }
    public function updateTerritory(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $area = $request->area;
        $region = $request->region;

        $territory =Territory::find($request->id);
        $territory->territoryName = $name;
        $territory->areaId = $area;
        $territory->regionId = $region;


        if ($territory->save()) {
            $notify = updateNotify('Territory info');
        }else{
            $notify = errorNotify('Territory info update');
        }

        return view('location.territory.index')->with($notify);


    }

}
