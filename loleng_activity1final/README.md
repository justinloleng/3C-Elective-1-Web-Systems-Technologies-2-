<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




























Schema 

 public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('department');
            $table->string('photo')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->timestamps();
        });


        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->time('timein');
            $table->time('timeout')->nullable();
            $table->enum('type', ['am', 'pm']);
            $table->enum('status', ['late', 'undertime', 'overtime'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('logs');
    }








Route 
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');


Route::get('/employees/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


Route::get('/timein', [LogController::class, 'create'])->name('logs.create');
Route::post('/timein', [LogController::class, 'store'])->name('logs.store');


Route::get('/logs', [LogController::class, 'index'])->name('logs.index');


Controllers

Employee
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->get();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
        ]);

        DB::table('employees')->insert([
            'employee_id' => $request->employee_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'department' => $request->department,
            'photo' => $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null,
            'date_created' => now(),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee registered successfully!');
    }

    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted');
    }

    public function edit($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::table('employees')->where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'department' => $request->department,
            'photo' => $photoPath,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
}

Logs

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index(Request $request)
    {

        $from = $request->from ?? date('Y-m-01');
        $to = $request->to ?? date('Y-m-d');

        $logs = DB::table('logs')
            ->join('employees', 'logs.employee_id', '=', 'employees.employee_id')
            ->select('employees.employee_id', 'logs.timein', 'logs.timeout', 'logs.type', 'logs.status', 'logs.created_at')
            ->when($from, fn($query) => $query->whereDate('logs.created_at', '>=', $from))
            ->when($to, fn($query) => $query->whereDate('logs.created_at', '<=', $to))
            ->orderBy('logs.created_at', 'desc')
            ->get();


        $totalUsers = DB::table('employees')->count();


        $usersWithTardiness = DB::table('logs')
            ->whereIn('status', ['late', 'undertime'])
            ->distinct('employee_id')
            ->count('employee_id');

        return view('logs.index', compact('logs', 'totalUsers', 'usersWithTardiness'));
    }

    public function create()
    {
        return view('logs.timein');
    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
        ]);

        $employeeId = $request->employee_id;
        $now = date('H:i:s');
        $date = date('Y-m-d');


        $type = ($now >= '08:00:00' && $now <= '12:00:00') ? 'am' : 'pm';

        $log = DB::table('logs')
            ->select('id', 'timeout')
            ->where('employee_id', $employeeId)
            ->where('type', $type)
            ->whereDate('created_at', $date)
            ->first();

        if ($log && is_null($log->timeout)) {
            DB::table('logs')
                ->where('id', $log->id)
                ->update([
                    'timeout' => $now,
                    'updated_at' => now(),
                ]);

            return back()->with('success', "Time-out successfully for $type session.");
        }


        if ($log) {
            return back()->with('error', "Your $type session today is finish.");
        }


        $status = null;
        if (($type == 'am' && $now > '08:00:00') || ($type == 'pm' && $now > '13:00:00')) {
            $status = 'late';
        }


        DB::table('logs')->insert([
            'employee_id' => $employeeId,
            'timein' => $now,
            'type' => $type,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', "Time-in successfully for $type.");
    }
}



Views

Employee Create

    <h2>Employee Registration</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Employee ID (e.g., EID-01):</label><br>
        <input type="text" name="employee_id"><br>

        <label>First Name:</label><br>
        <input type="text" name="firstname"><br>

        <label>Last Name:</label><br>
        <input type="text" name="lastname"><br>

        <label>Department:</label><br>
        <select name="department">
            <option value="IT">IT</option>
            <option value="Math">Math</option>
        </select><br><br>

        <label>Photo (Optional):</label><br>
        <input type="file" name="photo"><br><br>

        <button type="submit">Register</button>
    </form>

Employee edit

 <h2>Employee Update</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

   
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Employee ID (e.g., EID-01):</label><br>
        <input type="text" name="employee_id" value="{{ $employee->employee_id }}"><br>

        <label>First Name:</label><br>
        <input type="text" name="firstname" value="{{ $employee->firstname }}"><br>

        <label>Last Name:</label><br>
        <input type="text" name="lastname" value="{{ $employee->lastname }}"><br>

        <label>Department:</label><br>
        <select name="department">
            <option value="IT" {{ $employee->department == 'IT' ? 'selected' : '' }}>IT</option>
            <option value="Math" {{ $employee->department == 'Math' ? 'selected' : '' }}>Math</option>
        </select><br><br>

        <label>Photo (Optional):</label><br>
        <input type="file" name="photo"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('employees.index') }}">Show Employees</a>

Employee index

  <h2>Employee List</h2>
    <a href="{{ route('employees.create') }}">Add New</a>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                <td>{{ $employee->department }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}">Edit</a> |
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Logs</h3>
    <a href="{{ route('logs.index') }}">Show Logs</a> |
    <a href="{{ route('logs.create') }}">Time In</a>


    Logs index

    <h1>Employee Logs</h1>
<form method="GET" action="{{ route('logs.index') }}">
    From: <input type="date" name="from" value="{{ request('from') }}">
    To: <input type="date" name="to" value="{{ request('to') }}">
    <button type="submit">Filter</button>
</form>

<hr>
<h2>Summary</h2>
<p>Total Users: {{ $totalUsers }}</p>

<p>Users with Tardiness: {{ $usersWithTardiness }}</p>
<hr>

<table border="1" cellspacing="0" cellpadding="8">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Time In</th>
            <th>Session</th>
            <th>Status</th>
            <th>Time Out</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->employee_id }}</td>
                <td>{{ $log->timein }}</td>
                <td>{{ strtoupper($log->type) }}</td>
                <td>{{ $log->status ?? 'On Time' }}</td>
                <td>{{ $log->timeout ?? 'Not yet timed-out'}}</td>
                <td>{{ date('Y-m-d', strtotime($log->created_at)) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No logs founded.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('logs.create') }}">Time In</a>

Logs Time in

<h2>Employee Time In/Out</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

  
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <form action="{{ route('logs.store') }}" method="POST">
        @csrf
        <label>Employee ID:</label>
        <input type="text" name="employee_id" required>

        <button type="submit" name="action" value="timein">Time In</button>

        <button type="submit" name="action" value="timeout">Time Out</button>
    </form>
            <a href="{{route('logs.index')}}">Show logs</a>