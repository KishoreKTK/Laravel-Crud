<?php

namespace App\Http\Controllers;

use App\Models\UserData;

use Illuminate\Http\Request;

use File;



// use Illuminate\Support\Facades\Validator;
// use Redirect;

class LaravelCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = UserData::latest()->paginate(5);

        return view('practice.laravel_crud.index_list',compact('user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('practice.laravel_crud.Add_new_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // email:rfc,dns
        $rules = array(
            'email'     =>    'required|email|unique:UserData',
            'uname'     =>    'required|alpha',
            'password'  =>    'required|min:6|
                                |regex:/[a-z]/|             
                                |regex:/[A-Z]/|
                                |regex:/[0-9]/|
                                regex:/[@$!%*#?&]/|confirmed', 
                                /* atleast one small | one caps | one number | one char
                                confirmed rules works with another confirm password input with
                                one codition example if password field is 'pass' then confirm 
                                password field should be 'pass_confirmation' */
            'gender'    =>    'required|in:M,F',    
            'bday'      =>    'required|date',
            'job_type'  =>    'required|not_in:0', /* for radio button */
            'experiane' =>    'required|numeric',  /* select box  if(value == '' / only required is enough else use notin) */
            'languages' =>    'required|array',    /* Multiple select */
            'photo'     =>    'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',    /* Image Validation */ 
            'describe'  =>    'required|max:255',  
            // 't&c'       =>    'required'
        );

        $messages = array(
                        'email.required'    => 'email is required.',
                        'email.email'       => 'check email address',
                        'uname.reqired'     => 'User Name Required',
                        'uname.alpha'       => 'Only Alphabets allowed in User name',
                        'password.required' => 'Password Required',
                        'password.min'      => 'Password must contains minimum 6 Charecters',
                        'password.regex'    => 'must contain at least one lowercase|uppercase|digit|special character',
                        'photo.image'       => 'Must be a Image',
                        'describe.max'      => 'Maximum Characters allowed is 255',
                        // 't&c.required'      => 'Please Check T&C to Submit'   
                    );

        $request->validate($rules);
        // $request->validate($rules, $messages);
        // $validator = Validator::make( $request->all(), $rules, $messages);
        // if($validator->fails()){
            // return Redirect::back()->withErrors($validator)->withInput();
        // }
        $input              = $request->all();

        // To Get Name of Picture
        $name = $request->file('photo')->getClientOriginalName();

        // To Store Image in Public Folder
        $request->photo->move(public_path('profile_pictures'), $name);

        // To Store image in Storage folder 
        /* 
            // This will create images folder inside stroage/apps/public
            image->store(‘images’);

            in blade call like this line
            <img src=”{{url(‘storage/’.$post->image)}}”>
        */
        $input['password']  =   bcrypt($input['password']);
        $input['img_path']  =   'profile_pictures/'.$name;
        $input['languages'] =   implode(', ', $input['languages']); 
        UserData::create($input);
        return back()->with('success','Successfully registered a new User!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserData  $UserData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // print($page);
        // print("<br>".$id);die;
        $UserData = UserData::findOrFail($id);
    
        // if you only use find function then you need to url for 404 redirect there is no post, 404
        // if (!$UserData) return abort(404);

        return view('practice.laravel_crud.show',compact('UserData'));
    
    }

    // public function show(UserData $UserData)
    // {
    //     return view('practice.laravel_crud.show',compact('UserData'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserData  $UserData
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UserData = UserData::findOrFail($id);
        return view('practice.laravel_crud.edit',compact('UserData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserData  $UserData
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        $rules = array(
                    'email'     =>    'required|email|unique:UserData,email,'.$id.',id',
                                        // Unique rule like, unique:table,column,except,idColumn
                    'uname'     =>    'required|alpha',
                    'gender'    =>    'required|in:M,F',   /* for radio button */ 
                    'bday'      =>    'required|date',
                    'job_type'  =>    'required|not_in:0', /* select box  if(value == '' / only required is enough else use notin) */
                    'experiane' =>    'required|numeric',  
                    'languages' =>    'required|array',    /* Multiple select */
                    'photo'     =>    'image|mimes:jpg,png,jpeg,gif,svg|max:2048',    /* Image Validation */ 
                    'describe'  =>    'required|max:255',  
                );

        
        $request->validate($rules);
        $input          = $request->all();

        if($request->hasFile('photo'))
        {
            if(is_file(public_path().'/'.$request->old_imge_path))
            {
                File::delete($request->old_imge_path);
            }
                    // To Get Name of Picture
            $name           = $request->file('photo')->getClientOriginalName();
            $img_path       = 'profile_pictures/'.$name;
            request()->photo->move('profile_pictures/',$name);

            $input['img_path']  =   $img_path;

        }
        $input['languages'] =   implode(', ', $input['languages']); 


        $update_form = UserData::find($id);
        $update_form->update($input);


        // ,['key'=> $value]
        return redirect()->route('LaravelCrud.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserData  $UserData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        UserData::find($id)->delete();
        // $UserData->delete();
    
        return redirect()->route('LaravelCrud.index')
                        ->with('success','User deleted successfully');
    }


    public function deleted_user_view()
    {
        
        $deleted_data = UserData::onlyTrashed()->paginate(5);

        return view('practice.laravel_crud.deleted_list',compact('deleted_data'));

        // print("<pre>");
        // print_r($data);die;
    }

    public function restoreDeletedUser($id)
    {
        $user = UserData::where('id', $id)->withTrashed()->first();

        $user->restore();

        return redirect()->route('deleteduser')
            ->with('success', 'You successfully restored the user');
    }

    
    public function permanantDeletedUser($id)
    {
        $user = UserData::where('id', $id)->withTrashed()->first();

        $user->forceDelete();

        return redirect()->route('deleteduser')
            ->with('success', 'You successfully deleted the user from the Recycle Bin');

    }
}
