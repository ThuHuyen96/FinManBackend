<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TableResource;
use App\Models\TableModel;
use App\Services\Table\TableServiceContract;

class TableController extends Controller
{
  protected $service;

  public function __construct(TableServiceContract $service)
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
      return TableResource::collection($this->service->getAll());
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //return new FarmResource($id->Farm);
      $result = $this->service->findOne($id);
      return new TableResource($result);
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
      return $this->service->updateOne($id, $request->all());
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    return new TableResource($this->service->createOne($request->all()));
  }

}
