<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Polyclinic;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function getRegions(){
        $regions = Region::all();
        return response()->json($regions);
    }

    public function zones(){
        $zones = Region::with('districts')->get();
        return response()->json($zones);
    }

    public function getDistricts($region_id){
        $districts = District::where('region_id', $region_id)->get();
        return response()->json($districts);
    }

    public function getDistrict($district_id){
        $district = District::find($district_id)->first();
        return response()->json($district);
    }

    public function getPolyclinics($district_id){
        $polyclinics = Polyclinic::where('district_id', $district_id)->get();
        return response()->json($polyclinics);
    }

    public function getPolyclinic($id){
        $polyclinic = Polyclinic::find($id)->first();
        return response()->json($polyclinic);
    }
}
