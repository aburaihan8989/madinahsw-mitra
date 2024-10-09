<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Report\Entities\Activity;
use Illuminate\Contracts\Support\Renderable;
use Modules\Report\DataTables\ActivityDataTable;
use Modules\Report\DataTables\ScheduleDataTable;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class ActivityController extends Controller
{

    public function index(ActivityDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('reports::activity.index');
    }


    public function schedule(ScheduleDataTable $dataTable) {
        // abort_if(Gate::denies('access_report'), 403);

        return $dataTable->render('reports::activity.schedule');
    }


    public function create() {
        // abort_if(Gate::denies('create_report'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        return view('reports::activity.create', compact('agent'));
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('create_report'), 403);

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
        // abort_if(Gate::denies('edit_report'), 403);
        $getdata = Http::get(settings()->api_url . 'api/agent/' . auth()->user()->agent_id);
        $agent = $getdata->json();

        return view('reports::activity.edit', compact('activity', 'agent'));
    }


    public function update(Request $request, Activity $activity) {
        // abort_if(Gate::denies('update_report'), 403);

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


    public function show(Activity $activity) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('reports::activity.show', compact('activity'));
    }


    public function show_schedule(Activity $id_activity) {
        // abort_if(Gate::denies('show_report'), 403);

        return view('reports::activity.show-schedule', compact('id_activity'));
    }


    public function destroy(Activity $activity) {
        // abort_if(Gate::denies('delete_report'), 403);

        $activity->delete();

        toast('Activity Report Deleted!', 'warning');

        return redirect()->route('activity.index');
    }


    public function getActivity() {
        // abort_if(Gate::denies('show_customers'), 403);
        $data = Activity::all();

        return $data;
    }


    public function getActivityAgent($activity_id) {
        // abort_if(Gate::denies('show_customers'), 403);
        $data = Activity::findOrFail($activity_id);

        return $data;
    }


    public function updateActivityAgent($activity_id, Request $request) {
        // abort_if(Gate::denies('update_customers'), 403);
        // @dd($request);
        $data = DB::table('activities')
                ->where('id', $activity_id)
                ->update(['detail_activity' => $request->detail_activity]);
    }


}
