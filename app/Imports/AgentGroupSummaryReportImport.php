<?php

namespace App\Imports;

use App\AgentGroupSummaryReport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hekmatinasser\Verta\Verta;


class AgentGroupSummaryReportImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $date= new verta;

        return new AgentGroupSummaryReport([
            'DATE'=> $row['date'],
            'AgentGroup' => $row['agent_group'],
            'AgentID' => $row['agent_id'],
            'AgentName' => $row['agent_name'],
            'ACDCalls' => $row['acd_calls'],
            'AvgACDTime' => $row['avg_acd_time'],
            'AvgACWTime' => $row['avg_acw_time'],
            'PercAgentW' => $row['perc_agent_w'],
            'PercAgentWO' => $row['perc_agent_wo'],
            'ACDTime' => $row['acd_time'],
            'ACWTime' => $row['acw_time'],
            'OtherTime' => $row['other_time'],
            'AuxTime' => $row['aux_time'],
            'AvailTime' => $row['avail_time'],
            'StaffedTime' => $row['staffed_time'],
            'AvgHandlingTime' => $row['avg_handling_time'],
        ]);
    }
}
