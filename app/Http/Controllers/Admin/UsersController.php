<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Mail\UserRegisterMail;
use App\Models\Bank;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->filled('search') || \request()->has('length')){
            \request()->flash();
            $search = \request('search');
            $length = (!empty(\request('length'))) ? \request('length') : 10;

            $list = User::where('name','like','%'.$search.'%')
                ->orderByDesc('id')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            $list = User::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.user.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', User::class), 404);

        return view('admin.user.create', ['roles' => Role::all(),'banks' => Bank::activelist()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUser $request)
    {
        $user = User::create($request->all());

        $user->roles()->attach($request['role_id']);

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');

        Mail::to(request('email'))->send(new UserRegisterMail($user,$request->password));

        return redirect()->route('user.admin.show',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', User::class), 404);

        $user = User::find($id);
        $roles = Role::all();
        $banks = Bank::activelist();

        return view('admin.user.edit',compact('roles','user','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request,$id)
    {
        abort_unless(Auth::user()->can('manage', User::class), 404);
        $user = User::find($id);

        if (!empty($request['password'])){
            $user->update($request->all());
        }else{
            $user->update(['name' => $request['name'],'email' => $request['email'],'status' => $request['status'],'bank_id' => $request['bank_id']]);
        }

        if($user->roles()->first()['id']!=$request['role_id']){
            $user->roles()->detach();
            $user->roles()->attach($request['role_id']);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('user.admin.show',$user->id);
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
        $user->delete();

        return redirect()->route('user.index');
    }

    protected function doactive(Request $request)
    {
        $model = User::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['user' => route('user.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = User::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['user' => route('user.admin.index')]);
    }
}