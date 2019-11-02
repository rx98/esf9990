<?php

namespace App\Imports;

use App\AgentGroupProformanceReport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgentGroupProformanceReportImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new AgentGroupProformanceReport([
            'Day' => $row['day'],
            'AgentID' => $row['agent_id'],
            'Agentgroup' => $row['agent_group'],
            'CountofAnswredCallsWithTalkTimeGrThanTenSecond' => $row['count_of_answred_calls_with_talk_time_10_second'],
            'CountofTotalAnsweredCalls' => $row['count_of_total_answered_calls'],
            'AverageofSuccessfulTalkTime' => $row['average_of_successful_talk_time'],
            'TotalTalkTimeofSuccessfulTalk' => $row['total_talk_time_of_successful_talk'],
            'TotalWrapTimeofSuccessfulTalk' => $row['total_wrap_time_of_successful_talk'],
            'TotalHoldTimeofSuccessfulTalk' => $row['total_hold_time_of_successful_talk'],

        ]);
    }
}
