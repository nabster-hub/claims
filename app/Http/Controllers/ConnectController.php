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
    public function store(Claim $claim, Request $request)
    {
        if($claim->type == 2){
            $request->validate([
                'clientNo' => 'required|numeric|min_digits:5|max_digits:15',
                'act_date' => 'required|date',
                'act_number' => 'required|numeric|max_digits:15',
                'receipt_number' => 'required|numeric|max_digits:15',
                'receipt_sum' => 'required|numeric|max_digits:15',
                'SMR' => 'required',
                'distance_solder' => 'required|numeric|max_digits:15',
            ]);
        }else{
            $request->validate([
               'clientNo' => 'required|numeric|min_digits:6|max_digits:15',
            ]);
        }

        Connect::create([
            'claim_id' => $claim->id,
            'client' => $request->input('clientNo'),
            'act_date' => $request->input('act_date'),
            'act_number' => $request->input('act_number'),
            'receipt_number' => $request->input('receipt_number'),
            'receipt_sum' => $request->input('receipt_sum'),
            'SMR' => $request->input('SMR'),
            'distance_solder' => $request->input('distance_solder'),
        ]);

        $claim->update(['status' => 5]);
        return redirect()->route('connect.show', ['claim' => $claim->id]);
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
