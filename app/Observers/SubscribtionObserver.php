<?php

namespace App\Observers;

use App\Models\subscribtions;
use App\Models\User;
use App\Notifications\NewUserNotification;

class SubscribtionObserver
{
    /**
     * Handle the subscribtions "created" event.
     */
    public function created(subscribtions $subscribtions): void
    {
        $admin = User::query()->where('type','=','admin')->first();
        $admin->notify(new NewUserNotification($subscribtions));
    }

    /**
     * Handle the subscribtions "updated" event.
     */
    public function updated(subscribtions $subscribtions): void
    {
        //
    }

    /**
     * Handle the subscribtions "deleted" event.
     */
    public function deleted(subscribtions $subscribtions): void
    {
        //
    }

    /**
     * Handle the subscribtions "restored" event.
     */
    public function restored(subscribtions $subscribtions): void
    {
        //
    }

    /**
     * Handle the subscribtions "force deleted" event.
     */
    public function forceDeleted(subscribtions $subscribtions): void
    {
        //
    }
}
