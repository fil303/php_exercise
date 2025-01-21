<?php
//----------------------------------------------------------------------
// Instead of this:
// Fetching all users at once
$users = User::all(); 
foreach ($users as $user) {
    // Process user data
    echo $user->name;
}

// Use chunk() like this:
// Processing users in smaller batches
User::chunk(500, function ($users) {
    foreach ($users as $user) {
        // Process user data
        echo $user->name;
    }
});

// Bonus: ChunkById for Sequential Processing
// If you need to ensure proper sequence or avoid
// missing records during updates, use chunkById().
User::chunkById(500, function ($users) {
    foreach ($users as $user) {
        // Process user data safely in sequence
        echo $user->name;
    }
});
//----------------------------------------------------------------------