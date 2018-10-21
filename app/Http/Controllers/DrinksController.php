<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DrinksResource;
use App\Models\DrinksModel;
use App\Services\Drinks\DrinksServiceContract;

class DrinksController extends Controller
{
    protected $service;

  public function __construct(DrinksServiceContract $service)
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
      return DrinksResource::collection($this->service->getAll());
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
      return new DrinksResource($result);
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
      return new DrinksResource($this->service->updateOne($id, $request->all()));
  }
  /**
   * Update status the specified resource in storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function updateStatus($id)
  {
      return $this->service->updateStatus($id);
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    return new DrinksResource($this->service->createOne($request->all()));
  }
  public function updateImage(Request $request, $id)
  {
      return $this->service->updateImage($id, $request->all());
  }
  public function getImage($id)
  {
      return $this->service->getImage($id);
  }
}
