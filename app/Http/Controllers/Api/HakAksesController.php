<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\HakAkses;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class HakAksesController extends BaseController
{
    public function index(){
        $hakAkses = HakAkses::all();

        if($hakAkses==null)
            return $this->sendError('Hak Akses Empty', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Hak Akses', Response::HTTP_OK, $hakAkses);
    }

    public function show($id){
        $hakAkses = HakAkses::find($id);

        if($hakAkses==null)
            return $this->sendError('hakAkses not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List hakAkses', Response::HTTP_OK, $hakAkses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hak_akses' => 'required',
        ]);

        return HakAkses::create($request->all());
    }

    public function update(Request $request, $id){
        $hakAkses = HakAkses::find($id);
        $hakAkses->update($request->all());
        return $hakAkses;
    }

    public function destroy($id){
        $hakAkses = HakAkses::find($id);
        $hakAkses->delete();
        return 204;
    }

    public function getAllPosition($id){
        $allPosition = HakAkses::find($id)->position;
        if($allPosition==null)
            return $this->sendError('Position not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Position', Response::HTTP_OK, $allPosition);
    }

    public function addNewPosition(Request $request){
        $hakAkses = HakAkses::find($request->hak_akses_id);
        $hakAkses->position()->attach($request->role_id);

        return $this->sendResponse('List Hak Akses', Response::HTTP_OK, $hakAkses->position);
    }
}
