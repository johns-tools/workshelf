<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('channels.chat', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('channels.chat', function () {
//     return true;
// });