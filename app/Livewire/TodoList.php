<?php

namespace App\Livewire;

use Livewire\Component;

class TodoList extends Component
{
    public $newTask = '';

    public function addTask()
    {
        $this->validate(['newTask' => 'required|min:3']);
        
        Todo::create(['task' => $this->newTask]);
        $this->newTask = '';
    }

    public function toggleComplete($id)
    {
        $todo = Todo::find($id);
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->get()
        ]);
    }
}
