<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {        
        return view('admin.users.index', [
            'users' => User::get()
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

   
    public function update(EditRequest $request, User $user)
    {
        $status = $user->fill($request->validated())->save();

        if ($status) {
            return redirect()->route('admin.users.index')
                ->with('success', 'Запись о пользователе обновлена');
        } else {
            return back()->with('error', 'Не удалось обновить запись о пользователе');
        }
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();

            return response()->json(['status' => 'ok']);
        } catch(Exception $e) {
            Log::error("User wasn't delete");

            return response()->json(['status' => 'error'], 400);
        }
    }
}



    