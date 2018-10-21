<?php

namespace App\Services\Detailbill;

interface DetailbillServiceContract
{
    public function getAll();

    public function findOne($id);

    public function createOne(array $data);

    public function updateOne($id, array $data);

    public function deleteOne($id);

    public function getBill($id);
}
