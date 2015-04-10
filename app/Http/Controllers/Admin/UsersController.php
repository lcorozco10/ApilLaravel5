<?php namespace Myapi\Http\Controllers\Admin;

use Myapi\Http\Requests;
use Myapi\Http\Controllers\Controller;
use Myapi\User;
use Myapi\Useri;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller {

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

		$user = User::paginate(5);
		//$user->setPath('custom/url');
		//$user->appends(['sort' => 'first_name'])->render();
		return response()->json($user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return "create";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $user = new User(Request::all());
        $user->save();
        //$joder = Input::all();
        //var_dump(Input::all());
        //Request::ajax()
        //return response()->json('Todo not found', 401);
       return response()->json(
           array(
               'status'=>200,
               'data'=>Request::all())
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
        abort(403, 'Unauthorized action.');
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
