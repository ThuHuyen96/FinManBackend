<?php

namespace App\Services\Drinks;

interface DrinksServiceContract
{
    public function getAll();

    public function findOne($id);

    public function createOne(array $data);

    public function updateOne($id, array $data);

    public function deleteOne($id);

    public function updateImage($id, array $data);

    public function getImage($id);

    public function updateStatus($id);
}
