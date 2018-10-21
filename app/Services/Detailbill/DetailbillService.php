<?php

namespace App\Services\Detailbill;
use App\Models\DetailbillModel;

class DetailbillService implements DetailbillServiceContract
{

    protected $model;

    public function __construct()
    {
        $this->model = new DetailbillModel();
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
                'bill_id' => $data['bill_id'],
                'drinks_id' => $data['drinks_id'],
                'price' => $data['price'],
                'preparation' => $data['preparation'],
                'import' => $data['import']
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
    public function getBill($id){
        $transaction = \DB::transaction(function () use ($id) {
            $card = $this->model->where('bill_id',$id)->get();
            return $card;
        });

        return $transaction;
    }

}
