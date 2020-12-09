<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Diary;
use App\Meansurement;
class Patient extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function measurements(){
        return $this->hasMany('App\Measurement');
    }

    public function diaries(){
        return $this->hasMany('App\Diary');
    }

    public function cids(){
        return $this->belongsToMany('App\Cid','cids_patients','patient_id','cid_id');
    }

    public function getAdressAttribute(){
        $adress = $this->street . ',' . $this->number;
        if($this->complement){
            $adress = $adress . '-' . $this->complement;
        }
        $adress = $adress . ' ,' . $this->neighborhood . ',' . $this->city . ',' . $this->cep ;
        return $adress;
    }

    public function getDiaryLabelAttribute(){
        $label = $this->diaries->pluck('date');
        foreach($label as $key => $day){
            $label[$key] = date('d/m', strtotime($day));
        }
        return $label->unique();
    }

    public function getMeasurementLabelAttribute(){
        $label = $this->measurements->pluck('time');
        foreach($label as $key => $time){
            $label[$key] = date('H:i', strtotime($time));
        }
        return $label->unique();
    }

    public static function temperatureChart($day,$patient){
        $temperatures = Measurement::where('patient_id',$patient->id)->whereDate('time',$day)->pluck('temperature');
        return $temperatures;
    }

    public static function bloodSaturation($day, $patient){
        $blood_saturation = Measurement::where('patient_id',$patient->id)->whereDate('time',$day)->pluck('blood_saturation');
        return $blood_saturation;
    }
    public static function arterialFrequencyMin($day,$patient){
        $arterial_frequency = Measurement::where('patient_id',$patient->id)->whereDate('time',$day)->pluck('arterial_frequency_min');
        return $arterial_frequency;
    }

    public static function arterialFrequencyMax($day,$patient){
        $arterial_frequency = Measurement::where('patient_id',$patient->id)->whereDate('time',$day)->pluck('arterial_frequency_max');
        return $arterial_frequency;
    }

    public static function heartRate($day, $patient){
        $heart_rate = Measurement::where('patient_id',$patient->id)->whereDate('time',$day)->pluck('heart_rate');
        return $heart_rate;
    }

    public static function sleep($day, $patient){
        $sleep = Diary::where('patient_id',$patient->id)->pluck('sleep');
        $array = [];
        foreach($sleep as $sleepSeconds){
            array_push($array, date('h.i',strtotime($sleepSeconds)));
        }
        return $array;
    }

    public static function walk($patient){
        $walk = Diary::where('patient_id', $patient->id)->pluck('walk');
        return $walk;
    }

    public function getDaysPatientMeasurementAttribute(){
        $date = [];
        foreach($this->measurements as $measurement){
            array_push($date, date('Y-m-d', strtotime($measurement->time)));
        }
        $date = collect($date);
        $dates = $date->unique();
        $newDate = [];
        foreach($dates as $date){
            array_push($newDate, $date);
        }
        return collect($newDate);
    }

    public function getDaysPatientAttribute(){
        $date = [];
        foreach($this->diaries as $diary){
            array_push($date, date('Y-m-d', strtotime($diary->date)));
        }
        $date = collect($date);
        return $date->unique();
    }

    public function getFirstDateAttribute(){
        dd($this->measurement_label);
    }
    public function getWalkDayFirstAttribute(){
        $date = $this->days_patient->first();
        $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date)->first();
        return $diary->walk;
    }

    public function getSleepDayFirstAttribute(){
        $date = $this->days_patient->first();
        $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date)->first();
        return $diary->sleep;
    }

    public function getTemperatureDayFirstAttribute(){
        $date = $this->days_patient_measurement;
        $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date)->get();
        if($measurements->count() > 0){
            return round($measurements->sum('temperature')/$measurements->count(),1);
        }
    }

    public function getHeartRateDayFirstAttribute(){
        $date = $this->days_patient_measurement->first();
        $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date)->get();
        if($measurements->count() > 0){
            return round($measurements->sum('heart_rate')/$measurements->count(),1);
        }
    }

    public function getBloodSaturationDayFirstAttribute(){
        $date = $this->days_patient_measurement->first();
        $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date)->get();
        if($measurements->count() > 0){
            return round($measurements->sum('blood_saturation')/$measurements->count(),1);
        }
    }

    public function getArterialFrequencyMinDayFirstAttribute(){
        $date = $this->days_patient_measurement->first();
        $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date)->get();
        if($measurements->count() > 0){
            return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
        }
    }

    public function getArterialFrequencyMaxDayFirstAttribute(){
        $date = $this->days_patient_measurement->first();
        $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date)->get();
        if($measurements->count() > 0){
            return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
        }
    }

    public function getWalkDaySecondAttribute(){
        $date = $this->days_patient;
        if($date->count() > 1){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[1])->first();
            return $diary->walk;
        }
    }

    public function getSleepDaySecondAttribute(){
        $date = $this->days_patient;
        if($date->count() > 1){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[1])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDaySecondAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 1){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[1])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDaySecondAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 1){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[1])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationDaySecondAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 1){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[1])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDaySecondAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 1){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[1])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDaySecondAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 1){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[1])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkDayThirdAttribute(){
        $date = $this->days_patient;
        if($date->count() > 2){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[2])->first();
            return $diary->walk;
        }
    }

    public function getSleepDayThirdAttribute(){
        $date = $this->days_patient;
        if($date->count() > 2){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[2])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDayThirdAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 2){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDayThirdAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 2){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationDayThirdAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 2){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDayThirdAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 2){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDayThirdAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 2){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkDayFourthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 3){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[3])->first();
            return $diary->walk;
        }
    }

    public function getSleepDayFourthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 3){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[3])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDayFourthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 3){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[3])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDayFourthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 3){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[3])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationDayFourthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 3){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[3])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDayFourthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 3){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDayFourthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 3){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkDayFifthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 4){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[4])->first();
            return $diary->walk;
        }
    }

    public function getSleepDayFifthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 4){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[4])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDayFifthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 4){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[4])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDayFifthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 4){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[4])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationeDayFifthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 4){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[4])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDayFifthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 4){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDayFifthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 4){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkDaySixthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 5){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[5])->first();
            return $diary->walk;
        }
    }

    public function getSleepDaySixthAttribute(){
        $date = $this->days_patient;
        if($date->count() > 5){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[5])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDaySixthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 5){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[5])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDaySixthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 5){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[5])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationDaySixthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 5){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[5])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDaySixthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 5){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDaySixthAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 5){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkDaySeventhAttribute(){
        $date = $this->days_patient;
        if($date->count() > 6){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[6])->first();
            return $diary->walk;
        }
    }

    public function getSleepDaySeventhAttribute(){
        $date = $this->days_patient;
        if($date->count() > 6){
            $diary = Diary::where('patient_id', $this->id)->whereDate('date', $date[6])->first();
            return $diary->sleep;
        }
    }

    public function getTemperatureDaySeventhAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 6){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[6])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('temperature')/$measurements->count(),1);
            }
        }
    }

    public function getHeartRateDaySeventhAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 6){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[6])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('heart_rate')/$measurements->count(),1);
            }
        }
    }

    public function getBloodSaturationDaySeventhAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 6){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[6])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('blood_saturation')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMinDaySeventhAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 6){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_min')/$measurements->count(),1);
            }
        }
    }

    public function getArterialFrequencyMaxDaySeventhAttribute(){
        $date = $this->days_patient_measurement;
        if($date->count() > 6){
            $measurements = Measurement::where('patient_id', $this->id)->whereDate('time', $date[2])->get();
            if($measurements->count() > 0){
                return round($measurements->sum('arterial_frequency_max')/$measurements->count(),1);
            }
        }
    }

    public function getWalkWeekAttribute(){
        $walk = $this->walk_day_first + $this->walk_day_second + $this->walk_day_third + $this->walk_day_fourth + $this->walk_day_fifth + $this->walk_day_sixth + $this->walk_day_seventh;
        return round($walk/7,1);
    }

    public function getSleepWeekAttribute(){
        $sleep = strtotime($this->sleep_day_first) + strtotime($this->sleep_day_second) + strtotime($this->sleep_day_third) + strtotime($this->sleep_day_fourth) + strtotime($this->sleep_day_fifth) + strtotime($this->sleep_day_sixth) + strtotime($this->sleep_day_seventh);
        return date('H:i', $sleep/7);
    }

    public function getTemperatureWeekAttribute(){
        $temperature = $this->temperature_day_first + $this->temperature_day_second + $this->temperature_day_third + $this->temperature_day_fourth + $this->temperature_day_fifth + $this->temperature_day_sixth + $this->temperature_day_seventh;
        return round($temperature/7,1);
    }

    public function getHeartRateWeekAttribute(){
        $heart_rate = $this->heart_rate_day_first + $this->heart_rate_day_second + $this->heart_rate_day_third + $this->heart_rate_day_fourth + $this->heart_rate_day_fifth + $this->heart_rate_day_sixth + $this->heart_rate_day_seventh;
        return round($heart_rate/7,1);
    }

    public function getBloodSaturationWeekAttribute(){
        $blood_saturation = $this->blood_saturation_day_first + $this->blood_saturation_day_second + $this->blood_saturation_day_third + $this->blood_saturation_day_fourth + $this->blood_saturation_day_fifth + $this->blood_saturation_day_sixth + $this->blood_saturation_day_seventh;
        return round($blood_saturation/7,1);
    }

    public function getArterialFrequencyMinWeekAttribute(){
        $arterial_frequency_min = $this->arterial_frequency_min_day_first + $this->arterial_frequency_min_day_second + $this->arterial_frequency_min_day_third + $this->arterial_frequency_min_day_fourth + $this->arterial_frequency_min_day_fifth + $this->arterial_frequency_min_day_sixth + $this->arterial_frequency_min_day_seventh;
        return round($arterial_frequency_min/7,1);
    }

    public function getArterialFrequencyMaxWeekAttribute(){
        $arterial_frequency_max = $this->arterial_frequency_max_day_first + $this->arterial_frequency_max_day_second + $this->arterial_frequency_max_day_third + $this->arterial_frequency_max_day_fourth + $this->arterial_frequency_max_day_fifth + $this->arterial_frequency_max_day_sixth + $this->arterial_frequency_max_day_seventh;
        return round($arterial_frequency_max/7,1);
    }
}
