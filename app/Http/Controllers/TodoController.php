<?php


namespace App\Http\Controllers;
use App\Models\todo;
use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\ValidationException;

class TodoController extends Controller
    
{

    function index() {
        $todos = todo::all();
        return view('index')->with('todos', $todos);
    }

    function create() {

        return view('create');
    }

    use ValidatesRequests;
    
    public function store() {
        // Validate the data by marking the fields as required
        try {
            $this->validate(request(),[
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
            
        }
       
        $data = request()->all();  //Get all the request/data coming in from the form
         
        $todo = new todo();  //Store the data in an object
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save(); //Save them in a database

        session()->flash('success', 'Todo created seuccessfylly'); //Display a success message
        
        return redirect('/'); //Redirect to the home page

    }

    public function edit($id) {
        $todo = todo::find($id);
        return view('edit', compact('todo'));    }

    public function update(todo $todo){

            try {
                $this->validate(request(), [
                    'name' => ['required'],
                    'description' => ['required'],
               
                ]);
            } catch (ValidationException $e) {
            }
    
            $data = request()->all();
    
            
            $todo->name = $data['name'];
            $todo->description = $data['description'];
            $todo->save();
    
            session()->flash('success', 'Todo updated successfully');
    
            return redirect('/');
    
        }
    
    
    function delete(todo $todo) {
        $todo->delete();
         
        return redirect('/');
    }

    public function details(todo $todo) {
        return view('details')->with('todo', $todo);
    }
}
