<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChargingStationRequest;
use App\Models\ChargingStation;
use Illuminate\Http\Request;

class ChargingStationController extends Controller
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
    public function store(StoreChargingStationRequest $request)
    {
        $data = $request->validated();
        $data['is_available'] = $data['is_available'] ?? true;

        $chargingStation = ChargingStation::create($data);

        return response()->json([
            'message' => 'Charging station created successfully',
            'data' => $chargingStation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChargingStation $chargingStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChargingStation $chargingStation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChargingStation $chargingStation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChargingStation $chargingStation)
    {
        //
    }
}
