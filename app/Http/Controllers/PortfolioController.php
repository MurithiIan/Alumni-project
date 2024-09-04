<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\User;
use App\Models\alumni_portfolios;
use App\Models\alumni_jobs;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
         // Set the timezone to a specific country, e.g., America/New_York
         $timezone = 'Africa/Nairobi';
         $datetime = new DateTime('now', new DateTimeZone($timezone));
         $currentTime = $datetime->format(' H:i:s');
         $userId = Auth::id();
         $portfolio = alumni_portfolios::where('user_id', $userId)->get();
         


         
        return view('Action.portfolio.index', [
            
            'currentTime' => $currentTime,
            'portfolios' => $portfolio
        ]);
    }

    public function show(alumni_portfolios $portfolio)
    {
        return view('Action.portfolio.show', compact('portfolio'));
    }

    public function create()
    {
        return view('Action.portfolio.create');
    }

    public function edit(alumni_portfolios $portfolio)
    {
        return view('Action.portfolio.edit', [
            'portfolio' => $portfolio
        ]);
    }

    public function update(Request $request, alumni_portfolios $portfolio)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'education' => 'required|string|max:255',
            'skills' => 'nullable|string',
            'description' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Handle Profile Picture file
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            $profilePicturePath = $portfolio->profile_picture;
        }

        $portfolio->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'education' => $request->education,
            'skills' => $request->skills,
            'description' => $request->description,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('portfolio.index')->with('status', 'Portfolio updated successfully');
    }

public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'string',
        'dob' => 'date',
        'education' => 'string|max:255',
        'skills' => 'nullable|string',
        'description' => 'required|string',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'string|min:3',
       
    ]); 




    // Handle Profile Picture file
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
    } else {
        $profilePicturePath = null;
    }

    $email = Auth::user()->email;

    // Create or update portfolio
    $portfolio = alumni_portfolios::updateOrCreate(
        ['user_id' => Auth::id()],
        [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $email,
            'dob' => $request->dob,
            'education' => $request->education,
            'skills' => $request->skills,
            'description' => $request->description,
            'profile_picture' => $profilePicturePath,
        ]
    );

    if ($request->has('password')) {
        $portfolio->update(['password' => bcrypt($request->password)]);
    }   
    


    return redirect('/portfolio');
}

    public function destroy(alumni_portfolios $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('status', 'Portfolio deleted successfully');
    }
}