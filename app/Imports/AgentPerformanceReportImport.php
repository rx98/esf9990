<?php

namespace App\Imports;

use App\AgentPerformanceReport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AgentPerformanceReportImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AgentPerformanceReport([
            'AgentID' => $row['agent_id'],
            'AgentName' => $row['agent_name'],
            'Date' => $row['date'],
            'CallsReceived' => $row['calls_received'],
            'CallsAnswered' => $row['calls_answered'],
            'AnswerRate' => $row['answer_rate'],
            'CallsAbandoned' => $row['calls_abandoned'],
            'CountofAnswredCallsWithTalkTimeGrThanTenSecond' => $row['count_of_answred_calls_with_talk_time_10_second'],
            'AvgRingingDuration' => $row['avg_ringing_duration'],
            'AvgTalkDuration' => $row['avg_talk_duration'],
            'MaxTalkDuration' => $row['max_talk_duration'],
            'MinTalkDuration' => $row['min_talk_duration'],

        ]);
    }
}
