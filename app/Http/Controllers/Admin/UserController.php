<?php namespace Myapi\Http\Controllers\Admin;

use Illuminate\Routing\Route;
use Myapi\Http\Requests;
use Myapi\Http\Requests\userRequest;
use Myapi\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Myapi\User;
use Myapi\userProfile;

class UserController extends Controller {

    protected $user;
    public function __construct(){
        $this->beforeFilter('@findUser',['only' => ['update','destroy']]);
    }

    public function findUser(Route $route){
        $this->user = User::findOrfail($route->getParameter('user'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        /**
         * Get all Users Profiles
         */
        $user = User::with('profile')
               ->paginate(5);

        return response()->json(
           $user,
            201
        );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return "create form";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(userRequest $request)
	{
        $user = new User(Request::all());
        $user->save();
        $profile = new userProfile(Request::all());
        $result = $user->profile()->save($profile);

        return response()->json(
           array(
               'data'=>Request::all(),
           ),
           201
       );
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        $user = User::with('profile')
            ->where('users.id','=',$id)
            ->get();

        return response()->json(
            $user,
            201
        );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = $this->user;
        $user->fill(Request::all());

        $profile = $user->profile;
        $profile->fill(Request::all());

        $user->push();

        return response()->json(
            Request::all(),
            201
        );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //$user = User::withTrashed()->where('id', $id)->restore();     //Restore rows deleted
        //$user = User::onlyTrashed()->get();                           //Get all record deleted
        //$user = User::findOrfail($id);

        $user = $this->user;
        $user->delete();
        return response()->json(
            $user,
            201
        );
	}

}
