<?php

namespace App\Services\Bill;

interface BillServiceContract
{
    public function getAll();

    public function findOne($id);

    public function createOne(array $data);

    public function updateOne($id, array $data);

    public function deleteOne($id);


}
