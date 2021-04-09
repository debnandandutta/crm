<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;

class ItemController extends Controller
{

    public function index($type)
    {

        return view('items.index', compact('type'));

    }

    public function  addItemCall(){
        $type=1;
        return view('items.create',compact('type'));
    }
    public function  addItemComplain(){
        $type=2;
        return view('items.create',compact('type'));
    }
    public function  addItemRoot(){
        $type=3;
        return view('items.create',compact('type'));
    }
    public function  addItemMarketChannel(){
        $type=4;
        return view('items.create',compact('type'));
    }
    public function  edit(Request $request){
        $item = Item::findOrFail($request->id);
        return view('items.edit',compact('item'));
    }
    public function save(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $type = $request->type;

        $saved = Item::create([
            'name' => $name,
            'type' => $type
        ]);

        if ($saved) {
            $notify = storeNotify('Items');
        }else{
            $notify = errorNotify('Items add');
        }

        return redirect()->back()->with($notify);
    }
    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);

        $name = $request->name;
        $type = $request->type;

        $item =Item::find($request->id);
        $item->name = $name;
        $item->type = $type;
        if ($item->save()) {
            $notify = updateNotify('Item info');
        }else{
            $notify = errorNotify('Item info update');
        }

        switch ($type){
            case 1:
                $type = "call-type";
                break;
            case 2:
                $type = "complain-type";
                break;
            case 3:
                $type = "root-cause";
                break;
            case 4:
                $type = "market-channel";
                break;
        }

        return view('items.index', compact('type'));

    }

    public function getItemCallType(Request $request)
    {
        $data = Item::where('type', 1);

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

  if (Auth::user()->is_admin){
                $statusRoute = route('edit-item');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                               
                                                <input type="hidden" name="id" value="' . $data->id .'">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
  }else{
                    $value='';
                }

                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function getItemComplainType(Request $request)
    {
        $data = Item::where('type', 2);

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

     if (Auth::user()->is_admin){
                $statusRoute = route('edit-item');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                               
                                                <input type="hidden" name="id" value="' . $data->id .'">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
             }else{
                    $value='';
                }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function getItemRootCause(Request $request)
    {
        $data = Item::where('type', 3);

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

  if (Auth::user()->is_admin){
                $statusRoute = route('edit-item');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                               
                                                <input type="hidden" name="id" value="' . $data->id .'">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
                                                <button type="submit" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </form>';
 }else{
                    $value='';
                }
                return $value;
            })
            ->rawColumns(['action'])->make(true);
    }
    public function getItemMarketChannel(Request $request)
    {
        $data = Item::where('type', 4);

        return DataTables::of($data)

            ->addColumn('action', function ($data) {

  if (Auth::user()->is_admin){
                $statusRoute = route('edit-item');
                $value = '<form action="' . $statusRoute . '" method="POST">
                                               
                                                <input type="hidden" name="id" value="' . $data->id .'">
                                                <input type="hidden" name="_token" value="' . csrf_token() .'">
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
