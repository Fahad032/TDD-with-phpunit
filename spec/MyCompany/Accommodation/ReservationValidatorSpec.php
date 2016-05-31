<?php

namespace spec\MyCompany\Accommodation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReservationValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MyCompany\Accommodation\ReservationValidator');
    }
	
	
	function its_start_date_must_come_before_the_end_date($start_date,$end_date,$room)
			{
				$rooms = [$room];
				$start_date = '2015-06-03';
				$end_date = '2015-06-03';
				$this->shouldThrow('\InvalidArgumentException')
				->duringValidate( $start_date, $end_date, $rooms);
			}
}
