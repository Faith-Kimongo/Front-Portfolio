<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
 
    public function index(Request $request)
    {


        $searchQuery = $request->search;

    
        $jobs = Job::where('title', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                    ->get();
    
    
        //index
        return view('jobs.index',[
            'jobs'=>$jobs,
            'pinned_job'=>$jobs->first(),
            'savedjobs'=>Auth::user()->savedjobs->pluck('id')->toArray()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        //create
        return view('jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        //store
        $validator = Validator::make($request->all(), [
            'job_title' => 'required',
            'job_location' => 'required',
            'job_desc' => 'required',
            'category_id' => 'required|exists:categories,id',
            'job_deadline' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $job = new Job;
        $job->title = $request->input('job_title');
        $job->user_id=Auth::id();
        $job->location = $request->input('job_location');
        $job->category_id = $request->input('category_id');
        $job->description = $request->input('job_desc');
        $job->responsibilities = $request->input('job_resp');
        $job->requirements = $request->input('job_req');
        $job->remuneration = $request->input('job_remuneration');
        $job->deadline = $request->input('job_deadline');
        $job->cover_letter = $request->input('cover_letter') ?? 0;
        $job->save();

        return back()->with('success','Job Added successfully');
    }

   
    public function show(Job $job)
    {
        //show a job
        return view('jobs.show',[
            'jobs'=>Job::all(),
            'pinned_job'=>$job,
            'savedjobs'=>Auth::user()->savedjobs->pluck('id')->toArray()
        ]);

    }

   
    public function edit(Job $job)
    {
        $categories=Category::all();
        return view('jobs.edit',compact(['job','categories']));
    }

//    Update a job
    public function update(UpdateJobRequest $request, Job $job)
    {
        //update 
    $job->title = $request->input('job_title');
    $job->location = $request->input('job_location');
    $job->category_id = $request->input('category_id');
    $job->description = $request->input('job_desc');
    $job->responsibilities = $request->input('job_resp');
    $job->requirements = $request->input('job_req');
    $job->remuneration = $request->input('job_remuneration');
    $job->deadline = $request->input('job_deadline');
    $job->publish = $request->has('publish');
    $job->cover_letter = $request->has('cover_letter');
    $job->save();

    // return with success
    return back()->with('success','Job Updated Successfully!');

    }

  
    public function destroy(Job $job)
    {
        //delete

        $job->delete();
        return back()->with('success','Job deleted!');
    }

    public function apply(Job $job){
        return view('jobs.apply',compact('job'));
    }

    public function applyStore(Job $job,Request $request){

        $user_id = auth()->id();



         // Check if the authenticated user is the owner of the job
    if ($job->user_id === auth()->user()->id) {
        return redirect()->back()->with('error', 'You cannot apply to your own job.');
    }

    // Dont apply if already applied
    if (Application::hasApplied($user_id, $job->id)) {
        return redirect()->back()->with('error', 'You have already applied to this job');
    }

        $application=new Application();
        $application->user_id=Auth::id();
        $application->cover_letter=$request->cover_letter;
        $application->job_id=$job->id;
        $application->save();

        return back()->with('success','Application submitted successfully');
    }


    public function applications(){
        return view('jobs.application',[
            'applications'=>Auth::user()->applications
        ]);
    }


    public function jobapplications(Job $job){
        $applications=$job->applications()->get();
        return view('jobs.applicants',compact(['applications','job']));
    }
}
