<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Reservation $reservation)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Non authentifié'], 401);
        }

        if ($user->role === 'admin') {
            $reservations = Reservation::all();
            return response()->json($reservations);
        }

        $reservations = Reservation::forUser($user->id)->get();
        return response()->json($reservations);
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
    public function store(ReservationRequest $request)
    {
        $userId = Auth::user()?->id;

        if (!$userId) {
            return response()->json([
                'message' => 'Unauthenticated',
            ], 401);
        }

        $data = $request->validated();
        $data['user_id'] = $userId;
        $data['status'] = $data['status'] ?? 'pending';

        $reservation = Reservation::create($data);

        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $reservation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return response()->json([
            'message' => 'Charging station retrieved successfully',
            'data' => $reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $user = Auth::user();
        if ($user->id !== $reservation->user_id) {
            return response()->json(['message' => 'Ce n\'est pas votre réservation !'], 403);
        }
        $data = $request->validated();

        $reservation->update($data);

        return response()->json([
            'message' => 'Reservation updated successfully',
            'data' => $reservation->fresh(),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $user = Auth::user();
        if ($user->id !== $reservation->user_id) {
            return response()->json(['message' => 'Ce n\'est pas votre réservation !'], 403);
        }
        $reservation->delete();

        return response()->json([
            'message' => 'Reservation deleted successfully',
            'data' => $reservation->fresh(),
        ], 200);
    }
    public function pay(Reservation $reservation){
        $user = Auth::user();
        if ($user->id !== $reservation->user_id) {
            return response()->json(['message' => 'Ce n\'est pas votre réservation !'], 403);
        }
        if($reservation->status==='confirmed'){
            return response()->json(['message' => 'Cette réservation est déjà payée/confirmée.'], 400);
        }
        elseif($reservation->status==='pending'){
            
        }

    }
}
