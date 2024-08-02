<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function show($id)
    {
        return response()->json($this->userService->getUserById($id));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'age', 'job_title', 'company']);
        return response()->json($this->userService->createUser($data));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'age', 'job_title', 'company']);
        return response()->json($this->userService->updateUser($id, $data));
    }

    public function destroy($id)
    {
        return response()->json($this->userService->deleteUser($id));
    }
}
