<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\LogoutResource;
use App\Http\Resources\UserResource;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthRepositoryInterface $repository;

    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(AuthRequest $request)
    {
        return new UserResource($this->repository->register($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(AuthRequest $request)
    {
        $data = $request->all();
        $auth = $this->repository->authenticate($data);
        $data['token'] = $auth;
        return new AuthResource(['token' => $auth, 'user' => Auth::user()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(AuthRequest $request)
    {
        return new LogoutResource($this->repository->logout($request->all()));
    }
}