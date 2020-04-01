<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function InsertData(Request $request)
    {
       $this->validate($request,[
        'name' => 'required',          
        'email' => 'required|unique:users',   

        ]);

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $md5password=md5($password);

            $insertDataArray=array('name'=>$name,'email'=>$email, 'password'=>$md5password);

            $insertDataToTable=DB::table('admin')->insert($insertDataArray);

            if($insertDataToTable)
            {
                // $RESPONSE['error']=false;
                // $RESPONSE['message']="data inserted successfully";
           

                echo "<script>alert('data inserted successfully'); </script>";
                echo "<script>window.close();</script>";
            // echo "<script>return.back() </script>";

               
            }
            else {
                echo "<script>";
                echo "alert('data insertion failed');";
                echo "</script>";

            }
            return redirect('/login');
    }

     public function adminpasswordreset(Request $request)
    {
        
        $password=$request->password;
        $md5password=md5($password);

        $updateArray=array('password'=>$md5password );

        $updateName=DB::table('admin')->where('id',1)->update($updateArray);

        if($updateName)
        {
            echo "<script>alert('User password updated successfully'); </script>";
            echo "<script>window.close();</script>";
        } else {
            echo "<script>alert('User password  updation failed'); </script>";
            echo "<script>window.close();</script>";
        }

      return redirect('adminhome')->with('reset', 'User password reset successfully!');

    }

    public function index()
    {
       $users = DB::table('users')->get();
        return view('adminhome',['users'=>$users]);
}
}
