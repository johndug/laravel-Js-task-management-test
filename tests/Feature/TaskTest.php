<?php

use App\Models\User;
use App\Models\Task;

it('can list task', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('tasks.index'));

    $response->assertOk();
});

it('can create task', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('tasks.storeApi'), [
            'title' => 'Task Title',
            'description' => 'Task Description',
            'due_date' => '2021-01-01',
            'completed' => true,
        ]);

        $response->assertOk();
});

it('can show task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('tasks.show', $task->id));

    $response->assertOk();
});

it('can update task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    $response = $this
        ->actingAs($user)
        ->patch(route('tasks.updateApi', $task->id), [
            'title' => 'Task Title',
            'description' => 'Task Description',
            'due_date' => '2021-01-01',
            'completed' => true,
        ]);

    $response->assertOk();
});

it('can delete task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete(route('tasks.destroy', $task->id));

    $response->assertOk();
});

