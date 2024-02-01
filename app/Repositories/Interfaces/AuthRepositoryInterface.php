<?php

namespace App\Repositories\Interfaces;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function authenticate(array $data);
    public function logout(array $data);
}