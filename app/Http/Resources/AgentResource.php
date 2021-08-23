<?php

namespace App\Http\Resources;

use App\Settings\GeneralSettings;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AgentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $officialHealthyLeaves = app(GeneralSettings::class)->healthy_leaves;
        $officialYearlyLeaves = app(GeneralSettings::class)->yearly_leaves;

        $countOfHealthyLeaves = $this->agent_leaves->where('type', 'healthy')->count();
        $countOfYearlyLeaves = $this->agent_leaves->where('type', 'yearly')->count();

        $countOfHealthyLeaves = $countOfHealthyLeaves > $officialHealthyLeaves ? $countOfHealthyLeaves - $officialHealthyLeaves : 0;
        $countOfYearlyLeaves = $countOfYearlyLeaves > $officialYearlyLeaves ? $countOfYearlyLeaves - $officialYearlyLeaves : 0;
        $countOfLeaves = $countOfHealthyLeaves + $countOfYearlyLeaves;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'salary' => $this->salary,
            'total_salary' => $this->total_salary,
            'agent_leaves' => $countOfLeaves,
            'agent_healthy_leaves' => $countOfHealthyLeaves,
            'agent_yearly_leaves' => $countOfYearlyLeaves,
            'salary_per_day' => $this->total_salary / 22,
            'salary_discount' => ($this->total_salary / 22) * $countOfLeaves,
            'salary_after_discount' => $this->total_salary - ($this->total_salary / 22) * $countOfLeaves,
            'created_at' => $this->created_at,
        ];
    }
}
