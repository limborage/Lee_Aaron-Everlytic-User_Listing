<?php

namespace App\Components\UserComponent;

use App\Repository\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserManager
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserDetailsProcessor
     */
    private $userDetailsProcessor;
    /**
     * @var UserValidator
     */
    private $userValidator;


    public function __construct(UserRepository       $userRepository,
                                UserDetailsProcessor $userDetailsProcessor,
                                UserValidator        $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userDetailsProcessor = $userDetailsProcessor;
        $this->userValidator = $userValidator;
    }

    public function createUser(Request $request): RedirectResponse
    {
        $userDetails = $this->userDetailsProcessor->RequestUserDetailsExtractor($request->request->all());

        if (empty($userDetails)) {
            return redirect()
                ->route('user_index')
                ->with('Error', 'Could not create user.')
                ->withInput($request->input());
        }

        $validatedData = $this->userValidator->validateUser($userDetails);

        if ($validatedData['type'] === 'error') {
            return redirect()
                ->route('user_index')
                ->withErrors($validatedData['validator'])
                ->withInput(Input::all());
        }

        $entity = $this->userRepository->createEntity($userDetails);

        return redirect()
            ->route('user_index')
            ->with('success', 'User Created Successfully.');
    }

    public function deleteUser($userId): RedirectResponse
    {
        $deleteResult = $this->userRepository->deleteEntity($userId);

        $messageType = ($deleteResult > 0) ? 'success' : 'error';
        $message = ($deleteResult > 0) ? 'User Deleted Successfully.' : 'User Deletion Failed.';

        return redirect()
            ->route('user_index')
            ->with($messageType, $message);
    }

    public function updateUser($userId, Request $request): RedirectResponse
    {
        $request->session()->flash('update', route('user_update', $userId));
        $result = ['messageType' => 'error', 'message' => 'User Update Failed.'];

        if (!is_int((int)$userId)) {
            return redirect()
                ->route('user_index')
                ->with($result['messageType'], $result['message']);
        }

        $userDetails = $this->userDetailsProcessor->RequestUserDetailsExtractor($request->request->all());

        if (empty($userDetails)) {
            return redirect()
                ->route('user_index')
                ->with($result['messageType'], $result['message'])
                ->withInput($request->input());
        }

        $user = $this->userRepository->findByKey('email', $userDetails['email'])->first();
        $key = $user === null ? (int)$userId : $user->getKey();
        $canUpdateUser = $this->canUpdateEmail($key, (int)$userId);
        $validatedData = $this->userValidator->validateUser($userDetails, $canUpdateUser);

        if ($validatedData['type'] === 'error') {
            return redirect()
                ->route('user_index')
                ->withErrors($validatedData['validator'])
                ->withInput($request->input());
        }

        $updateResult = $this->userRepository->updateEntity($userId, $userDetails);

        if ($updateResult > 0) {
            $result = ['messageType' => 'success', 'message' => 'User Update Successfully.'];
        }

        return redirect()
            ->route('user_index')
            ->with($result['messageType'], $result['message'])
            ->withInput($request->input());
    }

    private function canUpdateEmail($userId, $givenId): bool
    {
        return $userId === $givenId;
    }
}