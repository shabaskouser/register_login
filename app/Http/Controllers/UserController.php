<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function InsertData(Request $request)
    {
       $this->validate($request,[
        'name' => 'required',          
        'email' => 'required|unique:users',   
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
      


        // $image = $request->file('image');
        // $upload= 'public/';
        // $filename=time().$image->getClientOriginalName();
        // $path=move_uploaded_file($image->getPathName(), $upload.$filename);
       $files = $request->file('image');
       $picname=$files->getClientOriginalName();
       $extension = $files->getClientOriginalExtension();
       $extension =strtolower($extension);
       $name=$request->name;

       // $extension = \File::extension($files);
           $profileImage = date('YmdHis')."$name"."."."$extension";
      
        $type= $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png';

         $destinationPath = 'public/image/'; // upload path

      

        if ($files>0 && $extension=$type  ) {
          

        

          

         //  $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['image'] = "$profileImage";
            


              $name=$request->name;
        $fname=$request->fname;
        $mname=$request->mname;
        $place=$request->place;
        $date=$request->date;
        $image = $request->profileImage;
        $email=$request->email;
        $password=$request->password;



        $md5password=md5($password);
       

            $insertDataArray=array('name'=>$name,'fname'=>$fname,'mname'=>$mname,'place'=>$place,
             'date'=>$date,'image'=>$profileImage,'email'=>$email, 'password'=>$md5password,'status'=>'1');

            $insertDataToTable=DB::table('users')->insert($insertDataArray);

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

        }
        else
        {
            echo "<script>alert('it is not a image'); </script>";
                echo "<script>window.close();</script>";


                 return redirect('/register')->with('notimg','Please select image that sholud be jpg or jpeg');

        }
       
       // $check = User::insertGetId($insert);
  return redirect('/login')->with('register','User registered successfully..');


      
           
           
    }

    public function login(Request $req)
     {

      $email = $req->input('email');
      $password=$req->password;
      $md5password=md5($password);

      $checkLogin = DB::table('users')->where(['email'=>$email, 'password'=>$md5password,'status'=>'1'])->get();
     
      if(count($checkLogin)  >0)
      {
      // echo "Login SuccessFull<br/>";;
      // return redirect('userhome');
       return redirect('userhome')->with('status', 'User Login successfully!');
      
      }
      // else
      // {
      //  return redirect('login')->with('login', 'User Login failed!');

      // }
      elseif($email=="admin@gmail.com")
      {
        $checkLogin = DB::table('admin')->where([ 'password'=>$md5password])->get();
     
      if(count($checkLogin)  >0)
      {
      // echo "Login SuccessFull<br/>";;
      // return redirect('userhome');
       return redirect('/adminhome')->with('status', 'admin Login successfully!');
         
      }
      else
      {
      return redirect('/login')->with('login', ' Login failed!');
      }
      }
      else
      {
         return redirect('/login')->with('login', ' Login failed!');
      }
     }



      public function passwordreset(Request $request)
    {
        $id=$request->id;
        $password=$request->password;
        $md5password=md5($password);

        $updateArray=array('password'=>$md5password );

        $updateName=DB::table('users')->where('id',$id)->update($updateArray);

        if($updateName)
        {
            echo "<script>alert('User password updated successfully'); </script>";
            echo "<script>window.close();</script>";
        } else {
            echo "<script>alert('User password  updation failed'); </script>";
            echo "<script>window.close();</script>";
        }

      return redirect('userhome')->with('reset', 'User password reset successfully!');

    }

     public function profileupdate(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $fname=$request->fname;
        $mname=$request->mname;
        $place=$request->place;
        $date=$request->date;
       // $image = $request->file('image')->move('public/images');
        $email=$request->email;
      

        $updateArray=array('name'=>$name,'fname'=>$fname,'mname'=>$mname,'place'=>$place,'date'=>$date,
          'email'=>$email);

        $updateName=DB::table('users')->where('id',$id)->update($updateArray);

        if($updateName)
        {
            echo "<script>alert('User Profile updated successfully'); </script>";
            echo "<script>window.close();</script>";
        } else {
            echo "<script>alert('User Profile  updation failed'); </script>";
            echo "<script>window.close();</script>";
        }
      return redirect('userhome')->with('updateprofile', 'User profile updated successfully!');

    }


    public function update(Request $request)
    {
        $id=$request->id;
        
        $status=$request->status;
        $updateArray=array('status'=>$status);

        $updateName=DB::table('users')->where('id',$id)->update($updateArray);

        if($updateName)
        {
             return redirect('adminhome')->with('statusupdate', 'User profile status updated successfully!');
        } else {
           return redirect('adminhome')->with('statusnotupdate', 'User profile status not updated successfully!');
        }

    }
     public function index()
     {
       $users = DB::table('users')->get();
        return view('userhome',['users'=>$users]);
}

}
