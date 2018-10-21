<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DetailbillResource;
use App\Models\DetailbillModel;
use App\Services\Detailbill\DetailbillServiceContract;

class DetailbillController extends Controller
{
    protected $service;

  public function __construct(DetailbillServiceContract $service)
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
      return DetailbillResource::collection($this->service->getAll());
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
      return new DetailbillResource($result);
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
      return new DetailbillResource($this->service->updateOne($id, $request->all()));
  }


  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    return new DetailbillResource($this->service->createOne($request->all()));
  }
  /**
    * Detail bill.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function getBill($id)
  {
    return DetailbillResource::collection($this->service->getBill($id));
  }
}
