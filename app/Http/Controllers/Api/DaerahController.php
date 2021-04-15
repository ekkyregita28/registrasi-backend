<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Daerah;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class DaerahController extends BaseController
{
    public function index(){
        $daerah = Daerah::orderBy('nama_daerah', 'asc')->paginate(5);

        if($daerah==null)
            return $this->sendError('Daerah Empty', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Daerah', Response::HTTP_OK, $daerah);
    }

    public function showAll(){
        $daerah = Daerah::orderBy('nama_daerah', 'asc')->get();

        if($daerah==null)
            return $this->sendError('Daerah Empty', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Daerah', Response::HTTP_OK, $daerah);
    }

    public function show($id){
        $daerah = Daerah::find($id);

        if($daerah==null)
            return $this->sendError('Daerah not found', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Daerah', Response::HTTP_OK, $daerah);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_daerah' => 'required',
            'provinsi_id' => 'required|json',
        ]);

        return Daerah::create($request->all());
    }

    public function update(Request $request, $id){
        $daerah = Daerah::find($id);
        $daerah->update($request->all());
        return $daerah;
    }

    public function destroy($id){
        $daerah = Daerah::find($id);
        $daerah->delete();
        return 204;
    }

    public function getAllMemberByDaerah($id){
        $allMember = Daerah::find($id)->member;
        if($allMember==null)
            return $this->sendError('Member not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Member', Response::HTTP_OK, $allMember);
    }

    public function getAllAdminByDaerah($id){
        $allAdmin = Daerah::find($id)->user;
        if($allAdmin==null)
            return $this->sendError('Admin not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Admin', Response::HTTP_OK, $allAdmin);
    }
}
