<?php

namespace App\Services\Table;

use App\Models\TableModel;
use App\Services\Traits\RemoveUnicodeTrait;

class TableService implements TableServiceContract
{

    protected $model;

    public function __construct()
    {
        $this->model = new TableModel();
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
                'name' => $data['name'],
                'area' => $data['area']
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
            $card->update(['status'=> $status] );

            return response(['data' => 'Thành công']);
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
