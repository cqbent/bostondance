<?php

    if( have_rows('workshop_dates') ):

        $upcomming_dates = array();

		$count = 0;

        while ( have_rows('workshop_dates') ) : the_row();

            if( isset( $fpd ) && $fpd == false ) { // do not filter past date for single event page. fpd = filter past date

                $upcomming_dates[$count]['date'] = get_sub_field( 'workshop_date' );
                $upcomming_dates[$count]['start_time'] = get_sub_field('workshop_start_time');
                $upcomming_dates[$count]['end_time'] = get_sub_field('workshop_end_time');

            } else {

                if( strtotime( get_sub_field('workshop_date') )  >= strtotime( date('Ymd') ) ) { // filter the past date for event listing page 
                                    
                    $upcomming_dates[$count]['date'] = get_sub_field( 'workshop_date' );
                    $upcomming_dates[$count]['start_time'] = get_sub_field('workshop_start_time');
                    $upcomming_dates[$count]['end_time'] = get_sub_field('workshop_end_time');
                    
                }
            }
            
            
        $count++;

        endwhile;

        array_multisort( $upcomming_dates, SORT_ASC ); // sort date in ascending order

        $total_date_count = count( $upcomming_dates );
        $date_count = 1;
        $str = '';
        foreach( $upcomming_dates as $date ) {

        	if( isset( $date_format ) == 3 ) { // 3 is just a number to specify the straight line date as in single event page


        		// $str .= '<span class="date">' . date( "l F j — ", strtotime( $date['date'] ) ) . '<span>' . $date['start_time'];
                $str .= '<span class="date">' . date( "F j — ", strtotime( $date['date'] ) ) . '<span>' . date( "g:i a", strtotime($date['start_time']));
	            if( $date['end_time'] ) {
	                $str .= ' - ' . date( "g:i a", strtotime($date['end_time']));
	            }

	            $str .= '</span></span>';

        	} else { // else date \n and start time and end time as in home page and event landing page

                $str .= '<span class="date ' . $date_count . '">' . date( 'F j, Y', strtotime( $date['date'] ) ) . '<br>' . date( "g:i a", strtotime($date['start_time']));
        		if( $date['end_time'] ) {
        			$str .= ' - ' . date( "g:i a", strtotime($date['end_time']));
        		}
        		$str .= '</span>';

                
                if( $date_count === 3 )  { // if date count > 3 then link to the singl event page and break the date loop

                    $str .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">See Full Schedule</a>';
                    break; 

                }
        	}
            
            if( isset( $date_break ) ) // break is done to show only one upcomming event date for home page        			
        		break;
        	
            $date_count++;	
            
        }

        echo $str;

    else :

        echo 'No date added. Please add date in the workshop.';

    endif;

?>