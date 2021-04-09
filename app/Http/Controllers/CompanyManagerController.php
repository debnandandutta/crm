<?php

namespace App\Http\Controllers;



use App\Helpers\Permissions;
use App\Models\Department;

class CompanyManagerController extends Controller
{
    public function permissionCheck()
    {
        $permission = new Permissions;
        return $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regionManager()
    {


        return view('departments.index', compact('departments'));
    }

}