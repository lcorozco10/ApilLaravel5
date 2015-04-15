<?php namespace Myapi\Http\Controllers\Admin;


use Myapi\Http\Requests;
use Myapi\Http\Requests\userRequest;
use Myapi\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Myapi\User;
use Myapi\userProfile;

class UserController extends Controller {

    /*private $request;
    public function __construct(Request $request){
        $this->request =$request;

    }*/

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
        $userInput = array(
            'user_name' => Request::input('user_name'),
            'password' => Request::input('password'),
            'email' => Request::input('email'),
            'roll' => Request::input('roll')
        );

        $profileInput = array(
            'first_name' => Request::input('first_name'),
            'last_name' => Request::input('last_name'),
            'website' => Request::input('website'),
            'description' => Request::input('description'),
            'twitter' => Request::input('twitter'),
            'birth_date' => Request::input('birthDate'),
            'avatar_url' => Request::input('avatar_url'),
            'identification' => Request::input('identification')
        );

        $user = new User($userInput);
        $user->save();
        $profile = new userProfile($profileInput);
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
        $userInput = array(
            'user_name' => Request::input('user_name'),
            'password' => Request::input('password'),
            'email' => Request::input('email'),
            'roll' => Request::input('roll')
        );

        $profileInput = array(
            'first_name' => Request::input('first_name'),
            'last_name' => Request::input('last_name'),
            'website' => Request::input('website'),
            'description' => Request::input('description'),
            'twitter' => Request::input('twitter'),
            'birth_date' => Request::input('birthDate'),
            'avatar_url' => Request::input('avatar_url'),
            'identification' => Request::input('identification')
        );

        $user = User::find($id);
        $profile = $user->profile;
        $profile->first_name = 'Barte';
        $user->profile()->save($profile);

        return response()->json(
            $user,
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

        User::destroy($id);
        return 'User delited';
	}

}
