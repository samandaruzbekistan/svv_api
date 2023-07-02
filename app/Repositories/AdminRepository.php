<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Polyclinic;
use App\Models\Region;

class AdminRepository
{
    public function getAdmin($login, $password)
    {
        return Admin::where('login', $login)
            ->where('password', md5(md5($password)))
            ->first();
    }

    public function getRegionsWithDistrict(){
        return Region::with('districts')->get();
    }

    public function addNewPoliclinic($name, $address, $work_time, $population, $phone, $departments, $district_id, $latitude, $longitude, $target=null){
        $policlinic = new Polyclinic;
        $policlinic->name = $name;
        $policlinic->address = $address;
        $policlinic->work_time = $work_time;
        $policlinic->population = $population;
        $policlinic->phone = $phone;
        $policlinic->departments = $departments;
        $policlinic->district_id = $district_id;
        $policlinic->latitude = $latitude;
        $policlinic->longitude = $longitude;
        $policlinic->target = $target;
        $policlinic->save();
    }
}
