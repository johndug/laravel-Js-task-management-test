<form method="post">
     @csrf
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" required>{{ $task->description }}</textarea>
    </div>
    <div>
        <label>Due Date:</label>
        <input type="date" name="due_date" value="{{ $task->due_date }}" required>
    </div>
    <div>
        <label>Completed:</label>
        <input type="checkbox" name="completed" @if ($task->completed) checked @endif >
    </div>
    <div>
        <x-primary-button click="save">Save</x-primary-button>
    </div>
</form>
