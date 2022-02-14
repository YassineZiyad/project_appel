<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TacheRequest;
use App\Http\Resources\TacheResource;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        return TacheResource::collection(Tache::all());
    }
    public function tacheforapp($id)
    {
        $Tache = Tache::where("app_id",$id)->get();
        return new TacheResource($Tache);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(TacheRequest $request)
    {
        $Tache = Tache::create($request->all());
        return new TacheResource($Tache);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $Tache
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tache = Tache::find($id);
        return new TacheResource($Tache);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $Tache
     * @return \Illuminate\Http\Response
     */
    public function update(TacheRequest $request, $id)
    {
        $Tache = Tache::find($id);
        $Tache->update($request->all());
        return new TacheResource($Tache);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $Tache
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tache::destroy($id);
        return response()->noContent();
    }
}
