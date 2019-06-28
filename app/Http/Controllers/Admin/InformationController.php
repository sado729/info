<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        abort_unless(Auth::user()->can('manage', Information::class), 404);
        return view('admin.information',['information'=>Information::first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->can('manage', Information::class), 404);

        $information = Information::first();
        $information->update($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/information/');
            @unlink($destinationPath.'/'.$information->image);

            $name = random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $information->image = $name;
            $information->save();
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('information.admin.edit');
    }
}
