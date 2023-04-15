<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Country;
use Exception;
use Illuminate\Support\Facades\Cache;
class AddressRepository implements AddressRepositoryInterface{
    public function getAllCountry(){
        $countries = Cache::remember('allCountries','60*60', function(){
            return Country::orderBy('id','desc')->get();
        });
        return $countries;
    }
    public function getCountryById($CountryId){
        return Country::findOrFail($CountryId);
    }
    public function deleteCountry($CountryId){
        Cache::forget('allCountry');
        return Country::destroy($CountryId);
    }
    public function createCountry(object $CountryDetails){
        Cache::forget('allCountry');
        $data = [
            'name' => $CountryDetails->name,
            // 'iso3' => $ProductDetails->iso3,
            // 'iso3' => $ProductDetails->iso3,
            'phonecode' => $ProductDetails->phonecode,
            'phonecode' => $ProductDetails->phonecode,
        ];
        if($ProductDetails->file('image')){
            $uploadFile = uploadFile($ProductDetails->file('image'),'products'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        $data['created_by'] = Auth()->user()->id;
        return Product::create($data);
    }
    public function updateProduct($ProductId, object $newDetails){
        Cache::forget('allProducts');
        $data = [
            'name' => $newDetails->name,
            'description' => $newDetails->description,
        ];
        if($newDetails->file('image')){
            $uploadFile = uploadFile($newDetails->file('image'),'products'); //uploadFile from helper.php
            $data['image'] = $uploadFile;
        }
        return Product::whereId($ProductId)->update($data);
    }
}
