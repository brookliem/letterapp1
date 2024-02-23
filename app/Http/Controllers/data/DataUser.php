<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataUser extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query users and apply search filter if provided
        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('role', 'like', '%' . $search . '%')
                ->orWhere('department', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('content.data.data-user', compact('users', 'search'));
    }
    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/data-pengguna')->with('success', 'Data successfully deleted!');
    }
    public function detail($id)
    {
        $users = User::find($id);
        return view('content.data.details-user', compact('users'));
    }
}
