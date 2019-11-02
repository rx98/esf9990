<?php

namespace App\Imports;

use App\Quality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class QualityImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Quality([
            'AgentId'  => $row['agent_id'],
            'IDnumber'  => $row['id_number'],
            'Time'  => $row['time'],
            'Critical'  => $row['critical'],
            'NonCritical'  => $row['non_critical'],
            'Item1'  => $row['item1'],
            'Item2'  => $row['item2'],
            'Item3'  => $row['item3'],
            'Item5'  => $row['item5'],
            'Item6'  => $row['item6'],
            'Item7'  => $row['item7'],
            'Item8'  => $row['item8'],
            'Item9'  => $row['item9'],
            'Item10'  => $row['item10'],
            'Item11'  => $row['item11'],
            'Item12'  => $row['item12'],
            'Item13'  => $row['item13'],
            'Bag'  => $row['bag'],
        ]);
    }
}
