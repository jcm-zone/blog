<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

class StudentController extends Controller
{
    
    /**
     * Create a new DashboardController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$students = Student::all();
        $students = Student::sortable()->paginate(5); //  sortable is used for shorting
        // passing data into view
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'gender'     => 'required',
            'dob'        => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'address'    => 'required',
            'zipcode'    => 'required',
        ]);

        $input   = $request->all();
        $student = Student::create($input);

        /***Send Email to staudent**/
        $email_data = [
            'name'      =>  $input['first_name'],
            'email'     =>  $input['email'],
            'subject'   =>  'Created Student',
            'msg'       =>  'Your record has been created successfully.',
            'url'       =>  '/login'
        ];        
        $emailJob = (new SendEmailJob($email_data))->delay(Carbon::now()->addSeconds(10));
        dispatch($emailJob);

        return back()->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $student = Student::findOrFail($id);
        return view('admin.student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = $request->validate([
            'first_name'        =>          'required',
            'last_name'         =>          'required',
            'gender'            =>          'required',
            'dob'               =>          'required',
            'email'             =>          'required|email',
            'phone'             =>          'required',
            'address'           =>          'required',
            'zipcode'           =>          'required',
        ]); 
        Student::where('id', $id)->update($student);
        return back()->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('student')->with('success', 'Student deleted successfully');
    }
}
