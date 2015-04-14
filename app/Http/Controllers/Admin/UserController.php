<?php namespace Myapi\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Myapi\Http\Requests;
use Myapi\Http\Controllers\Controller;
use Myapi\User;
use Illuminate\Support\Facades\Request;
use Myapi\userProfile;

class UserController extends Controller {

//    private $request;
//    public function __construct(Request $request){
//        $this->request =$request;
//
//    }
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

		return response()->json($user);
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
	public function store()
	{
        $userInput = array(
            'user_name' => Request::input('user_name'),
            'password' => Request::input('password'),
            'email' => Request::input('email'),
            'roll' => Request::input('roll'),
        );
        $profileInput = array(
            'first_name' => Request::input('first_name'),
            'last_name' => Request::input('last_name'),
            'website' => Request::input('website'),
            'description' => Request::input('description'),
            'twitter' => Request::input('twitter'),
            'birthDate' => Request::input('birthDate'),
            'avatar_url' => Request::input('avatar_url'),
            'identification' => Request::input('identification')
        );

        $user = User::firstOrCreate($userInput);//->getAuthIdentifier();

        $profile = new userProfile($profileInput);

        // $post = Post::find(1);
        //$result = $user->profile()->save($profile);


        //$user = new User(Request::all());
        //
        //$user->save();
        //$joder = Input::all();
        //var_dump(Input::all());
        //Request::ajax()
        //return response()->json('Todo not found', 401);
       return response()->json(
           array(
               'status'=>201,
               'data'=>Request::all(),
           )
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

        $useri = Useri::paginate(5);
        return response()->json($useri);
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
	    //
        //abort(403, 'Unauthorized action.');
        $user = User::findOrfail($id);
        $user->fill(Request::all());
        $user->save();
        return response()->json(  array(
                'status'=>200,
                'data'=>$user)
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
