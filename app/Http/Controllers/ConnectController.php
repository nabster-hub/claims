<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Connect;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(int $claim, Request $request)
    {
        //dd($request);
        $request->validate([
            'clientNo' => 'required|numeric|min_digits:6|max_digits:15',
        ]);

        Connect::create([
            'claim_id' => $claim,
            'client' => $request->input('clientNo'),
        ]);

        return redirect()->route('connect.show', ['claim' => $claim]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        return view('connect.show', compact('claim'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Connect $connect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
