<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.user.index', ['type_menu' => '']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'roles' => $request->roles,
            'address' => $request->address,
        ]);

        return redirect(route('admin.user.index'))->with('status','Success add user with email '.$user->email);
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
        $payload = $request->validated();
        $user->update($payload);
        return redirect()->route('admin.user.index')->with('success', 'Edit User Successfully');
    }

    public function edit(User $user)
    {
        return view('pages.admin.user.update',[
            'type_menu' => '',
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       return $user->delete();
    }

    public function table(Request $request)
    {
        $draw = $request->input('draw'); 
        $start = $request->input('start'); 
        $length = $request->input('length'); 
        $searchTerm = $request->input('search.value');
        $order = $request->input('order');
        $orderBy = $order[0]['column'];
        $orderDir = $order[0]['dir'];

        $allowedColumns = ['id','name', 'email', 'roles', 'phone'];

        $query = User::select($allowedColumns);

        if(isset($allowedColumns[$orderBy])){
            if($orderBy == 0){
                $query->orderBy('updated_at', 'desc');
            } else {
                $query->orderBy($allowedColumns[$orderBy], $orderDir);
            }
        } 

        if (!empty($searchTerm)) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('roles', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $totalData = $query->count();
        $totalFiltered = $query->count();
        $users = $query->offset($start)->limit($length)->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles,
                'phone' => $user->phone,
            ];
        }

        return response()->json([
            "draw" => intval($draw),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data,
        ]);
    }
}
