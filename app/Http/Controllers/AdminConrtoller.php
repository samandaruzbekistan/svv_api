<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PoliclinicRequest;
use App\Models\Region;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminConrtoller extends Controller
{

    public function __construct(protected AdminRepository $adminRepository)
    {
    }

    const SUCCESSFULLY = 1;
    const DELETE = 2;
    const EDIT = 3;
    const PASSWORD_INCORRECT = 4;

    public function auth(LoginRequest $request){
        if (empty($this->adminRepository->getAdmin($request->login, $request->password))) return back();
        session()->put('admin',1);
        return redirect()->route('home');
    }

    public function home(){
        return view('home', ['data' => $this->adminRepository->getRegionsWithDistrict()]);
    }

    public function logout(){
        session()->flush();
        return redirect()->route('admin_login');
    }

    public function polyclinics($district_id){
        return view('polyclinics', ['polyclinics' => $this->adminRepository->getPolyclinics($district_id), 'district' => $this->adminRepository->getDistrict($district_id)]);
    }

    public function delete(Request $request,$polyclinic_id){
        $this->adminRepository->delete($request->district_id, $polyclinic_id);
        return back()->with('backData', self::DELETE);
    }

    public function edit($polyclinic_id){
        $polyclinic = $this->adminRepository->getPoliclinic($polyclinic_id);
        return view('edit', ['polyclinic' => $polyclinic]);
    }

    public function update(Request $request){
        $this->adminRepository->edit($request);
        return redirect()->route('polyclinics', ['district_id' => $request->district_id])->with('backData', self::EDIT);
    }

    public function add(PoliclinicRequest $request){
        $this->adminRepository->addNewPoliclinic(
            $request->name_uz,
            $request->name_ru,
            $request->name_en,
            $request->address_uz,
            $request->address_ru,
            $request->address_en,
            $request->work_time,
            $request->population,
            $request->phone,
            $request->departments_uz,
            $request->departments_ru,
            $request->departments_en,
            $request->district_id,
            $request->latitude,
            $request->longitude,
            $request->target_uz,
            $request->target_ru,
            $request->target_en,
        );
        return redirect()->route('polyclinics', ['district_id' => $request->district_id])->with('backData', self::SUCCESSFULLY);
    }

    public function admin_update(Request $request){
        $admin = $this->adminRepository->get_admin();
        if ($admin->password != md5(md5($request->password))){
            return back()->with('backData', self::PASSWORD_INCORRECT);
        }
        $this->adminRepository->adminUpdate($request->new_password);
        return back()->with('backData', self::SUCCESSFULLY);
    }

}
