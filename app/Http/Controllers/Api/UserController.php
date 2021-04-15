<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Api\Daerah;
use App\Models\Api\Provinsi;
use App\Models\Api\Member;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class UserController extends BaseController
{
    public function index(){
        $user = User::paginate(10);

        if ($user == null) 
            return $this->sendError('User Empty', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List User', Response::HTTP_OK, $user);
    }
    
    public function show($id){
        $user = User::find($id);

       if($user == null)
            return $this->sendError('User not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List User', Response::HTTP_OK, $user);
    }

    public function store(Request $request)
    {
        
        $userCreate = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->file('foto_profil')->store('foto_profil'),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'position_id' => $request->position_id,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id
        ]);

        return $this->sendResponse('List User', Response::HTTP_OK, $userCreate);
    }

    public function update(Request $request){
        
        $userUpdate = User::where('id', $request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->file('foto_profil')->store('foto_profil'),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'position_id' => $request->position_id,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id
        ]);

        return $this->sendResponse('Admin Updated', Response::HTTP_OK, $userUpdate);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return $this->sendResponse('Admin Deleted', Response::HTTP_OK);
    }

    public function getAllMemberRegis($id){
        $getAdmin = User::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //admin daerah
        if($getAdmin->position_id==1){
            $getAllMembers = $getDaerah->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan pendaftaran')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin provinsi
        if($getAdmin->position_id==2){
            $getAllMembers = $getProvinsi->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan pendaftaran')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin nasional
        if($getAdmin->position_id==3){
            $getAllMembers = Member::where('status','pengajuan pendaftaran')
                             ->where('tahap',$getAdmin->position_id)
                             ->paginate(10);
            return $getAllMembers;
        }
    
    }

    public function getAllMemberUpdate($id){
        $getAdmin = User::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //admin daerah
        if($getAdmin->position_id==1){
            $getAllMembers = $getDaerah->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan update data')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin provinsi
        if($getAdmin->position_id==2){
            $getAllMembers = $getProvinsi->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan update data')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin nasional
        if($getAdmin->position_id==3){
            $getAllMembers = Member::where('status','pengajuan update data')
                             ->where('tahap',$getAdmin->position_id)
                             ->paginate(10);
            return $getAllMembers;
        }
    
    }

    public function getAllMemberPenonaktifan($id){
        $getAdmin = User::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //admin daerah
        if($getAdmin->position_id==1){
            $getAllMembers = $getDaerah->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan penonaktifan')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin provinsi
        if($getAdmin->position_id==2){
            $getAllMembers = $getProvinsi->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->where('status','pengajuan penonaktifan')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin nasional
        if($getAdmin->position_id==3){
            $getAllMembers = Member::where('status','pengajuan penonaktifan')
                             ->where('tahap',$getAdmin->position_id)
                             ->paginate(10);
            return $getAllMembers;
        }
    
    }

    public function getAllMemberAktif($id){
        $getAdmin = User::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //admin daerah
        if($getAdmin->position_id==1){
            $getAllMembers = $getDaerah->member()
                            ->where('status','aktif')
                            ->orWhere('status','nonaktif')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin provinsi
        if($getAdmin->position_id==2){
            $getAllMembers = $getProvinsi->member()
                            ->where('status','aktif')
                            ->orWhere('status','nonaktif')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin nasional
        if($getAdmin->position_id==3){
            $getAllMembers = Member::where('status','aktif')
                                     ->orWhere('status','nonaktif')
                                     ->paginate(10);
            return $getAllMembers;
        }
    
    }

    public function getAllMember($id){
        $getAdmin = User::find($id);
        $getDaerah = Daerah::find($getAdmin->daerah_id);
        $getProvinsi = Provinsi::find($getAdmin->provinsi_id);

        //Superadmin
        if($getAdmin->position_id==4){
            return User::all();
        }
        
        //admin daerah
        if($getAdmin->position_id==1){
            $getAllMembers = $getDaerah->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->orWhere('status','aktif')
                            ->orWhere('status','nonaktif')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin provinsi
        if($getAdmin->position_id==2){
            $getAllMembers = $getProvinsi->member()
                            ->where('tahap',$getAdmin->position_id)
                            ->orWhere('status','aktif')
                            ->orWhere('status','nonaktif')
                            ->paginate(10);
            return $getAllMembers;
        }

        //admin nasional
        if($getAdmin->position_id==3){
            $getAllMembers = Member::paginate(10);
            return $getAllMembers;
        }
    }

}
