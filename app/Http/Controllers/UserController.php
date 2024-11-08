<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('pages.home', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('pages.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha'
        ]);
        // $users = new User;
        // $users->name = $request->username;
        // $users->email = $request->useremail;
        // $users->age = $request->userage;
        // $users->city = $request->usercity;
        // $users->save();
        User::create([
            'name' => $request->username,
            'email' => $request->useremail,
            'age' => $request->userage,
            'city' => $request->usercity
        ]);


        return redirect()->route('users.index')
            ->with('status', 'New User Add Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        // $show = User::find($user);
        // return $users;
        return view('pages.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::find($user->id);
        return view('pages.update', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha'
        ]);
        // $users = User::where('id',$user)
         $user->update([
            'name' => $request->username,
            'email' => $request->useremail,
            'age' => $request->userage,
            'city' => $request->usercity
        ]);

        return redirect()->route('users.index')
            ->with('status', 'Update User Successfully');

        // $user->name = $request->username;
        // $user->email = $request->useremail;
        // $user->age = $request->userage;
        // $user->city = $request->usercity;
        // $user->save();

    // return redirect()->route('users.index')
    //     ->with('status', 'Update User Successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        // $user = User::find($id);
        //     $user->delete();

        User::destroy($id);
        // User::truncate();

            return redirect()->route('users.index')
                ->with('status', 'User Delete Successfully.');
    }
}
