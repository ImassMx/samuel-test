<?php

namespace App\Repositories;
use App\Models\Cotizacion;
use App\Repositories\Interfaces\CotizacionRepositoryInterface;

class CotizacionRepository extends BaseRepository implements CotizacionRepositoryInterface
{
    /**
     *  @var Cotizacion 
    */

    protected $model;
    protected $limit = 25;

    public function __construct(Cotizacion $model)
    {
        $this->model = $model;
    }

    public function paginate($request) 
    {
        $model = $this->model;
        
        if (isset($request['orderBy']) && $request['orderBy'])
        {
            $order = isset($request['order']) && $request['order'] ? $request['order'] : '';
            $model->orderBy($request['orderBy'], $order);
        }

        if (isset($request['limit']) && $request['limit']) $this->limit = $request['limit'];

        $page = isset($request['page']) && $request['page'] ? $request['page'] : 1;

        return $model->paginate($this->limit, ['*'], 'page', $page);
    }

    public function save($data)
    {
        $model = $this->model->create($data);

        return $model;
    }

    public function update($id, $data)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();

        return $model;
    }

}