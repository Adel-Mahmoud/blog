<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function test(){
      return view('users.test');
    }
    
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $usersQuery = User::where('name', 'like', '%' . $request->input('search') . '%');
            $users = $usersQuery->paginate(10); 
            $total = $users->total();
        } else {
            $users = User::paginate(10); 
            $total = User::count();
        }
        return view('users.index', compact('users','total'));
    }
    public function create()
    {
      return view('users.add');  
    }
    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);
      if ($request->password !== $request->confirm_password) {
          return redirect()->back()->withInput()->withErrors(['confirm_password' => 'The password confirmation does not match']);
      }
      $validatedData['password'] = Hash::make($validatedData['password']);
      User::create($validatedData);
      return redirect()->route('users.index')->with('success', 'Add Data is successful');
    }
    public function show(string $id)
    {
        
    }
    public function edit(string $id)
    {
      $user = User::find($id);
      $old_password = $user->password;
      return view('users.edit', compact('user')); 
    }
    public function update(Request $request, string $id)
    {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      if ($request->filled('password')) {
          $user->password = Hash::make($request->password);
      }  
      $user->save();
      return redirect()->route('users.index')->with('update', 'updated Data is successful');
    }
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('delete', 'Delete Data is successful');
    }
}