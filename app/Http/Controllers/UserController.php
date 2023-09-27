<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.admin.user.index', [
            'type_menu' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'roles' => $request->roles,
            'address' => $request->address,
        ]);

        return redirect(route('admin.user.index'))->with('status','Success add user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function table(Request $request)
{
    $draw = $request->input('draw'); 
    $start = $request->input('start'); 
    $length = $request->input('length'); 

    $totalData = User::count();

    $searchTerm = $request->input('search.value');

    $users = User::orderBy('updated_at', 'desc')
    ->where(function ($query) use ($searchTerm) {
        $query->where('name', 'like', '%'.$searchTerm.'%')
            ->orWhere('email', 'like', '%'.$searchTerm.'%');
    })
    ->offset($start)->limit($length)->get([
        'id',
        'name',
        'email',
        'roles',
        'phone',
    ]);

    return response()->json([
        "draw" => intval($draw),
        "recordsTotal" => $totalData,
        "recordsFiltered" => $totalData,
        "data" => $users
    ]);
}

}
