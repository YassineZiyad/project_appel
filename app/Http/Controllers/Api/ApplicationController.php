<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplictionResource;
use App\Models\Appliction;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApplictionResource::collection(Appliction::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {

        $appliction = Appliction::create($request->all());
        $appliction->user_id=auth()->user()->id;
        $appliction->save();
        return new ApplictionResource($appliction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appliction  $appliction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appliction = Appliction::find($id);
        return new ApplictionResource($appliction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appliction  $appliction
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, $id)
    {
        $appliction = Appliction::find($id);
        $appliction->update($request->all());
        return new ApplictionResource($appliction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appliction  $appliction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appliction::destroy($id);
        return response()->noContent();
    }
}
