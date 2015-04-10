<?php namespace Myapi\Http\Controllers\Admin;

use Myapi\Http\Requests;
use Myapi\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

use Myapi\Useri;

class UsersiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Useri::paginate(5);
        return response()->json($user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		//
        return "Create Usersi";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $users = Useri::where('first_name','=',Request::input('name'))->get();
        return response()->json($users);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $users = Useri::onlyTrashed()->get();
        return response()->json($users);
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
        return "Edit Usersi";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Restore rows deleted
        $user = Useri::withTrashed()->where('id', $id)->restore();
        return response()->json($user);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//delete user with softDelete
        $user = Useri::findOrfail($id);
        $user ->delete();       //SoftDelete
        //$user->forceDelete(); //Force delete
        return response()->json($user);
	}

}
