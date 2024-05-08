<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $owners = Owner::select('id','name','email','created_at')->get();

        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Owner::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
        ->route('admin.owners.index')
        ->with('message','オーナー登録を実施しました');

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
        $owner = Owner::findOrFail($id);

        return view('admin.owners.edit',compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();

        return redirect()
        ->route('admin.owners.index')
        ->with('message','オーナー情報を更新しました。');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}