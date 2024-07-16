<div>
    <h1>Todo List</h1>
    
    <form wire:submit.prevent="addTask">
        <input type="text" wire:model="newTask" placeholder="Add a new task">
        <button type="submit">Add</button>
    </form>
    
    <ul>
        @foreach($todos as $todo)
            <li>
                <input type="checkbox" wire:click="toggleComplete({{ $todo->id }})" 
                       {{ $todo->is_completed ? 'checked' : '' }}>
                <span class="{{ $todo->is_completed ? 'line-through' : '' }}">
                    {{ $todo->task }}
                </span>
            </li>
        @endforeach
    </ul>
</div>