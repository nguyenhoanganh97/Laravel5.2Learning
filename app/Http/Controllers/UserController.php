<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::all();
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        if ($rq->hasFile('avatar')) {
            if ($rq->file('avatar')->isValid()) {

                $fileExtension = $rq->file('avatar')->getClientOriginalExtension();
                $fileName = str_random(20).".".$fileExtension;
                $savePath = 'resources/images/userAvatar/';
                $rq->file('avatar')->move($savePath,$fileName);

                $user = new User();
                $user->name = $rq->input('txtName');
                $user->description = $rq->input('txtDescription');
                $user->avatar = $fileName;
                $user->save();
                return redirect('user');
            }
        }
        return 'faild';
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
        $user = User::findOrFail($id);
        if ($user) {
            $data = [
                'id'=>$id,
                'name'=>$user->name,
                'description'=>$user->description,
                'avatar'=>$user->avatar
            ];
            return view('user-edit', compact('data'));
        }
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
        $user = User::findOrFail($id);
        if ($user) {
            $user->name = $request->input('txtName');
            $user->description = $request->input('txtDescription');
            if ($request->hasFile('avatar')) {
                if ($request->file('avatar')->isValid()) {
    
                    $fileExtension = $request->file('avatar')->getClientOriginalExtension();
                    $fileName = str_random(20).".".$fileExtension;
                    $savePath = 'resources/images/userAvatar/';
                    $request->file('avatar')->move($savePath,$fileName);
    
                    $user->avatar = $fileName;
                    $user->save();
                    return redirect('user');
                }
            }else {
                $user->save();
                return redirect('user');
            }
        }
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect('user');
        }else {
            return redirect('user');
        }
    }
}
