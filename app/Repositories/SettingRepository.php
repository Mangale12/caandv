<?php

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use App\Models\Country;

class SettingRepository implements SettingRepositoryInterface{
    public function getAllSettings(){
        $settings = Cache::remember('settings',config('app.cache_time'), function(){
            return Setting::first();
        });
        return $settings;
    }
    public function getSettingById($id){
        return Setting::findOrFail($id);
    }
    public function deleteSetting($id){
        Cache::forget('settings');
        return Setting::destroy($id);
    }
    public function createSetting(object $SettingDetails){
        $data = [
            'question' => $SettingDetails->question,
            'answer' => $SettingDetails->answer,
        ];
        $data['created_by'] = Auth()->user()->id;
        return Setting::create($data);
    }
    public function updateSetting($id, object $SettingDetails){
        Cache::forget('settings');
        $setting = Setting::find($id);
        $data = [
            'phone' => $SettingDetails->phone,
            'mobile' => $SettingDetails->mobile,
            'email' => $SettingDetails->email,
            'opening_hours' => $SettingDetails->opening_hours,
            'location' => $SettingDetails->location,
            'address' => $SettingDetails->address,
            'instagram' => $SettingDetails->instagram,
            'facebook' => $SettingDetails->facebook,
            'twitter' => $SettingDetails->twitter,
            'youtube' => $SettingDetails->youtube,
            'logo' => $SettingDetails->logo,
            'register_image'=>$SettingDetails->register_image,
        ];
        if($SettingDetails->file('logo')){
            $uploadFile = uploadFile($SettingDetails->file('logo'),''); //uploadFile from helper.php
            $data['logo'] = $uploadFile;
        }else{
            $data['logo'] = $setting->logo;
        }
        if($SettingDetails->file('register_image')){
            $uploadFile = uploadFile($SettingDetails->file('register_image'),''); //uploadFile from helper.php
            $data['register_image'] = $uploadFile;
        }else{
            $data['register_image'] = $setting->logo;
        }
        return Setting::whereId($id)->update($data);
    }
    public function getCountry($name){
        return Country::where('name',$name)->first();
    }
}
