<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Provinsi;
use App\Models\Api\Daerah;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class ProvinsiController extends BaseController
{
    public function index(){
        $provinsi = Provinsi::orderBy('nama_provinsi','asc')->paginate(5);

        if($provinsi==null)
            return $this->sendError('Provinsi Empty', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Provinsi', Response::HTTP_OK, $provinsi);
    }

    public function showAll(){
        $provinsi = Provinsi::orderBy('nama_provinsi','asc')->get();

        if($provinsi==null)
            return $this->sendError('Provinsi Empty', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Provinsi', Response::HTTP_OK, $provinsi);
    }

    public function show($id){
        $provinsi = Provinsi::find($id);

        if($provinsi==null)
            return $this->sendError('Provinsi not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Provinsi', Response::HTTP_OK, $provinsi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required',
        ]);

        return Provinsi::create($request->all());
    }

    public function update(Request $request, $id){
        $provinsi = Provinsi::find($id);
        $provinsi->update($request->all());
        return $provinsi;
    }

    public function destroy($id){
        $provinsi = Provinsi::find($id);
        $provinsi->delete();
        return 204;
    }

    public function getAllDaerah($id){
        $allDaerah = Provinsi::find($id)->daerah;
        if($allDaerah==null)
            return $this->sendError('Daerah not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Daerah', Response::HTTP_OK, $allDaerah);
    }

    public function getAllMemberByProvinsi($id){
        $allMember = Provinsi::find($id)->member;
        if($allMember==null)
            return $this->sendError('Member not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Member', Response::HTTP_OK, $allMember);
    }

    public function getAllAdminByProvinsi($id){
        $allAdmin = Provinsi::find($id)->user;
        if($allAdmin==null)
            return $this->sendError('Admin not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Admin', Response::HTTP_OK, $allAdmin);
    }
}
