<?php
$tdate=$_GET['q'];
$today=date("Y-m-d");
if($tdate<=$today)
{
   $order=date("D",strtotime($tdate));
   if($order=="Sat")
   {
	    echo '
		<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
		<select name="order">
		<option>select order</option>
		<option>Mon</option>
		<option>Tue</option>
		<option>Wed</option>
		<option>Thu</option>
		<option>Fri</option>
		</select>
		</div></div>';
   }
   elseif($order=="Sun")
   {
	    echo '
		Invalid Date
		<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<input type="text" name="order" value="" readonly="readonly" placeholder="select date" required/>
		</div></div>';
   }
   else
   {
	    echo '
		<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
	            <input type="text" name="order" value="'.$order.'" readonly="readonly" required/>
		</div></div>';
   }
}
else
{
 echo '
		Invalid Date
		<div class="row uniform 50%">
				<div class="12u 12u(mobilep)">
				<input type="text" name="order" value="" readonly="readonly" placeholder="select date" required/>
		</div></div>';	
}
?>