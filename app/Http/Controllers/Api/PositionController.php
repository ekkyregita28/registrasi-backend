<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Position;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class PositionController extends BaseController
{
    public function index(){
        $position = Position::paginate(5);

        if($position==null)
            return $this->sendError('Position Empty', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Position', Response::HTTP_OK, $position);
    }

    public function showAll(){
        $position = Position::all();

        if($position==null)
            return $this->sendError('Position Empty', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Position', Response::HTTP_OK, $position);
    }

    public function show($id){
        $position = Position::find($id);

        if($position==null)
            return $this->sendError('Position not found', Response::HTTP_NOT_FOUND);
        
            return $this->sendResponse('List Position', Response::HTTP_OK, $position);
    }

    public function store(Request $request)
    {
        return Position::create($request->all());
    }

    public function update(Request $request, $id){
        $position = Position::find($id);
        $position->update($request->all());
        return $position;
    }

    public function destroy($id){
        $position = Position::find($id);
        $position->delete();
        return 204;
    }

    public function getAllHakAkses($id){
        $allHakAkses = Position::find($id)->hakAkses;
        if($allHakAkses==null)
            return $this->sendError('Hak Akses not found', Response::HTTP_NOT_FOUND);
        
        return $this->sendResponse('List Hak Akses', Response::HTTP_OK, $allHakAkses);
    }

    public function addNewHakAkses(Request $request){
        $position = Position::find($request->position_id);
        $position->hakAkses()->attach($request->hak_akses_id);
        $position->hakAkses()->syncWithoutDetaching($request->hak_akses_id);

        return $this->sendResponse('List Hak Akses', Response::HTTP_OK, $position->hakAkses);
    }
}
