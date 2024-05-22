<?php 

namespace Crm\User\Services;
use Crm\User\Models\User;
use Crm\User\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Crm\User\Events\UserCreation;
class UserService
{
    public function create(UserRequest $request): ?User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        event(new UserCreation($user));
        return $user;//return User object or null
    }
}
