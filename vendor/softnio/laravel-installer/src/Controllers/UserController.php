<?php

namespace Nio\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
//use Softnio\LaravelInstaller\Helpers\EnvironmentManager;
//use Softnio\LaravelInstaller\Events\EnvironmentSaved;
//use Validator;
use DB;
use Exception;

class UserController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    //protected $EnvironmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    /*public function __construct(EnvironmentManager $environmentManager)
    {
        //$this->EnvironmentManager = $environmentManager;
    }*/

    /**
     * Display the Environment menu page.
     *
     * @return \Illuminate\View\View
     */
    public function userMenu()
    {
        return view('vendor.installer.user');
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function userSaveWizard(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        \Cache ::put('username', $name);
        \Cache ::put('email', $email);
        \Cache ::put('password', $password);

        return redirect()->route('LaravelInstaller::environmentWizard')->with('name','email','password');
    }
}
