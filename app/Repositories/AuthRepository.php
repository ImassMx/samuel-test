<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    /**
     *  @var Cotizacion 
    */

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register($data) 
    {
        $data['password'] = bcrypt($data['password']);
        $model = $this->model->create($data);

        return $model;
    }

    public function authenticate($data)
    {
        return JWTAuth::attempt($data);
    }

    public function logout($data)
    {
        return JWTAuth::invalidate($data['token']);
    }
    
}