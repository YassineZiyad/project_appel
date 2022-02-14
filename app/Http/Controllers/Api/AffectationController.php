<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AffectationRequest;
use App\Http\Resources\AffectationResource;
use App\Models\Affectation;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AffectationResource::collection(Affectation::all());
    }
    public function Affectationforapp($id)
    {
        $Affectation = Affectation::where("app_id",$id)->get();
        return new AffectationResource($Affectation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AffectationRequest $request)
    {
        $Affectation = Affectation::create($request->all());
        $Affectation->affected_at=date('d-m-y H:i');
        $Affectation->save();
        return new AffectationResource($Affectation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affectation  $Affectation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Affectation = Affectation::find($id);
        return new AffectationResource($Affectation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affectation  $Affectation
     * @return \Illuminate\Http\Response
     */
    public function update(AffectationRequest $request, $id)
    {
        $Affectation = Affectation::find($id);
        $Affectation->update($request->all());
        return new AffectationResource($Affectation);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affectation  $Affectation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Affectation::destroy($id);
        return response()->noContent();
    }
}
