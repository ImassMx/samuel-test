<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotizacionRequest;
use App\Http\Resources\CotizacionCollection;
use App\Http\Resources\CotizacionResource;
use App\Repositories\Interfaces\CotizacionRepositoryInterface;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    private CotizacionRepositoryInterface $repository;

    public function __construct(CotizacionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new CotizacionCollection($this->repository->paginate($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CotizacionRequest $request)
    {
        return new CotizacionResource($this->repository->save($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CotizacionResource($this->repository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CotizacionRequest $request, $id)
    {
        return new CotizacionResource($this->repository->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return new CotizacionResource($this->repository->delete($id));
    }
}
