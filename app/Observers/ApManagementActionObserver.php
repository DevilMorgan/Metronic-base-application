<?php

namespace App\Observers;

use App\Models\ApManagement;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ApManagementActionObserver
{
    public function created(ApManagement $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ApManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ApManagement $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ApManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ApManagement $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ApManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
