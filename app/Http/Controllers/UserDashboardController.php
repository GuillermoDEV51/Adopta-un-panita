<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAdopcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Display the user's received adoption requests (for pets they published).
     */
    public function solicitudes()
    {
        $userID = Auth::id();

        // Get requests where the pet belongs to the authenticated user
        $solicitudes = SolicitudAdopcion::with(['usuario', 'mascota'])
            ->whereHas('mascota', function ($query) use ($userID) {
                $query->where('id_usuario', $userID);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.solicitudes', compact('solicitudes'));
    }
}
