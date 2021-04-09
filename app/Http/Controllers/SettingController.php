<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class SettingController extends Controller
{
    public function settingIndex()
    {
        $setting = GeneralSetting::first();

        return view('settings.app-setting', compact('setting'));
    }

    public function appSettingUpdate(Request $request, GeneralSetting $setting)
    {
        $data = $request->all();
        $update = $setting->update($data);

        if ($update) {
            $notify = updateNotify('App setting');
        }else{
            $notify = errorNotify('App setting');
        }

        return redirect()->back()->with($notify);

    }

    public function emailSetting()
    {
        $setting = GeneralSetting::first();

        return view('settings.emailconfig',compact('setting'));
    }

    public function emailSettingUpdate(Request $request, GeneralSetting $setting)
    {
        $this->validate($request, [
            'from_name' => 'required',
            'from_email' => 'required',
            'mail_driver' => 'required',
        ]);

        $data = $request->all();
        $update = $setting->update($data);

        if ($update) {
            $notify = updateNotify('Email setting has been');
        }else{
            $notify = errorNotify('Email setting');
        }

        return redirect()->back()->with($notify);
    }
}
