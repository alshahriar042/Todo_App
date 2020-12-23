<?php

namespace App\Http\Controllers;


use App\Repository\TaskRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * Create a new controller instance.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository=$taskRepository;
    }

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws Exception
     */
    public function index()
    {
    $tasks=$this->taskRepository->getRecentTasksOfCurrentUser();

        return view('home',compact('tasks'));

    }
}
