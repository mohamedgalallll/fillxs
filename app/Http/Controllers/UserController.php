<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show profile
    public function profile()
    {
        $user = User::all();
        return view('user_setting.settinguser', compact('user'));
    }

    public function account()
    {
        $user = User::all();
        return view('user_setting.account_setting', compact('user'));
    }
    // updateName
    public function updateName(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $user=User::find($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        //
    }
    // update Uesr profile
    public function update(Request $request, $id)
    {
        $input = $this->validate(request(), [
            'avatar'  => 'mimes:jpeg,png,jpg,gif,svg|max:2048' ,
            'cv'      => 'max:100000|mimes:doc,docx,pdf',
            'gender'      => 'sometimes|nullable|string',
            'nationality'      => 'sometimes|nullable|string',
            'birthday'      => 'sometimes|nullable',
            'career'      => 'sometimes|nullable|string',
            'location'      => 'sometimes|nullable|string',
            'position'      => 'sometimes|nullable|string',
            'company'      => 'sometimes|nullable|string',
            'salary'      => 'sometimes|nullable|string',
            'commitment'      => 'sometimes|nullable|string',
            'notice_period'      => 'sometimes|nullable|string',
            'visa_status'      => 'sometimes|nullable|string',
            'hide'      => 'sometimes|nullable',
            'academic'      => 'sometimes|nullable|string',
            'summary_cv'      => 'sometimes|nullable|string',
        ]);
        if ($request->hasFile('cv') && request()->has('cv')) {
            $input['cv'] = $this->storeFile($request->cv);
        }
        if ($request->hasFile('avatar') && request()->has('avatar')) {
            $input['avatar'] = $this->storeFile($request->avatar);
        }
        $user = User::findOrFail($id);
        $user->update($input);
        return redirect()->back();
    }
// delete user
    public function destroy($id)
    {
       User::find($id)->delete();
        return redirect('/register');
    }

    public function AllUsers()
    {
        $Users = User::all();
        return view('DashBoardAdmin.AllUsers', compact('Users'));
    }
    public function DeleteUser($id)
    {
        User::find($id)->delete();
        return redirect('/All/Users')->with('Delete', 'Ueser was Deleted');
    }
}
