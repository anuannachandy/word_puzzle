<?php

namespace App\Services;

use App\Models\Puzzles;
use App\Models\studentSubmission;
use App\Models\Students;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class WordPuzzleService
{
    public function isValidWord(string $word): bool
    {
        //API to validate the word
        $response = Http::get('https://api.dictionaryapi.dev/api/v2/entries/en/' . $word);
        return $response->ok();
    }

    public function calculateScore(string $word): int
    {
        return strlen($word);
    }

    public function processSubmission($studentId, $puzzleId, $word)
    {
        $puzzle = Puzzles::find($puzzleId);
        if ($this->isValidWord($word)) {
            $score = $this->calculateScore($word);
            $submission = studentSubmission::create([
                'student_id' => $studentId,
                'puzzle_id' => $puzzleId,
                'word' => $word,
                'score' => $score,
            ]);
            $remainingLetters = $this->removeLetters($puzzle->puzzle_string, $word);
            $puzzle->puzzle_string = $remainingLetters;
            $puzzle->save();
            return $submission;
        }

        return null;
    }
    public function removeLetters($letters, $word)
    {
        foreach (str_split($word) as $letter) {
            $pos = strpos($letters, $letter);
            if ($pos !== false) {
                $letters = substr_replace($letters, '', $pos, 1);
            }
        }

        return $letters;
    }

    public function getLeaderboard()
    {
        return studentSubmission::select(
            'students.Student_ID',
            'students.name',
            DB::raw('COUNT(word) as number_of_words'),
            DB::raw('SUM(score) as total_score')
        )
            ->join('students', 'student_submission.student_id', '=', 'students.id')
            ->groupBy('students.Student_ID', 'students.name')
            ->orderBy('total_score', 'desc')
            ->limit(10)
            ->get();
    }

    public function dashboardCount()
    {
        $total_words = studentSubmission::select('word')->count();
        $total_students = Students::select('Student_ID')->distinct()->count();
        $total_puzzles = Puzzles::select('puzzle_string')->distinct()->count();
        $highest_score = studentSubmission::select('student_id', DB::raw('SUM(score) as total_score'))
            ->with('Student')
            ->groupBy('student_id')
            ->orderBy('total_score', 'desc')
            ->limit(1)
            ->get()
            ->map(function ($studentSubmission) {
                return [
                    'student_name' => $studentSubmission->student->name,
                    'total_score' => $studentSubmission->total_score,
                ];
            });
        return [
            'total_words' => $total_words,
            'total_students' => $total_students,
            'total_puzzles' => $total_puzzles,
            'highest_score' => $highest_score
        ];
    }
}
