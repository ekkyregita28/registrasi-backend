<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Admin;
use App\Models\Api\Daerah;
use App\Models\Api\Provinsi;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class AdminController extends BaseController
{
    public function index(){
        $admin = Admin::all();

        if ($admin == null) 
            return $this->sendError('Admin Empty', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List Admin', Response::HTTP_OK, $admin);
    }
    
    public function show($id){
        $admin = Admin::find($id);

       if($admin == null)
            return $this->sendError('Admin not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List Admin', Response::HTTP_OK, $admin);
    }

    public function store(Request $request)
    {
        $fotoProfilName = "foto_profil" . $request->nama_admin . "." . $request->file('foto_profil')->extension();

        $adminCreate = Admin
        ::create([
            'nama_admin' => $request->nama_admin,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $fotoProfilName,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'position_id' => $request->position_id,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id
        ]);

        $request->file('foto_profil')->storeAs('foto_profil', $fotoProfilName);

        return $this->sendResponse('List Admin', Response::HTTP_OK, $adminCreate);
    }

    public function update(Request $request, $id){
        $fotoProfileName = "foto_profil" . $request->id() . $request->file('foto_profil')->extension();

        $adminUpdate = Admin::where('id', $id)->update([
            'nama_admin' => $request->nama_admin,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $fotoProfilName,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'position_id' => $request->position_id,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id
        ]);

        $request->file('foto_profil')->storeAs('foto_profil', $fotoProfilName);

        return $this->sendResponse('List Admin', Response::HTTP_OK, $adminUpdate);
    }

    public function destroy($id){
        $admin = Admin::find($id);
        $admin->delete();
        return 204;
    }

    public function getAllMember($id){
        $getAdmin = Admin::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //admin daerah
        if($getAdmin->position_id==3){
            $getAllMember = $getDaerah->member;
            return $getAllMembers;
        }

        //admin daerah
        if($getAdmin->position_id==2){
            $getAllMember = $getProinsi->member;
            return $getAllMembers;
        }
    }

}
