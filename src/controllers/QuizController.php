<?php

namespace Controllers;

use Models\Quiz;
use Models\UserAnswer;
use Leaf\Http\Request;
use Leaf\Http\Response;

class QuizController
{
    public function index()
    {
        $quizzes = Quiz::all();
        Response::json($quizzes);
    }

    public function submit(Request $request)
    {
        $answers = $request->body('answers');
        $userId = $request->body('user_id');

        $score = 0;

        foreach ($answers as $answer) {
            $quiz = Quiz::find($answer['quiz_id']);
            $isCorrect = $quiz->correct_option === $answer['selected_option'];
            if ($isCorrect) {
                $score++;
            }
            UserAnswer::create([
                'user_id' => $userId,
                'quiz_id' => $answer['quiz_id'],
                'selected_option' => $answer['selected_option'],
                'is_correct' => $isCorrect,
            ]);
        }

        Response::json(['score' => $score]);
    }
}
