<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\District;
use App\Models\Polyclinic;
use App\Models\Region;
use http\Env\Request;

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

    public function addNewPoliclinic(
        $name_uz,
        $name_ru,
        $name_en,
        $address_uz,
        $address_ru,
        $address_en,
        $work_time,
        $population,
        $phone,
        $departments_uz,
        $departments_ru,
        $departments_en,
        $district_id,
        $latitude,
        $longitude,
        $target_uz=null,
        $target_ru=null,
        $target_en=null
    ){
        $policlinic = new Polyclinic;
        $policlinic->name_uz = $name_uz;
        $policlinic->name_ru = $name_ru;
        $policlinic->name_en = $name_en;
        $policlinic->address_uz = $address_uz;
        $policlinic->address_ru = $address_ru;
        $policlinic->address_en = $address_en;
        $policlinic->work_time = $work_time;
        $policlinic->population = $population;
        $policlinic->phone = $phone;
        $policlinic->departments_uz = $departments_uz;
        $policlinic->departments_ru = $departments_ru;
        $policlinic->departments_en = $departments_en;
        $policlinic->district_id = $district_id;
        $policlinic->latitude = $latitude;
        $policlinic->longitude = $longitude;
        $policlinic->target_uz = $target_uz;
        $policlinic->target_ru = $target_ru;
        $policlinic->target_en = $target_en;
        $policlinic->save();

        District::where('id', $district_id)->increment('polyclinics_count');
    }


    public function getPolyclinics($district_id){
        return Polyclinic::where('district_id', $district_id)->get();
    }

    public function getDistrict($id){
        return District::find($id);
    }

    public function getPoliclinic($id){
        return Polyclinic::find($id);
    }

    public function delete($district_id, $id){
        Polyclinic::where('id', $id)->delete();
        District::where('id', $district_id)->decrement('polyclinics_count');
    }

    public function edit($array){
        $polyclinic = Polyclinic::find($array->id);
        $polyclinic->name_uz = $array->name_uz;
        $polyclinic->name_ru = $array->name_ru;
        $polyclinic->name_en = $array->name_en;
        $polyclinic->address_uz = $array->address_uz;
        $polyclinic->address_ru = $array->address_ru;
        $polyclinic->address_en = $array->address_en;
        $polyclinic->work_time = $array->work_time;
        $polyclinic->population = $array->population;
        $polyclinic->phone = $array->phone;
        $polyclinic->departments_uz = $array->departments_uz;
        $polyclinic->departments_ru = $array->departments_ru;
        $polyclinic->departments_en = $array->departments_en;
        $polyclinic->latitude = $array->latitude;
        $polyclinic->longitude = $array->longitude;
        $polyclinic->target_uz = $array->target_uz;
        $polyclinic->target_ru = $array->target_ru;
        $polyclinic->target_en = $array->target_en;
        $polyclinic->save();
    }

    public function get_admin(){
        return Admin::find(1);
    }

    public function adminUpdate($new_password){
        $admin = Admin::find(1);
        $admin->password = md5(md5($new_password));
        $admin->save();
    }
}
