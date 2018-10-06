<?php
    class HijriDate {
        private $timestamp;
        private $morning;
        private $engHour;
        private $engDate;
        private $engMonth;
        private $engYear;

        private $hijriDate;
        private $hijriMonth;
        private $hijriYear;
        private $hj_months = array("রমজান", "শাওয়াল", "জ্বিলকদ", "জ্বিলহজ্জ", "মুহররম", "সফর", "রবিউল আউয়াল", "রবিউস সানি", "জমাদিউল আউয়াল", "জমাদিউস সানি", "রজব", "শা'বান");
        private $hj_month_dates = array(29, 30, 29, 29, 30, 30, 30, 29, 30, 29, 30, 29);
        private $hj_month_middate = array(13, 12, 14, 13, 14, 14, 15, 15, 15, 15, 14, 14); 


        private $lipyearindex = 3;

        function __construct( $timestamp, $hour = 6 ) {
            $this->HijriDate( $timestamp, $hour );
        }
        
        function HijriDate( $timestamp, $hour = 6 ) {
            $this->engDate = date( 'd', $timestamp );
            $this->engMonth = date( 'm', $timestamp );
            $this->engYear = date( 'Y', $timestamp );
            $this->morning = $hour;
            $this->engHour = date( 'G', $timestamp );
            //calculate the bangla date
            $this->calculate_date();
            //now call calculate_year for setting the bangla year
            $this->calculate_year();
            //convert english numbers to Bangla
            $this->convert();
        }
        

        function set_time( $timestamp, $hour = 6 ) {
            $this->HijriDate( $timestamp, $hour );
        }

        private function calculate_date() { 
            $this->hijriDate = $this->engDate - $this->hj_month_middate[$this->engMonth - 1];


            if ($this->engHour < $this->morning) {
                 $this->hijriDate -= 1;
            }             
            
            if (($this->engDate <= $this->hj_month_middate[$this->engMonth - 1]) || ($this->engDate == $this->hj_month_middate[$this->engMonth - 1] + 1 && $this->engHour < $this->morning ) ) {

                $this->hijriDate += $this->hj_month_dates[$this->engMonth - 1];

                if ($this->is_leapyear() && $this->lipyearindex == $this->engMonth) 
                $this->hijriDate += 1;
                $this->hijriMonth = $this->hj_months[$this->engMonth - 1];
            }
            else{
                $this->hijriMonth = $this->hj_months[($this->engMonth)%12]; 
            }
        }

        function is_leapyear() {
            if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
                return true;
            else
                return false;
        }

        function calculate_year() {
            $this->hijriYear = $this->engYear - 578;
            
            if (($this->engMonth < 4) || (($this->engMonth == 4) && (($this->engDate < 14) || ($this->engDate == 14 && $this->engHour < $this->morning)))){
                $this->hijriYear -= 1;

            }
        }

        function hijri_number( $int ) {
            $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
            $hijriNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
            $converted = str_replace( $engNumber, $hijriNumber, $int );
            return $converted;
        }

        function convert() {
            $this->hijriDate = $this->hijri_number( $this->hijriDate );
            $this->hijriYear = $this->hijri_number( $this->hijriYear );
        }

        function get_date() {
            return array($this->hijriDate, $this->hijriMonth, $this->hijriYear);
        }
    }

    function HJdate($time)
    {
        $hj = new HijriDate($time);
        $output = $hj->get_date();
        $ReadyDate = "$output[0] $output[1] $output[2]";
        return $ReadyDate;
    }

?>