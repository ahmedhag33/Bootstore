<?php

namespace App\Services;


interface IBaseService
{
    public function getall();

    public function getbyid($id);

    public function store(array $attributes);

    public function getbycolums();

    public function update($id, array $attributes);

    public function destroy($id);
}
