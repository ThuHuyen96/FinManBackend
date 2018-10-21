<?php

namespace App\Services\Areas;

use App\Models\AreasModel;

class AreasService implements AreasServiceContract
{

    protected $model;

    public function __construct()
    {
        $this->model = new AreasModel();
    }

    public function getAll()
    {
        //return $this->model->all();
        $perOfPage = isset($request['per']) ? $request['per'] : 20;
        $sortType = (isset($request['sort'])) ? $request['sort'] : 'desc';
        $sortField = (isset($request['sortfield'])) ? $request['sortfield'] : 'created_at';
        $results = null;
        $results = $this->model->orderBy($sortField, $sortType)->paginate($perOfPage);
        return $results;
    }

    public function findOne($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createOne(array $data)
    {
        $transaction = \DB::transaction(function () use ($data) {
            $card = $this->model->create([
                'name' => $data['name']
            ]);

            return $card;
        });
        return $transaction;
    }

    public function updateOne($id, array $data)
    {

        $transaction = \DB::transaction(function () use ($id, $data) {
            $status = 0;
            //$data['updatedBy'] = auth()->user()->username;
            // $this->model->find($id)->update(['status' => $status]);
            $card = $this->findOne($id);
            $card->update(['status'=> $status, 'name' => $data['name']] );

            return $card;
        });

        return $transaction;
    }

    public function deleteOne($id)
    {
        $transaction = \DB::transaction(function () use ($id) {
            $card = $this->findOne($id);

            return $card->delete();
        });

        return $transaction;
    }

}
