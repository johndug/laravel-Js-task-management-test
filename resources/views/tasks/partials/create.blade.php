<form id="form" method="post">
     @csrf
    <div>
        <label>Title:</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" required></textarea>
    </div>
    <div>
        <label>Due Date:</label>
        <input type="date" name="due_date" required>
    </div>
    <div>
        <label>Completed:</label>
        <input type="checkbox" name="completed">
    </div>
    <div>
        <x-primary-button type="submit">Save</x-primary-button>
    </div>
</form>
