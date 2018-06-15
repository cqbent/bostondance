<?php

    if( have_rows('audition_dates') ):

        $upcomming_dates = array();

		$count = 0;

        while ( have_rows('audition_dates') ) : the_row();

                if( strtotime( get_sub_field('audition_date') )  >= strtotime( date('Ymd') ) ) { // filter the past date for audition listing page 

                    $upcomming_dates[$count]['date'] = get_sub_field( 'audition_date' );
                    $upcomming_dates[$count]['start_time'] = get_sub_field('audition_start_time');
                    $upcomming_dates[$count]['end_time'] = get_sub_field('audition_end_time');
                    
                }                       
            
        $count++;

        endwhile;

        array_multisort( $upcomming_dates, SORT_ASC ); // sort date in ascending order
    
        $total_date_count = count( $upcomming_dates );
        $date_count = 1;
        $str = '';
        foreach( $upcomming_dates as $date ) {

        		$str .= '<span>' . date( "F j, Y, ", strtotime( $date['date'] ) ) . ' ' . date( "g:i a", strtotime($date['start_time']));
	            if( $date['end_time'] ) {
	                $str .= ' - ' . date( "g:i a", strtotime($date['end_time']));
	            }

	            $str .= '</span><br />';

        	}      
                   
        

        echo $str;

    endif;

?>