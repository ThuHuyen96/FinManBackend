<?php

namespace App\Services\Bill;
use App\Models\BillModel;

class BillService implements BillServiceContract
{

    protected $model;

    public function __construct()
    {
        $this->model = new BillModel();
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
                'table_id' => $data['table_id'],
            ]);

            return $card;
        });
        return $transaction;
    }

    public function updateOne($id, array $data)
    {

        $transaction = \DB::transaction(function () use ($id, $data) {
            $card = $this->findOne($id);
            $card->update($data);

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
