<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserDepartment;
use App\Models\Department;
use App\Events\UserCreated;
use Illuminate\Support\Facades\DB;

class InsertPivotRecords
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        DB::table('user_departments')->insert([
          'user_id' => $event->user_id,
          'department_id' => Department::inRandomOrder()->value('id'),
        ]);
        DB::table('user_departments')->insert([
          'user_id' => $event->user_id,
          'department_id' => Department::inRandomOrder()->value('id'),
        ]);
    }
}
