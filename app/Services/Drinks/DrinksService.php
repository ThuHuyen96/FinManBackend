<?php

namespace App\Services\Drinks;
use App\Models\DrinksModel;

class DrinksService implements DrinksServiceContract
{

    protected $model;

    public function __construct()
    {
        $this->model = new DrinksModel();
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
                'price' => $data['price'],
                'preparation' => $data['preparation'],
                'quantity' => $data['quantity']
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
    public function updateStatus($id)
    {

        $transaction = \DB::transaction(function () use ($id) {
            $status = 0;
            $this->model->find($id)->update(['status' => $status]);
            // $card = $this->findOne($id);
            // $card->update(['status'=> $status] );

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
    public function updateImage($id, array $data){
        $transaction = \DB::transaction(function () use ($id, $data) {
        $contact = $this->findOne($id);

        if (!isset($contact)) {
            throw new NotFoundException();
        }

        if (isset($data['images'])) {
            $image_str = explode(',', $data['images']);
            $type = explode('/', explode(';', $image_str[0])[0])[1];
            $image = $image_str[1];
            $thumbnail = 'images/'.$contact->id.'.'.$type;//đường dẫn lưu file
            \Storage::disk('local')->put($thumbnail, base64_decode($image));
            $contact['images'] = $thumbnail;
            $contact->save();
            // $this->findOne($id)->update([
            //     'images' => $thumbnail
            // ]);
            return response(['data' => 'Thành công']);
        }
        return response(['data' => 'Thất bại']);;
        });
        return $transaction;
    }
    public function getImage($id){
        $transaction = \DB::transaction(function () use ($id) {
            $contact = $this->findOne($id);

            if (!isset($contact) || !isset($contact->images)) {
                throw new NotFoundException();
            }

            $contents = \Storage::get($contact->images);
            $partsOfName = explode('.', $contact->images);
            $type = $partsOfName[count($partsOfName) - 1];
            $base64image = 'data:image/'.$type.';base64,'.base64_encode($contents);

            return ['data' => $base64image];
        });
        return $transaction;
    }
}
