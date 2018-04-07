<?php

namespace App\Http\Controllers;

use App\Handlers\MsgHandler;
use App\Models\Project;
use App\Models\User;

class PagesController extends Controller
{
    public function root($salt)
    {
        $msg = new MsgHandler();

        return json_encode($msg->success($salt));
    }

    public function getUserData($salt, User $user)
    {
        $msg = new MsgHandler();

        if (empty($user->id) || empty($salt)) {
            return json_encode($msg->error('参数错误'));
        }

        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];

        return json_encode($msg->success($salt, $data));
    }

    public function getProjectData($salt, Project $project)
    {
        $msg = new MsgHandler();

        if (empty($project->id) || empty($salt)) {
            return json_encode($msg->error('参数错误'));
        }

        $data = [
            'id' => $project->id,
            'name' => $project->name,
            'summary' => $project->summary,
            'author' => $project->user->name
        ];

        return json_encode($msg->success($salt, $data));
    }
}
