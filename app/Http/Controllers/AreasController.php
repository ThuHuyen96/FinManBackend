<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AreasResource;
use App\Models\AreasModel;
use App\Services\Areas\AreasServiceContract;

class AreasController extends Controller
{
    protected $service;

  public function __construct(AreasServiceContract $service)
  {
      $this->service = $service;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return AreasResource::collection($this->service->getAll());
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $result = $this->service->findOne($id);
      return new AreasResource($result);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request)
  {
      return new AreasResource($this->service->updateOne($id, $request->all()));
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    return new AreasResource($this->service->createOne($request->all()));
  }
}
