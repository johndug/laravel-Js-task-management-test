<form id="form" method="post">
     @csrf
    <div>
        <label class="block font-medium text-sm text-gray-700" for="title">Title:</label>
        <x-text-input type="text" name="title" required />
    </div>
    <div>
        <label class="block font-medium text-sm text-gray-700" for="description">Description:</label>
        <x-text-input name="description" required />
    </div>
    <div>
        <label class="block font-medium text-sm text-gray-700" for="due_date">Due Date:</label>
        <x-text-input type="date" name="due_date" required />
    </div>
    <div>
        <x-input-label>Completed:</x-input-label>
        <input type="checkbox" name="completed">
    </div>
    <div>
        <x-primary-button type="submit">Save</x-primary-button>
    </div>
</form>
