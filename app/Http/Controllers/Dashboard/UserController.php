<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes\Distance;
use App\Classes\Upload;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Order_detail;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = $_GET['type'];
        if ($type == 'users') {
            $users = User::withTrashed()->with('image', 'userType')->where('user_type_id', '!=', '3')->get();
            return view('dashboard.users.allUsers', compact('users'));
        }
        elseif ($type == 'employees')
        {
            $users = User::with('image')->where('user_type_id', 3)->get();
            return view('dashboard.users.allEmployees', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
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
            'name'         =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone'         =>  'required|max:18',
            'address'       =>  'max:100',
            'password'      =>  'required|confirmed|min:6',
        ], [], [
            'name'          =>  'First Name',
            'email'         =>  'Email',
            'phone'         =>  'Phone',
            'image_id'      =>  'Image',
        ]);

        if ($uploadedFile = $request->file('image_id'))
        {
            $upload = new Upload($request, 'image_id', 'users', 'mimes:jpeg,jpg,png,gif');
            $image_id = $upload->publicUpload();
            $request->image_id = $image_id;
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = $request->input('password');
        $user->user_type_id = 3;
        $user->image_id = $request->image_id;
        $user->save();

        return redirect('user?type=employees')->with('create', 'User Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        return view('dashboard.users.showUser');
    }*/


    public function showEmployeeDetails($id)
    {
        return view('dashboard.users.showEmployee');
    }


    public function showUserDetails($id)
    {
        //Distance::distance(30.0802048,31.340134400000004, 30.03009310481579,31.463443115527355, "N" ) . "Kilometers";
        $user = User::withTrashed()->with('userType', 'totalUserOffers', 'totalUserOrders', 'userCode')->find($id);
        $orders = Order_detail::with('order', 'orderStar')
            ->where('user_id', $id)
            ->where('star_id', '!=', null)
            ->get();
        $offers =Offer::with('status', 'offerOrder')->where('star_id', $id)->get();
        return view('dashboard.users.showUser', compact('user', 'orders', 'offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
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
        $user = User::find($id);
        $request->validate([
            'name'         =>   'required',
            'email'         =>  'required|email|unique:users,id,'. $id,
            'phone'         =>  'required|max:18',
            'address'       =>  'max:100',
            'password'      =>  'required|confirmed|min:6',
        ], [], [
            'name'          =>  'First Name',
            'email'         =>  'Email',
            'phone'         =>  'Phone',
            'image_id'      =>  'Image',
        ]);

        if ($uploadedFile = $request->file('image_id'))
        {
            $upload = new Upload($request, 'image_id', 'users', 'mimes:jpeg,jpg,png,gif');
            $image_id = $upload->publicUpload();
            $request->image_id = $image_id;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = $request->input('password');
        $user->user_type_id = 3;
        $user->image_id = $request->image_id;
        $user->save();

        return redirect('user?type=employees')->with('create', 'User Created Successfully');
    }


    public function destroy($id)
    {
        $user = User::with('image')->find($id);
        $user->delete();
        return redirect('user?type=employees')->with('delete', 'User Deleted Successfully');
    }

    public function changeUserStatus($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user->deleted_at)
        {
            $user->restore();
            //$user->save();
            return redirect()->back()->with('create', 'User Status Updated Successfully to Active');
        }
        else
        {
            $user->delete();
            $user->save();
            return redirect()->back()->with('create', 'User Status Updated Successfully to Disabled');
        }
    }



}
