<?php

namespace App\Http\Controllers;

use Auth;
use App\Area;
use App\Http\Controllers\Controller;
use App\Manager;
use App\Region;
use App\Territory;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ManagerController extends Controller
{
    public function regionManagerList()
    {

        return view('manager.region.index');
    }
    public function areaManagerList()
    {

        return view('manager.area.index');
    }

    public function territoryManagerList()
    {

        return view('manager.territory.index');
    }

    public function salesOfficerList()
    {

        return view('manager.so.index');
    }
        public function getRegionManagers(){
            $data = DB::table('managers')
            ->where('type', '=', 1)
            ->join('regions', 'managers.regionId', '=', 'regions.id')
            ->select('managers.id as mid','managers.*','regions.id as rid','regions.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

        if (Auth::user()->is_admin){
                $statusRoute = route('edit-region-manager');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->mid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
             }else{
                 $value='';
             }

                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function getAreaManagers(){
         $data = DB::table('managers')
            ->where('type', '=', 2)
            ->join('regions', 'managers.regionId', '=', 'regions.id')
            ->join('areas', 'managers.areaId', '=', 'areas.id')
            ->select('managers.id as mid','managers.*','regions.id as rid','regions.*','areas.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

        if (Auth::user()->is_admin){
                $statusRoute = route('edit-area-manager');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->mid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
        }else{
            $value='';
        }

                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }

    public function getTerritoryManagers(){
         $user = Auth::user();
        $data = DB::table('managers')
            ->where('type', '=', 3)
            ->join('regions', 'managers.regionId', '=', 'regions.id')
            ->join('areas', 'managers.areaId', '=', 'areas.id')
            ->join('territories', 'managers.territoryId', '=', 'territories.id')
            ->select('managers.id as mid','managers.*','regions.id as rid','regions.*','areas.*','territories.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) use($user) {

        if ($user->is_admin){
                $statusRoute = route('edit-territory-manager');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->mid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
            }else{
                $value='';
            }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function getSOs(){
        $data = DB::table('managers')
            ->where('type', '=', 4)
            ->join('regions', 'managers.regionId', '=', 'regions.id')
            ->join('areas', 'managers.areaId', '=', 'areas.id')
            ->join('territories', 'managers.territoryId', '=', 'territories.id')
            ->join('towns', 'managers.townId', '=', 'towns.id')
            ->select('managers.id as mid','managers.*','regions.id as rid','regions.*','areas.*','territories.*','towns.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

        if (Auth::user()->is_admin){
                $statusRoute = route('edit-sales-officer');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->mid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
            }else{
                $value='';
            }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function addAreaManager(){
        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();
        $towns = Town::all();

        return view('manager.area.create',compact('regions','areas'));
    }


    public function addRegionManager(){

        $regions = Region::all();
        return view('manager.region.create',compact('regions'));
    }
    public function editRegionManager(Request $request){
        $regions = Region::all();
         $manager = Manager::findOrFail($request->id);
        return view('manager.region.edit',compact('regions','manager'));
    }

    public function editAreaManager(Request $request){
        $regions = Region::all();
        $areas = Area::all();
        $manager = Manager::findOrFail($request->id);
        return view('manager.area.edit',compact('regions','manager','areas'));
    }

    public function saveRegionManager(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $region = $request->region;
        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;

        $saved = Manager::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'type' => $type,
            'regionId' => $region,
            'areaId' => 0,
            'territoryId' => 0,
            'townId' => 0,
        ]);

        if ($saved) {
            $notify = storeNotify('Region Manager');
        }else{
            $notify = errorNotify('Region Manager add');
        }

        return redirect()->back()->with($notify);
    }


    public function updateRegionManager(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;
        $region = $request->region;
        $manager =Manager::find($request->id);

        $manager->name = $name;
        $manager->email = $email;
        $manager->mobile = $mobile;
        $manager->regionId = $region;
        $manager->type = $type;


        if ($manager->save()) {
            $notify = updateNotify('Region Manager info');
        }else{
            $notify = errorNotify('Region Manager info update');
        }
        $towns = Town::all();
        return view('manager.region.index')->with($notify);

    }

    public function saveAreaManager(Request $request){


        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $region = $request->region;
        $area = $request->area;
        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;

        $saved = Manager::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'type' => $type,
            'regionId' => $region,
            'areaId' => $area,
            'territoryId' => 0,
            'townId' => 0,
        ]);

        if ($saved) {
            $notify = storeNotify('Area Manager');
        }else{
            $notify = errorNotify('Area Manager add');
        }

        return redirect()->back()->with($notify);

    }
    public function updateAreaManager(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;
        $region = $request->region;
        $area = $request->area;
        $manager =Manager::find($request->id);

        $manager->name = $name;
        $manager->email = $email;
        $manager->mobile = $mobile;
        $manager->regionId = $region;
        $manager->areaId = $area;
        $manager->type = $type;


        if ($manager->save()) {
            $notify = updateNotify('Area Manager info');
        }else{
            $notify = errorNotify('Area Manager info update');
        }
        $towns = Town::all();
        return view('manager.area.index')->with($notify);

    }
    public function addTerritoryManager(){

        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();

        return view('manager.territory.create',compact('regions','territories', 'areas'));
    }
    public function saveTerritoryManager(Request $request){


        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $region = $request->region;
        $area = $request->area;
        $territory = $request->territory;
        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;

        $saved = Manager::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'type' => $type,
            'regionId' => $region,
            'areaId' => $area,
            'territoryId' => $territory,
            'townId' => 0,
        ]);

        if ($saved) {
            $notify = storeNotify('Territory Manager');
        }else{
            $notify = errorNotify('Territory Manager add');
        }

        return view('manager.territory.index')->with($notify);

    }
    public function editTerritoryManager(Request $request){

        $regions = Region::all();
        $areas = Area::all();
        $territories = Territory::all();
        $manager = Manager::findOrFail($request->id);
        return view('manager.territory.edit',compact('regions','manager','areas','territories'));
    }

    public function updateTerritoryManager(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;
        $region = $request->region;
        $territory = $request->territory;
        $area = $request->area;
        $manager =Manager::find($request->id);

        $manager->name = $name;
        $manager->email = $email;
        $manager->mobile = $mobile;
        $manager->regionId = $region;
        $manager->areaId = $area;
        $manager->territoryId = $territory;
        $manager->type = $type;


        if ($manager->save()) {
            $notify = updateNotify('Territory Manager info');
        }else{
            $notify = errorNotify('Territory Manager info update');
        }
        $towns = Town::all();
        return view('manager.territory.index')->with($notify);

    }
    public function addSO(){

        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();
        $towns = Town::all();

        return view('manager.so.create',compact('regions','territories', 'areas','towns'));
    }

    public function editSO(Request $request){
        $regions = Region::all();
        $areas = Area::all();
        $territories = Territory::all();
        $towns = Town::all();
        $manager = Manager::findOrFail($request->id);
        return view('manager.so.edit',compact('regions','manager','areas','territories','towns'));
    }
    public function updateSO(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;

        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;
        $region = $request->region;
        $territory = $request->territory;
        $area = $request->area;
        $town = $request->town;
        $manager =Manager::find($request->id);

        $manager->name = $name;
        $manager->email = $email;
        $manager->mobile = $mobile;
        $manager->regionId = $region;
        $manager->areaId = $area;
        $manager->townId = $town;
        $manager->territoryId = $territory;
        $manager->type = $type;


        if ($manager->save()) {
            $notify = updateNotify('Sales Officer info');
        }else{
            $notify = errorNotify('Sales Officer info update');
        }
        $towns = Town::all();
        return view('manager.so.index')->with($notify);

    }
    public function saveSO(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $region = $request->region;
        $area = $request->area;
        $territory = $request->territory;
        $town = $request->town;
        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;

        $saved = Manager::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'type' => $type,
            'regionId' => $region,
            'areaId' => $area,
            'territoryId' => $territory,
            'townId' => $town,
        ]);

        if ($saved) {
            $notify = storeNotify('Sales Officer');
        }else{
            $notify = errorNotify('Sales Officer add');
        }

        return view('manager.so.index')->with($notify);

    }

    static function getArea($id){
        $data = Area::find($id);

        return $data->areaName;
    }
    static function getTown($id){
        $data = Town::find($id);

        return $data->townName;
    }
    static function getTerritory($id){
        $data = Territory::find($id);

        return $data->territoryName;
    }
    static function getRegion($id){
        $data = Region::find($id);

        return $data->title;
    }
}
