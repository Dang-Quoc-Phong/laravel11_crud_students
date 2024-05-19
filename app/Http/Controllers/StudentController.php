<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class StudentController extends Controller
{
    //CRUD
    
    
    //them -Create -C
    public function addstudent(){
        return view('create');
    }
       public function store(Request $request) {
        $student = new Student;
       
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->class = $request->input('class');
       if($request->hasFile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); //lay ten mo rong .jpg, .png,..
        $filename = time().'.'.$extension;
        $file->move('uploads/students/',$filename); //uploads len thu muc uploads/students
        $student->image = $filename;
       }
       $student->save();
       return redirect()->back()->with('status','them sinh vien thanh cong');
       
       }
    //liet ke - list

    public function index(){
        $students = Student::all();
        return view('index', compact('students')); //tim den file index.blade.php trong thu muc view/student
    }
 // sua -edit -E
 public function edit($id){
       $student = Student::find($id);
       return view('edit',compact('student'));
 }
 // cap nhat update -U
 public function update( Request $request, $id){
    $student = Student::find($id);
   $student->name = $request->input('name');
   $student->email = $request->input('email');
   $student->class = $request->input('class');
   if($request->hasFile('image')){
    // co phai dinh kem trong form update thi tim phai cu va xoa di
    // neu truoc do khong co anh dai dien cu thi khong xoa
    $anhcu = 'uploads/students'.$student->image;
    if(File::exists($anhcu)){
        File::delete($anhcu);
    }
    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension(); //lay ten mo rong .jpg, .png,..
    $filename = time().'.'.$extension;
    $file->move('uploads/students/',$filename); //uploads len thu muc uploads/students
    $student->image = $filename;
   }
   $student->update();
   return redirect()->back()->with('status','Cap nhat sinh vien thanh cong');
   
}
// xoa -delete -D
public function delete($id) {
$student = Student::find($id);
$image = 'uploads/students/'.$student->image;
if(File::exists($image)){
    File::delete($image);
}
$student->delete();
return redirect()->back()->with('status','xoa sinh vien thanh cong');
}
}
