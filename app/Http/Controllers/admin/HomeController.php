<?php

namespace App\Http\Controllers\admin;

use Exception;
use File;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function setting(){
        $setting = Setting::first();
        return view('admin.setting',compact('setting'));
    }
    public function getSetting(){
        $setting = Setting::first();
        return response()->json($setting);
    }
    public function postSetting(Request $request){
        
            $setting = Setting::first();
            $setting->name = $request->name;
            $setting->description = $request->description;
            $setting->position_array = $request->position_array;
            $setting->experience_year = $request->experience_year;
            $setting->completed_projects = $request->completed_projects;
            $setting->about_description = $request->about_description;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->messenger_link = $request->messenger_link;
            $setting->facebook_link = $request->facebook_link;
            $setting->instagram_link = $request->instagram_link;
            $setting->github_link = $request->github_link;
            

            if(isset($request->poster_base64)) {
                if($request->poster_base64 == 'Empty') {
                    Storage::disk('public')->delete('img/'.$setting->photo);
                    $poster_image = Null;
                }else {

                    if (File::exists(public_path('img/'.$setting->photo))) {
                        File::delete(public_path('img/'.$setting->photo));
                     }
                    $poster_image = $this->storeBase64($request->poster_base64,$request->file('poster_image'));
                }
                
            }else {
                $poster_image = $setting->photo;
            }
            if ($request->hasFile('cv_pdf')) {
                $fileNameWithExt = $request->file('cv_pdf')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME); 
                $extension = $request->file('cv_pdf')->getClientOriginalExtension(); 
                $fileNameToStore = $fileName.'_'.time().'.'.$extension; 
                $request->file('cv_pdf')->storeAs('public/file', $fileNameToStore);
                $filePath = 'public/file/' . $setting->cv_pdf;

            
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
                $setting->cv_pdf = $fileNameToStore;
            }
        
            $setting->photo = $poster_image;
            $setting->save();
    
            return redirect()->route('admin.setting');
    
    }
    private function storeBase64($imageBase64,$fileName) 
    { 
        try{
            list($type, $imageBase64) = explode(';', $imageBase64);
            list(, $imageBase64)      = explode(',', $imageBase64);
            $imageBase64 = base64_decode($imageBase64);
            $extension = $fileName->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
    
    
            $path = public_path('img/');
    
            !file_exists($path) && mkdir($path, 0777, true);
    
            $success = file_put_contents($path .$imageName, $imageBase64);
    
            return $imageName;
        }
        catch (Exception $e) {
            
            Log::error('Exception caught while saving setting: ' . $e->getMessage());

            return response()->json(['error' => 'An error occurred while saving the setting. Please try again later.'], 500);
        }
    }
}
