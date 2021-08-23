<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgentResource;
use App\Models\Agent;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        $leaves = function ($query) use ($request) {
            $query->whereBetween('date', [
                $request->from,
                $request->to,
            ]);
        };

        $agents = Agent::whereHas('agent_leaves', $leaves)->with(['agent_leaves' => function ($q) use ($request) {
            $q->whereBetween('date', [
                $request->from,
                $request->to,
            ]);
        }])->get();

        return AgentResource::collection($agents);
    }
}
