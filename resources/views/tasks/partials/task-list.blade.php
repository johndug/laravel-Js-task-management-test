<table>
    <thead>
        <tr>
            <th>Task</th>
            <th>Due Date</th>
            <th>Description</th>
            <th>Completed</th>
            <th>Edit</th>
            <th>Delete</th>
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
