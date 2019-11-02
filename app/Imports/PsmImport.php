<?php

namespace App\Imports;

use App\Psm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class PsmImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);

        return new Psm([
            'date' => $row['date'],
            'agentid' => $row['agentid'],
            'totalanswered' => $row['totalanswered'],
            'answeredgTen' => $row['answeredg10'],
            'totaltalktime(m)' => $row['totaltalktimem'],
            'ATT(s)' => $row['atts'],
            'totalwraptime(m)' => $row['totalwraptimem'],
            'AWT(s)' => $row['awts'],
            'totalholdtime(s)' => $row['totalholdtimes'],
            'totalhandletime(m)' => $row['totalhandletimem'],
            'AHT(s)' => $row['ahts'],
            'ansScore' => $row['ansscore'],
            'ttScore' => $row['ttscore'],
            'wtScore' => $row['wtscore'],
            'htScore' => $row['htscore'],
            'whScore' => $row['whscore'],
            'totalScore' => $row['totalscore'],
            'label' => $row['label'],

        ]);


    }
}
