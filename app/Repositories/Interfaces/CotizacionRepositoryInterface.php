<?php

namespace App\Repositories\Interfaces;

interface CotizacionRepositoryInterface
{
    public function paginate(array $request);
    public function save(array $data);
    public function update($id, array $data);
    public function find($id);
    public function delete($id);
}