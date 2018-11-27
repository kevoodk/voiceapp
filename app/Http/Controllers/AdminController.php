<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Permission;
use App\Role;
use App\Permissions\HasPermissionsTrait;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

       public function __construct()
          {
              return $this->middleware('role:admin');
          }
          public function ShowUserlist(){
            $users = User::all();
            return view('profile', compact('users'));
        }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->input('user');
        $role = $request->input('role');
        DB::table('users_roles')->insert(
          ['user_id' => $user, 'role_id' => $role]
        );
        $users = User::all();
        return redirect()->back()->with('message', 'IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // dd($id);
      $roles = Role::all();
      $user = User::find($id);
      $userrole = DB::select('select * from users_roles');
      $stdClass = json_decode(json_encode($userrole));
      $get_id;
      $get_array = array();
      $i = 0;
      foreach($stdClass as $test){
      $stdClass[$i]->user_id;
      $stdClass[$i]->role_id;
      if($stdClass[$i]->user_id == $id){
        $get_id = $id;
        $findRole = Role::find($stdClass[$i]->role_id);
        $get_array[] = $findRole;
      }
      $i++;
    }


      $get_array[0]->slug;
      // $developer->roles()->attach($roles);
      return view('edit', compact('roles', 'user', 'get_array'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $roleid = $request->input('roleid');
        // dd($roleid, $id);
        // $dev_role = Role::where('slug','developer')->first();
        $userChangePermission = DB::table('users_roles')->where('user_id', $id)->where('role_id', $roleid)->delete();
       // dd($userChangePermission);
    }
}
