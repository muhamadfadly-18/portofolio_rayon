<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Http\str;
use Illuminate\Support\Facades\Auth;
use App\Models\rombel;
use App\Models\rayon;
use App\Models\student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function logout(){
        //menghapus sesion atau login (auth)
        Auth::logout();
        //setelah di hapus di arahkan ke login
        return redirect()->route('login');
    }
    public function loginAuth(Request $request)
    {
        //validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
            //ambil value dari input dan simpan sebuah variable
            $user = $request->only(['email','password']);
    
    
            //
            if (Auth::attempt($user)) {
                return redirect('index');
            }else{
                return redirect()->back()->with('failed', 'Email dan Password tidak sesuai. silahkan coba lagi');
            }
    }

    public function index()
    {
        //panggil data yang mau di tampilkan 
        $user = user::all();

        //html yang di munculkan di index.balde.php folder user, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
        return view('user.index', compact('user'));
    }

    public function create()
    {
        $user = new User();
    
        return view('user.create', compact('user'));
    }
    


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required',
    ]);
        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword),
        ]);
    
        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data pengguna!');
    }
    public function edit($id)
    {
        $user = User::find($id); 

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required',
        'password' => 'nullable|min:3', // Password is optional and must be at least 6 characters if provided
    ]);

    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ];

    // Update password only if a new password is provided
    if ($request->filled('password')) {
        $userData['password'] = bcrypt($request->password);
    }

    User::where('id', $id)->update($userData);

    return redirect()->route('user.index')->with('success', 'Berhasil mengubah data pengguna!');
}

    
    
    public function home()
{
    $rombels = rombel::count();
    $rayons = rayon::count();
    $student = student::count();
    $ps = user::where('role', 'guru')->count();
    $admin = user::where('role', 'admin')->count();
    
    
    $rayonIds = rayon::where('user_id', Auth::user()->id)->pluck('id');

$todayLateCount = DB::table('lates')
    ->whereIn('student_id', function ($query) use ($rayonIds) {
        $query->select('id')
            ->from('students')
            ->whereIn('rayon_id', $rayonIds);
    })
    ->whereDate('date_time', Carbon::today())
    ->count();
    $lates1 = student::whereIn('rayon_id', $rayonIds)->count();
    
    return view('index', compact('rombels', 'rayons', 'student', 'ps', 'admin', 'todayLateCount', 'lates1'));
}

public function search(Request $request)
{
    $search_role = $request->input('search_role');
    $search_name = $request->input('search_name');
    $search_email = $request->input('search_email'); // Fix variable name here

    $users = User::query();

    if ($search_role) {
        $users->where('role', 'like', '%' . $search_role . '%');
    }

    if ($search_name) {
        $users->where('name', 'like', '%' . $search_name . '%');
    }

    if ($search_email) {
        $users->where('email', 'like', '%' . $search_email . '%');
    }

    $user = $users->paginate(5); // Fix variable name here

    return view('user.index', compact('user')); // Fix variable name here
}




}
