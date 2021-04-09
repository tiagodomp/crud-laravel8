<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IUserRepository;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;

class UserController extends Controller
{

    private $user;

    public function __construct(IUserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $val = $request->validate([
            'search' => 'required|string|max:64',
        ]);

        $users = $this->user->search($request->search);

        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        $data = $request->validated();

        $data['cpf'] = removeMask($data['cpf']);

        if($this->user->create($data)) {
            return redirect('users')
                    ->with('success', 'User created successfully');
        }

        return redirect('users')
                    ->withErrors('Error creating user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserPutRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPutRequest $request, int $id)
    {
        $data = $request->validated();

        $data['cpf'] = removeMask($data['cpf']);

        if($this->user->update($data, $id)) {
            return redirect('users')
                    ->with('success', 'User updated successfully');
        }

        return redirect('users')
                    ->withErrors('Error updating user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if($this->user->delete($id)) {
            return redirect('users')
                    ->with('success', 'User deleted successfully');
        }

        return redirect('users')
                    ->withErrors('Error deleting user');
    }
}
