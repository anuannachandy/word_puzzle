<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puzzles;
use App\Models\Students;
use App\Models\studentSubmission;
use App\Services\WordPuzzleService;


class PuzzleController extends Controller
{
    protected $WordPuzzleService;

    public function __construct(WordPuzzleService $WordPuzzleService)
    {
        $this->WordPuzzleService = $WordPuzzleService;
    }

    public function index()
    {
        $dashboard_counts = $this->WordPuzzleService->dashboardCount();
        $leaderboardEntries = $this->WordPuzzleService->getLeaderboard();
        return view('index')->with('counts',$dashboard_counts)->with('leaderboardEntries', $leaderboardEntries);
    }

    public function showPuzzle()
    {
        $puzzle = Puzzles::inRandomOrder()->first();
        if (!$puzzle) {
            $puzzle = Puzzles::create([
                'puzzle_string' => $this->generateRandomString()
            ]);
        }
        $AllWords = studentSubmission::orderBy('id','desc')->get();
        return view('showpuzzle')->with('string', $puzzle)->with('all_submited_words',$AllWords);
    }

    public function submitword(Request $request)
    {
        $puzzleId = $request->input('puzzle_id');
        $word = $request->input('Inputword');
        $student = Students::firstOrCreate(['Student_ID' => $request->input('InputStudentId')]);
        $submission = $this->WordPuzzleService->processSubmission($student->id, $puzzleId, $word);
        if ($submission) {
            return response()->json(['success' => true, 'score' => $submission->score]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid word']);
        }
    }
    public function showLeaderboard()
    {
        $leaderboardEntries = $this->WordPuzzleService->getLeaderboard();
        return view('leaderboard')->with('leaderboardEntries', $leaderboardEntries);
    }
    private function generateRandomString($length = 30)
    {
        return substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyz', ceil($length / strlen($x)))), 1, $length);
    }
}
