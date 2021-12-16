<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mark
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // only allow the person who is in project_mark_allocations and taken === 1 to mark the project
        // if user->project_mark_allocations->array of IDs matches the URL then OKAY
        
       $project = $request->route('id');

       foreach(Auth::user()->project_mark_allocations as $projects_to_mark)
       {
            $to_mark[] = $projects_to_mark->project_id;
       }

       if(in_array($project, $to_mark)){
            return $next($request);
        }

        return redirect('/');

    }
}
