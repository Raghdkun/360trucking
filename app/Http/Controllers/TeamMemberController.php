<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('dashboard.team.index', compact('teamMembers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|image',
            'social_links' => 'nullable|json',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team_members', 'public');
            $data['image'] = $path;
        }

        TeamMember::create($data);

        return redirect()->back()->with('success', 'Team member added successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return redirect()->back()->with('success', 'Team member deleted successfully.');
    }
}

