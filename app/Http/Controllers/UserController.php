<?php

namespace App\Http\Controllers;

use App\Components\UserComponent\UserManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repository\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserManager
     */
    private $userManager;

    public function __construct(UserRepository $userRepository,
                                UserManager    $userManager)
    {
        $this->userRepository = $userRepository;
        $this->userManager = $userManager;
    }

    public function index()
    {
        $users = $this->userRepository->findAllRecordsWithLimit(5);

        return view('users.user_index', [
            'users' => $users,
            'mode' => 'create'
        ]);
    }

    public function new(Request $request): RedirectResponse
    {
        return $this->userManager->createUser($request);
    }

    public function delete($id): RedirectResponse
    {
        return $this->userManager->deleteUser($id);
    }

    public function update($id, Request $request): RedirectResponse
    {
        return $this->userManager->updateUser($id, $request);
    }

    public function editForm(Request $request): JsonResponse
    {
        $userId = $request->request->get('userId');
        $user = $this->userRepository->findById($userId);

        return response()->json(
            [
                'data' => view('users.user_form',
                [
                    'user' => $user,
                    'mode' => 'edit'
                ])->render()
            ]);
    }

    public function newForm(): JsonResponse
    {
        return response()->json(
            [
                'data' => view('users.user_form',
                    [
                        'mode' => 'create'
                    ])->render()
            ]);
    }
}
