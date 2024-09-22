<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;  // Import PDF library for exporting

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search or filter users
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }


        $users = $query->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted');
    }

    public function sendNotification(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->notify(new NewUserNotification($request->message));

        return redirect()->route('admin.users.index')->with('success', 'Notification sent');
    }

    public function exportPDF()
    {
        $users = User::all();

        $pdf = PDF::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('users.pdf');
    }
}
