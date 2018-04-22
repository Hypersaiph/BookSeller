<?php

namespace App\Http\ViewComposers;

use App\Models\Syslog;
use App\User;
use Illuminate\View\View;
use Unisharp\Setting\Setting;

class ProfileComposer
{

    protected $settings;
    public function __construct(Setting $settings)
    {
        // Dependencies automatically resolved by service container...
        $this->settings = $settings;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //general settings
        $penalty_percentage = (double) $this->settings->get('penalty_percentage',null);
        $days_before_penalty = (integer) $this->settings->get('days_before_penalty',null);
        $penalty_schedule = $this->settings->get('penalty_schedule',null);
        $days_in_year = (integer) $this->settings->get('days_in_year',null);
        //notifications settings
        $book_notification = $this->settings->get('book_notification',null);
        $book_type_notification = $this->settings->get('book_type_notification',null);
        $inflows_notification = $this->settings->get('inflows_notification',null);
        //activity settings
        $sales_activity = $this->settings->get('sales_activity',null);
        $customers_activity = $this->settings->get('customers_activity',null);
        $accounts_activity = $this->settings->get('accounts_activity',null);
        $inflows_activity = $this->settings->get('inflows_activity',null);
        $books_activity = $this->settings->get('books_activity',null);
        $book_types_activity = $this->settings->get('book_types_activity',null);


        $book_notification = $book_notification=='true'?true:false;
        $book_type_notification = $book_type_notification=='true'?true:false;
        $inflows_notification = $inflows_notification=='true'?true:false;

        $sales_activity = $sales_activity=='true'?true:false;
        $customers_activity = $customers_activity=='true'?true:false;
        $accounts_activity = $accounts_activity=='true'?true:false;
        $inflows_activity = $inflows_activity=='true'?true:false;
        $books_activity = $books_activity=='true'?true:false;
        $book_types_activity = $book_types_activity=='true'?true:false;
        //recent_activity
        $activity_table_array = array();
        $activity_times_array = array();
        $activity_user_array = array();
        if($sales_activity){
            array_push($activity_table_array, "sales");
        }
        if($customers_activity){
            array_push($activity_table_array, "customers");
        }
        if($accounts_activity){
            array_push($activity_table_array, "accounts");
        }
        if($inflows_activity){
            array_push($activity_table_array, "inflows");
        }
        if($books_activity){
            array_push($activity_table_array, "books");
        }
        if($book_types_activity){
            array_push($activity_table_array, "book_types");
        }
        $activities = Syslog::where('event','create')
            ->whereIn('table', $activity_table_array)
            ->orderBy('created_at', 'desc')
            ->take(35)
            ->get();
        foreach ($activities as $activity){
            array_push($activity_times_array, $this->humanTiming(strtotime($activity->created_at->format('Y-m-d H:i:s'))));
            $user = User::find($activity->user_id);
            array_push($activity_user_array, $user==null?'':$user->name);
        }
        $view->with([
            'activities'=> $activities,
            'activity_times_array'=> $activity_times_array,
            'activity_user_array'=> $activity_user_array,


            'penalty_percentage' => $penalty_percentage,
            'days_before_penalty' => $days_before_penalty,
            'penalty_schedule' => $penalty_schedule,
            'days_in_year' => $days_in_year,

            'book_notification'=> $book_notification,
            'book_type_notification'=> $book_type_notification,
            'inflows_notification'=> $inflows_notification,

            'sales_activity'=> $sales_activity,
            'customers_activity'=> $customers_activity,
            'accounts_activity'=> $accounts_activity,
            'inflows_activity'=> $inflows_activity,
            'books_activity'=> $books_activity,
            'book_types_activity'=> $book_types_activity,
        ]);
    }
    function humanTiming($time){
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'año',
            2592000 => 'mes',
            604800 => 'semana',
            86400 => 'día',
            3600 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return 'Hace '.$numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
}