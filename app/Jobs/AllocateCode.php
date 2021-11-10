<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectMarkAllocation;
use App\Models\Project;
use App\Models\User;



class AllocateCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $project_data = Project::get();

        $project_allocation_data = ProjectMarkAllocation::get();

        //$diff = array_diff($project_data, $project_allocation_data);

        dd($project_data);


        // Search Projects all into array
        // Search ProjectAlloc into array
        // Array diff
        // dd array diff to look and see if i'm write.

        // Cross reference Projects to ProjectMarkAllocation
        // Where no match is found, randomally alloc from array of users excluding those who submitted/in team
        // allocate

        
    }
}
