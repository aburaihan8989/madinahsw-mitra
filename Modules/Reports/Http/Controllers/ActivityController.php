<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Report\Entities\Activity;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\ActivitysDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class ActivityController extends Controller
{

    public function index(ActivitysDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('report::activity.index');
    }


    public function create() {
        // abort_if(Gate::denies('access_report'), 403);

        return view('report::activity.create');
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('access_report'), 403);

        Activity::create([
            'agent_id'          => $request->agent_id,
            'agent_code'        => $request->agent_code,
            'agent_name'        => $request->agent_name,
            'date_activity'     => $request->date_activity,
            'detail_activity'   => $request->detail_activity
        ]);

        toast('Activity Report Created!', 'success');

        return redirect()->route('activity.index');
    }


    public function edit(Activity $activity) {
        // abort_if(Gate::denies('access_report'), 403);

        return view('report::activity.edit', compact('activity'));
    }


    public function update(Request $request, Activity $activity) {
        // abort_if(Gate::denies('access_report'), 403);

        $activity->update([
            'agent_id'          => $request->agent_id,
            'agent_code'        => $request->agent_code,
            'agent_name'        => $request->agent_name,
            'date_activity'     => $request->date_activity,
            'detail_activity'   => $request->detail_activity
        ]);

        toast('Activity Report Updated!', 'info');

        return redirect()->route('activity.index');
    }


    public function destroy(Activity $activity) {
        // abort_if(Gate::denies('delete_report'), 403);

        $activity->delete();

        toast('Activity Report Deleted!', 'warning');

        return redirect()->route('activity.index');
    }
}
