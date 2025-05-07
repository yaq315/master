<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // يستخدم AdminMiddleware للتحقق من الأدمن والسوبر أدمن
    }

    public function index()
    {
        $users = Auth::user()->isSuperAdmin() 
            ? User::where('role', '!=', 'super_admin')->get()
            : User::where('role', 'user')->get();
            
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin() && !auth()->user()->isSuperAdmin()) {
            abort(403);
        }
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        // إذا كان المستخدم الحالي أدمن (وليس سوبر أدمن)
        if (Auth::user()->isAdmin() && !Auth::user()->isSuperAdmin() && $validated['role'] === 'admin') {
            return back()->with('error', 'You are not authorized to create admin users.');
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

 

    public function edit(User $user)
    {
        // فقط السوبر أدمن يستطيع التعديل على أي مستخدم
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Only super admin can edit users');
        }
        
        // منع التعديل على السوبر أدمن الآخرين
        if ($user->isSuperAdmin() && $user->id !== auth()->id()) {
            abort(403, 'Cannot edit other super admins');
        }
        
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // التحقق من أن المستخدم الحالي هو سوبر أدمن
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Only super admin can update users');
        }
    
        // منع تحديث السوبر أدمن الآخرين
        if ($user->isSuperAdmin() && $user->id !== auth()->id()) {
            abort(403, 'Cannot update other super admins');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,user', // تأكد أن السوبر أدمن لا يمكن تغييره
        ]);
    
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];
    
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($validated['password']);
        }
    
        $user->update($updateData);
    
        return redirect()->route('admin.users.index')
                       ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // فقط السوبر أدمن يستطيع الحذف
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Only super admin can delete users');
        }
        
        // منع حذف السوبر أدمن الآخرين
        if ($user->isSuperAdmin()) {
            abort(403, 'Cannot delete super admins');
        }
        
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}