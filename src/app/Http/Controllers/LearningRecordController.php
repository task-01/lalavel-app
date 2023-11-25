<?php

namespace App\Http\Controllers;

use App\Models\LearningRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class LearningRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    Paginator::useBootstrap();
    $searchkey = $request->input('searchkey');

    $query = LearningRecord::query();

    if (!empty($searchkey)) {
        $query->whereHas('user', function ($query) use ($searchkey) {
            $query->where('name', 'LIKE', "%{$searchkey}%")
                ->orWhere('day', 'LIKE', "%{$searchkey}%")
                ->orWhere('hours', 'LIKE', "%{$searchkey}%")
                ->orWhere('text', 'LIKE', "%{$searchkey}%");
        });
    }

    $learningrecords = $query->paginate(5);
    $onlearningrecords = $query->where('user_id', auth()->id())->paginate(5);
    return view('learningrecords.index', compact('learningrecords', 'searchkey', 'onlearningrecords'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = "■学習日数\n〜\n\n■学習内容\n〜\n\n■理解したポイントや参考になった情報\n〜\n\n■感想\n〜\n\n■明日の学習計画\n〜";

        return view('learningrecords.create', ['content_text' => $content ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'day' => 'required',
            'hours' => 'required|numeric|between:0,24',
            'text' => 'required'
        ]);

        $learningrecord = new LearningRecord;
        $learningrecord->text = $request->text;
        $learningrecord->hours = $request->hours;
        $learningrecord->day = $request->day;
        $learningrecord->user_id = auth()->id();
        $learningrecord->save();

        return redirect('/learningrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LearningRecord  $learningrecord
     * @return \Illuminate\Http\Response
     */
    public function show(LearningRecord $learningrecord)
    {
        return view('learningrecords.show', ['learningrecord' => $learningrecord]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearningRecord  $learningrecord
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningRecord $learningrecord)
    {
        return view('learningrecords.edit', ['learningrecord' => $learningrecord]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearningRecord  $learningrecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearningRecord $learningrecord)
    {
        $validator = $request->validate([
            'day' => 'required',
            'hours' => 'required|numeric|between:0,24',
            'text' => 'required'
        ]);

        $learningrecord->text = $request->text;
        $learningrecord->hours = $request->hours;
        $learningrecord->day = $request->day;
        $learningrecord->save();
        return redirect('learningrecords/'.$learningrecord->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearningRecord  $learningrecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $learningrecord = LearningRecord::find($id);
        $learningrecord->delete();
        return redirect('learningrecords/');
    }
}
