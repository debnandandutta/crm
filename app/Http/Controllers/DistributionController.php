<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Controllers\Controller;
use App\Manager;
use App\Region;
use App\Retailer;
use App\Territory;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Auth;

class DistributionController extends Controller
{
    public function index()
    {

        return view('distributions.index');
    }

    public function getDistributions()
    {
        $data = DB::table('retailers')
            ->where('type', '=', 2)
            ->join('regions', 'retailers.regionId', '=', 'regions.id')
            ->join('areas', 'retailers.areaId', '=', 'areas.id')
            ->join('territories', 'retailers.territoryId', '=', 'territories.id')
            ->join('towns', 'retailers.townId', '=', 'towns.id')
            ->select('retailers.id as rid','retailers.*','regions.*','areas.*','territories.*','towns.*')
            ->get();

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

  if (Auth::user()->is_admin){
                $statusRoute = route('edit-distribution');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <input type="hidden" name="id" value="' . $data->rid .'">
                                              
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
 }else{
                    $value='';
                }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }

    public function addDistribution(){

        $territories = Territory::all();
        $regions = Region::all();
        $areas = Area::all();
        $towns = Town::all();

        return view('distributions.create',compact('regions','territories', 'areas','towns'));
    }

    public function editDistribution(Request $request){
        $regions = Region::all();
        $areas = Area::all();
        $territories = Territory::all();
        $towns = Town::all();
        $retailer = Retailer::findOrFail($request->id);
        return view('distributions.edit',compact('regions','retailer','areas','territories','towns'));
    }

    public function saveDistribution(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $address = $request->address;
        $region = $request->region;
        $area = $request->area;
        $territory = $request->territory;
        $town = $request->town;

        $type = $request->type;

        $saved = Retailer::create([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'address' => $address,
            'type' => $type,
            'regionId' => $region,
            'areaId' => $area,
            'territoryId' => $territory,
            'townId' => $town,
        ]);

        if ($saved) {
            $notify = storeNotify('Distribution Office');
        }else{
            $notify = errorNotify('Distribution Office add');
        }

        return view('distributions.index')->with($notify);

    }
    public function updateDistribution(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $address = $request->address;
        $email = $request->email;
        $mobile = $request->mobile;
        $type = $request->type;
        $region = $request->region;
        $territory = $request->territory;
        $area = $request->area;
        $town = $request->town;
        $data =Retailer::find($request->id);

        $data->name = $name;
        $data->email = $email;
        $data->email = $address;
        $data->mobile = $mobile;
        $data->regionId = $region;
        $data->areaId = $area;
        $data->townId = $town;
        $data->territoryId = $territory;
        $data->type = $type;


        if ($data->save()) {
            $notify = updateNotify('Distribution Office info');
        }else{
            $notify = errorNotify('Distribution Office info update');
        }

        return view('distributions.index')->with($notify);

    }
}
