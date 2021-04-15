<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Member;
use App\Models\Api\Registration;
use App\Models\Api\VerificationHistory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class MemberController extends BaseController
{
    public function index(){
         $member = Member::all();
        
        if ($member == null) 
            return $this->sendError('Member Empty', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List Member', Response::HTTP_OK, $member);
    }

    public function show($id){
       $member = Member::find($id);

       if($member == null)
            return $this->sendError('Member not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List Member', Response::HTTP_OK, $member);
    }

    public function store(Request $request)
    {
    
        $registration = Registration::create();
        $memberCreate = Member::create([
            'nomor_keanggotaan' => $request->nomor_keanggotaan,
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->file('foto_profil')->store('foto_profil'),
            'ukuran_baju' => $request->ukuran_baju,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'status_nikah' => $request->status_nikah,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id,
            'registration_id' => $registration->id,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'hobby' => $request->hobby,
            'sekolah' => $request->sekolah,
            'no_ktp' => $request->no_ktp,
            'no_sim' => $request->no_sim,
            'scan_sim' => $request->file('scan_sim')->store('scan_sim'),
            'scan_ktp' => $request->file('scan_ktp')->store('scan_ktp'),
            'scan_stnk' => $request->file('scan_stnk')->store('scan_stnk'),
            'scan_surat_pajak' => $request->file('scan_surat_pajak')->store('scan_surat_pajak'),
            'foto_kendaraan' => $request->file('foto_kendaraan')->store('foto_kendaraan'),
            'pekerjaan' => $request->pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kota_perusahaan' => $request->kota_perusahaan,
            'kode_pos_perusahaan' => $request->kode_pos_perusahaan,
            'status'=> $request->status,
            'tahap' => $request->tahap,
        ]);

        $verificationHistory = VerificationHistory::create([
            'registration_id' => $registration->id,
            'status' => '1',
            'description' => 'Lolos Verifikasi'
        ]);

        $verificationHistory2 = VerificationHistory::create([
            'registration_id' => $registration->id,
            'status' => '2',
            'description' => 'Sedang Diproses'
        ]);

        return $this->sendResponse('List Member', Response::HTTP_OK, $memberCreate);
    }

    public function update(Request $request, $id){
        
        $memberUpdate = Member::where('id', $request->id)->update([
            'nomor_keanggotaan' => $request->nomor_keanggotaan,
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->file('foto_profil')->store('foto_profil'),
            'ukuran_baju' => $request->ukuran_baju,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'status_nikah' => $request->status_nikah,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'daerah_id' => $request->daerah_id,
            'provinsi_id' => $request->provinsi_id,
            //'registration_id' => $request->registration_id,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'hobby' => $request->hobby,
            'sekolah' => $request->sekolah,
            'no_ktp' => $request->no_ktp,
            'no_sim' => $request->no_sim,
            'scan_sim' => $request->file('scan_sim')->store('scan_sim'),
            'scan_ktp' => $request->file('scan_ktp')->store('scan_ktp'),
            'scan_stnk' => $request->file('scan_stnk')->store('scan_stnk'),
            'scan_surat_pajak' => $request->file('scan_surat_pajak')->store('scan_surat_pajak'),
            'foto_kendaraan' => $request->file('foto_kendaraan')->store('foto_kendaraan'),
            'foto_kendaraan' => $fotoKendaraanName,
            'pekerjaan' => $request->pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kota_perusahaan' => $request->kota_perusahaan,
            'kode_pos_perusahaan' => $request->kode_pos_perusahaan,
            'status'=> $request->status,
            'tahap' => $request->tahap,
        ]);
        return $this->sendResponse('Member Updated', Response::HTTP_OK, $memberUpdate);
    }

    public function destroy($id){
        $member = Member::find($id);
        $member->delete();
        return $this->sendResponse('Member Deleted', Response::HTTP_OK);;
    }


    public function tracking($noKtp){

        $getMember = Member::where('no_ktp', $noKtp)->first();
        $allVerifHistory = Registration::find($getMember->registration_id)->verifHistory;
    
        return $this->sendResponse('List History', Response::HTTP_OK, $allVerifHistory);
       
    }

    public function getMemberByKtp($noKtp){
        $getMember = Member::where('no_ktp', $noKtp)->first();
        return $this->sendResponse('List History', Response::HTTP_OK, $getMember);
    }

    public function lolosVerifikasi(Request $request, $id){
        $memberUpdate = Member::find($id);

        $memberUpdate->tahap = $request->tahap;
        $memberUpdate->status = $request->status;
        $memberUpdate->nomor_keanggotaan = $request->nomor_keanggotaan;
        $memberUpdate->save();
        return $memberUpdate;
    }

    public function nonaktif($id){
        $memberNonaktif = Member::find($id);

        $memberNonaktif->tahap = '2';
        $memberNonaktif->status = 'pengajuan penonaktifan';
        $memberNonaktif->save();

        $verificationHistory = VerificationHistory::create([
            'registration_id' => $memberNonaktif->registration_id,
            'status' => 1,
            'description' => 'Lolos Verifikasi'
        ]);

        $verificationHistory2 = VerificationHistory::create([
            'registration_id' =>  $memberNonaktif->registration_id,
            'status' => '2',
            'description' => 'Sedang Diproses'
        ]);
    }

}
