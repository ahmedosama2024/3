<?php

namespace App\Http\Controllers;

use App\Http\Resources\Bookresource;
use App\Models\Book;
use Illuminate\Http\Request;
use Validator;

class Apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();

        return Bookresource::collection($books);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'Title'=>'required',
            'Author'=>'required',
            'Published_at'=>'required',
            'Genre'=>'required',
            'Describtion'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }   
        $books=Book::create([
            'Title'=> $request->Title,
            'Author'=> $request->Author,
            'Published_at'=> $request->Published_at,
            'Genre'=> $request->Genre,
            'Describtion'=> $request->Describtion
        ]);
        $data=[
            'success'=>'Data Added Successfuly',
            'data'=>$books
             ];
        return Bookresource::collection($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book= Book::findOrFail($id);
        if(!$book){
            return response()->json([
                'message'=>'Book Not Found'
            ]);
        }
        return new Bookresource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book=Book::findOrFail($id);
        if(!$book){
            return response()->json([
                'message'=>'Book Not Found'
            ]);
        }
        $validate=Validator::make($request->all(),[
            'Title'=>'required',
            'Author'=>'required',
            'Published_at'=>'required',
            'Gerne'=>'required',
            'Describtion'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }
        $book->Title=$request->Title;
        $book->Author=$request->Author;
        $book->Published_at=$request->Published_at;
        $book->Gerne=$request->Gerne;
        $book->Describtion=$request->Describtion;
        $book->save();

        return new Bookresource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book=Book::findOrFail($id);
        if(!$book){
            return response()->json([
                'message'=>'Book Not Found'
            ]);
        }
        $book->delete();

        $books=Book::all();
        $data=[
            'success'=>'Data Deleted Successfuly',
            'data'=>$books
             ];
        return Bookresource::collection($data);                
        
    }
}
