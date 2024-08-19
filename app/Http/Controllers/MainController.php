<?php

namespace App\Http\Controllers;

use App\Mail\AccountMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }
    public function insertAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->role;
        $user->save();
    }
    public function handle_login(Request $request)
    {
        // return $request;
        $donnees = $request->only('email', 'password');
        if (Auth::attempt($donnees)){
            $user = Auth::user();

            return redirect()->route('welcome');
        }else{
            // return redirect()->route('welcome');
            return 'non';
        }
    }
    public function home()
    {
        $data = User::where('email', '!=', 'safayomepro@gmail.com')->get();
        return view('admin.admin',[
            'users' => $data,
        ]
    );
    }
    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->role;
        $user->save();
        Mail::to($request->email)->send(new AccountMail($request->password));
        return redirect()->back()->with('success', 'Utilisateur ajouté');
    }
    public function editUser()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('admin.admin_edit');
        $user = User::findOrFail($id);
        return view('admin.admin_edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->update();

        return redirect()->route('welcome')->with('success', 'Utilisateur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('welcome')->with('success', 'Utilisateur retiré');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
