<?php
namespace App\Repository;

use App\Models\Task;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class TaskRepository {
    use AuthTrait;

    public function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    public function getTasksOfCurrentUser() {
        $this->userAuthCheck();

        $userId = Auth::id();
        return Task::where('user_id', $userId)
            ->orderBy('ending_time', 'asc')
            ->get();
    }

    public function getTaskCountOfCurrentUser() {
        return count($this->getTasksOfCurrentUser());
    }

    public function getRecentTasksOfCurrentUser($noOfTasks = 5)
    {
        return $this->getTasksOfCurrentUser()->take($noOfTasks);
    }

    public function createTask($task)
    {
        $endTime = (new \DateTime($task['ending_time']))->format('Y-m-d h:i:s');
        $userID = Auth::id();
        $task = Task::create([
            'name' => $task['name'],
            'description' => $task['description'],
            'ending_time' => $endTime,
            'user_id' => $userID,
        ]);

        if (!$task) {
            throw new \Exception("Failure saving task");
        }

        return $task;
    }

}
