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

    public function auth(LoginRequest $request){
        if (empty($this->adminRepository->getAdmin($request->login, $request->password))) return back();
        session()->put('admin',1);
        return redirect()->route('home');
    }

    public function home(){
        return view('home')->with('data', $this->adminRepository->getRegionsWithDistrict());
    }

    public function add(PoliclinicRequest $request){
        $this->adminRepository->addNewPoliclinic($request->name, $request->address, $request->work_time, $request->population, $request->phone, $request->departments, $request->district_id, $request->latitude, $request->longtitude);
    }
}
