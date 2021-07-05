<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = User::where('trash', false)->latest()->get();
        return view('Backend.users.list', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.users.add');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     return $request->all();
    // }

    public function add(Request $request){
        $this->validate($request, [
            'user_type'    => 'required',
            'name'         => 'required',
            'email'        => 'required',
            'password'     => 'required',
        ]);

        User::create([
            'user_type' =>   $request->user_type,
            'name'      =>   $request->name,
            'slug'      =>   str_replace(' ', '-', $request->name),
            'email'     =>   $request->email,
            'password'  =>   password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        return response()->json([
            'data' => 'User added successfully ): '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editUser($id){
        $data = User::find($id);
        return response()->json($data);
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
        //
    }

    public function updateUser(Request $request){
        //get all data
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $user_type = $request->user_type;

        // check user has or not
        $data = User::find($id);
        if($data != NULL){
            $data->user_type = $user_type;
            $data->name = $name;
            $data->slug = str_replace(' ', '-', $name);
            $data->email = $email;
            $data->update();

            return response()->json([
                'success' => 'User data updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'User not found!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * User status update
     */
    public function updateUserStatus(Request $request){
       $data = User::where('id', $request->id)->update([
           'status' => $request->status,
       ]);

       if($data == true){
           return response()->json([
               'msg' => 'User Status updated successfully ): '
           ]);
       }else {
        return response()->json([
            'msg' => 'Something is wrong! plase try again! '
        ]);
       }
    }

    /**
     * User trash list
     */
    public function listUserTrash(){
        $all_data = User::where('trash', 1)->latest()->get();
        return view('backend.users.trash-list', [
            'all_data' => $all_data
        ]);
    }

    /**
     * User trash update
     */
    public function updateUserTrash(Request $request){
       $data = User::where('id', $request->id)->update([
           'trash' => $request->trash,
       ]);

       if($data == true){
           return response()->json([
               'msg' => 'User trash updated successfully ): '
           ]);
       }else {
        return response()->json([
            'msg' => 'Something is wrong! plase try again! '
        ]);
       }
    }


    /**
     * User Profile veiw
     */
    public function viewProfile(){
        $data = User::find(Auth::id());
        return view('Backend.users.profile', [
            'data' => $data
        ]);
    }

    /**
     * User Profile edit
     */
    public function editProfile($id){
       $data = User::find($id);
       return response()->json($data);
    }

    /**
     * User profile update
     */
    public function updateProfile(Request $request){
        //get all data
        $id        = $request->id;
        $name      = $request->name;
        $email     = $request->email;
        $cell      = $request->cell;
        $address   = $request->address;
        $user_type = $request->user_type;
        $photo   = $request->photo;

        // check user has or not
        $data = User::find($id);

        //photo upload
        $unique_image_file = '';
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $unique_image_file = md5(time().rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/users/'), $unique_image_file);
            if(file_exists('uploads/users/'.$data->photo) && !empty($data->photo)){
                unlink('uploads/users/'.$data->photo);
            }
        }else {
           $unique_image_file = $data->photo;
        }



        if($data != NULL){
            $data->user_type = $user_type;
            $data->name = $name;
            $data->slug = str_replace(' ', '-', $name);
            $data->email = $email;
            $data->cell = $cell;
            $data->address = $address;
            $data->photo = $unique_image_file;
            $data->update();

            return response()->json([
                'success' => 'User profile updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'User not found!'
            ]);
        }
    }
}
