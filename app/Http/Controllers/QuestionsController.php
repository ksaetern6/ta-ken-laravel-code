<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionsController extends Controller
{
    public function index()
    {
        $questionModel = Question::find(1);

        $answersCollection = $questionModel->answers;
        $answers = [];
        
        // loading the answers with question_id 1
        foreach ( $answersCollection as $answer ) {
            $answers[] = $answer->answer;
        }

        $question = (object) [
            'question' => $questionModel->question_text, 
            'question_display_text' => $questionModel->question_display_text,
            'answers' => $answers,
        ];
        // Log::info()
        return Response([$question], 200);
    }

    public function update(Request $request)
    {
        $questionModel = Question::find(1);
        $newQuestion = $request['question_form'];

        $questionModel->question_text = $newQuestion;
        $questionModel->question_display_text = $newQuestion;
        $questionModel->save();

        return Response('question saved', 200);
        
    }
}
