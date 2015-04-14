<?php namespace Myapi\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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


        $v = Validator::make(Request::all(), [
            'user_name' => 'required|unique:users|max:255',
            'password' => 'required',
            'email' => 'required|unique:users|max:255',
            'roll' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'website' => 'required',
            'description' => 'required',
            'twitter' => 'required',
            'birth_date' => 'required',
            'avatar_url' => 'required',
            'identification' => 'required|unique:users_profiles|max:255',
        ]);

        if ($v->fails())
        {
            dd($v->errors());
            //return $v->errors();
        }

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

        //$user = User::firstOrCreate($userInput); //->getAuthIdentifier();
       /* $user = User::create(array('user_name' => Request::input('user_name')));
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->roll = Input::get('roll');
        $user->save();*/

        $user = new User($userInput);
        $user->save();
        $profile = new userProfile($profileInput);
        $result = $user->profile()->save($profile);

       return response()->json(
           array(
               'status'=>200,
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
