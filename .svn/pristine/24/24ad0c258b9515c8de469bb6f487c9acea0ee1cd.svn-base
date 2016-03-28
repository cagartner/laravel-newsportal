<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;

use App\Settings;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::first();
        return view('backend.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsRequest $request)
    {
        $settings_id = 1;
        $settings = Settings::find($settings_id);
        $settings->name = $request->name;
        $settings->keywords = $request->keywords;
        $settings->description = $request->description;
        $settings->editor = $request->editor;
        $file = $request->file('basic_photo');
        if (!empty($file)){
            if (empty($file)){
                break;
            }
            $rules = array(
               'image' => 'mimes:png,gif,jpeg,jpg|max:1000'
           );
           $validator = \Validator::make(array('image'=> $file), $rules);
           if($validator->passes()){
                $destinationPath = 'img/settings';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                
                //meduim
                $medium_dir = 'img/settings/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(190, 46);
                $medium->save($medium_dir );

                $settings->logo = $medium_dir;
            }
            else
            {
                $errors = $validator->errors()->all();
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }

         $file = $request->file('favicon');
        if (!empty($file)){
            if (empty($file)){
                break;
            }
            $rules = array(
               'image' => 'mimes:png,gif,jpeg,jpg|max:1000'
           );
           $validator = \Validator::make(array('image'=> $file), $rules);
           if($validator->passes()){
                $destinationPath = 'img/settings/favicon';
                $filename = $file->getClientOriginalName();
                  $mime_type = $file->getMimeType();
                  $extension = $file->getClientOriginalExtension();
                  $random_name = str_random(14).'.'.$extension;
                $upload_success = $file->move($destinationPath, $random_name );
                
                //meduim
                $medium_dir = 'img/settings/favicon/'.$random_name.'';
                $medium = Image::make($upload_success)->resize(16, 16);
                $medium->save($medium_dir );

                $settings->favicon = $medium_dir;
            }
            else
            {
                $errors = $validator->errors()->all();
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }
        $settings->save();
        Flash::success('تم التعديل بنجاح');
        return redirect('admin/settings/edit');
    }

}
