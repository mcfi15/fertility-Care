<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BoardMemberController extends Controller
{
    public function index(){
        $boards = Board::orderBy('id', 'DESC')->paginate('10');
        return view('admin.board.index', compact('boards'));
    }

    public function create(){
        return view('admin.board.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG']
        ]);

        $board = new Board;

        $board->name = $request->name;
        $board->position = $request->position;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/board/',$filename);
            $board->image = "uploads/board/$filename";
        }
        
        $board->save();

        return redirect('admin/board')->with('message', 'Board uploaded successfully');

    }

    public function edit(int $board){
        $board = Board::findOrFail($board);
        return view('admin.board.edit', compact('board'));
    }

    public function update(Request $request, int $board){
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,PNG,JPG,JPEG']
        ]);

        $board = Board::findOrFail($board);

        $board->name = $request->name;
        $board->position = $request->position;

        if($request->hasFile('image')){

            $path = $board->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/board/',$filename);
            $board->image = "uploads/board/$filename";
        }
        $board->update();

        return redirect('admin/board')->with('message', 'Board updated successfully');

    }

    public function destroy(Board $board){
        if($board->count() > 0){
            $destination = $board->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $board->delete();
            return redirect('admin/board')->with('message', 'Date deleted successfully'); 
            
        }
        return redirect('admin/board')->with('message', 'Something went wrong'); 
    }
}
