<table class="w-full border-collapse table-auto table-striped table-hover">
    <thead>
        <tr>
            <th class="text-left">Task</th>
            <th class="text-left">Due Date</th>
            <th class="text-left">Description</th>
            <th class="text-left">Completed</th>
            <th class="text-left">Edit</th>
            <th class="text-left">Delete</th>
        </tr>
    </thead>
    <tbody>
        <x-primary-button>
            <a href="{{ route('tasks.create') }}">Create Task</a>
        </x-primary-button>
        @forelse ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->completed }}</td>
                <td>
                    <x-primary-button>
                        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    </x-primary-button>
                </td>
                <td>
                    <x-danger-button class="delete-task" data-id="{{ $task->id }}">
                        Delete
                    </x-danger-button>
            </tr>
        @empty
            <tr>
                <td colspan="3">No tasks found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<script>
const deleteButtons = document.querySelectorAll('.delete-task');

deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const id = this.dataset.id;
        const url = `/tasks/delete/${id}`;
        const token = document.querySelector('meta[name="csrf-token"]').content;

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token
            }
        })
        .then(() => {
            window.location.reload();
        })
        .catch(error => console.error(error));
    });
});
</script>
