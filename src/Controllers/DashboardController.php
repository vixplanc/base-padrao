<?php

namespace Vixplanc\BasePadrao\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    function index(Request $request) {
        return Inertia::render('Dashboard',
            [
                'can' => [
                    'create_user' => $request->user()->can(['active-user', 'set-role', 'remove-role', 'set-active-user', 'remove-active-user']),
                    'edit_permission' => $request->user()->can(['active-user', 'set-role', 'remove-role']),
                    'active_user' => $request->user()->can(['active-user', 'set-active-user', 'remove-active-user']),
                    'permissions' => $request->user()->getPermissionsViaRoles()->pluck('name')
                ]
            ]
        );
    }
}
