<?php

namespace App\Observers;

use App\Models\StationManagement;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class StationManagementActionObserver
{
    public function created(StationManagement $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'StationManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(StationManagement $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'StationManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(StationManagement $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'StationManagement'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
