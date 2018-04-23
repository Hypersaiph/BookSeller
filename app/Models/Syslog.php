<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Syslog extends Model
{
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id', 'record_id', 'event', 'table', 'description'
    ];
    public function log($user_id, $record_id, $event, $table, $type){
        $user = User::find($user_id);
        if($type == 1){//evento en tabla
            $syslog = new Syslog([
                'user_id' => $user_id,
                'record_id' => $record_id,
                'event' => $event,
                'table' => $table,
                'description' => $user->name.' '.$event.'d a record with ID='.$record_id.' in the table '.$table.' on '.date('Y-m-d H:i:s')
            ]);$syslog->save();
        }else{
            if($type == 2){//evento de acceso
                $syslog = new Syslog([
                    'user_id' => $user_id,
                    'record_id' => null,
                    'event' => $event,
                    'table' => null,
                    'description' => $user->name.' has logged '.$event.', on '.date('Y-m-d H:i:s')
                ]);$syslog->save();
            }
        }
    }
}
