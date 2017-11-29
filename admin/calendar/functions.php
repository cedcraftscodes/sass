<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
		getCalender($_POST['year'],$_POST['month']);
		break;
		case 'getEvents':
		getEvents($_POST['date']);
		break;
        //For Add Event
		case 'addEvent':
		addEvent($_POST['date'],$_POST['title']);
		break;
		default:
		break;
	}
}

/*
 * Get calendar full HTML
 */
function getCalender($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
	?>
	<div id="calender_section">
		<h2>
			<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
			<select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
			<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
		</h2>
		<div id="event_list" class="none"></div>
		<!--For Add Event-->


		<div id="event_add" class="none">

			<div class="x_panel">
				<div class="x_title">
					<h2>Add Event On <small><span id="eventDateView"></span></small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left input_mask">

						<h4>Event Information</h4>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Event Title</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="eventTitle"  placeholder="Input event title">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Summary</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<textarea class="form-control" rows="5" placeholder="Tell us about the event."></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Time Start</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="time" class="form-control" id="inputSuccess3">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Time End</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="inputSuccess3" >
								<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>

						<h4>Organization Information</h4>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Organization Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Receiver Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter Receiver Name">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>



						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Street</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter Receiver Name">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" id="inputSuccess3" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter City" name="city" required="">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Province</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter  Province" name="province" required="">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">ZipCode</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter  Zip Code" name="zipcode"  title="Enter a valid zip code" pattern="[0-9]{4}"  required="">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control" title="Enter a valid phone number" pattern="[0-9]{11}" placeholder="Enter  Contact Number" name="contactnumber" required="">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
							<div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
								<input type="email" class="form-control" title="Enter a valid phone number" pattern="[0-9]{11}" placeholder="Enter Email Address" name="contactnumber" required="">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
								<input type="hidden" id="eventDate" value=""/>
								<button type="button" class="btn btn-primary">Cancel</button>
								<button class="btn btn-primary" type="reset">Reset</button>
								<button type="button" id="addEventBtn" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		
		<div id="calender_section_top">
			<ul>
				<li>Sun</li>
				<li>Mon</li>
				<li>Tue</li>
				<li>Wed</li>
				<li>Thu</li>
				<li>Fri</li>
				<li>Sat</li>
			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
				<?php 
				$dayCount = 1; 
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                        //Current date
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
                        //Include db configuration file
						include 'dbConfig.php';
                        //Get number of events based on the current date
						$result = $db->query("SELECT title FROM events WHERE date = '".$currentDate."' AND status = 1");
						$eventNum = $result->num_rows;
                        //Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
                        //Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';

                        //Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
						echo '<div class="date_window">';
						echo '<div class="popup_event">Events ('.$eventNum.')</div>';
						echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents(\''.$currentDate.'\');">view events</a><br/>':'';
                        //For Add Event
						echo '<a href="javascript:;" onclick="addEvent(\''.$currentDate.'\');">add event</a>';
						echo '</div></div>';

						echo '</li>';
						$dayCount++;
						?>
						<?php }else{ ?>
						<li><span>&nbsp;</span></li>
						<?php } } ?>
					</ul>
				</div>
			</div>

			<script type="text/javascript">
				function getCalendar(target_div,year,month){
					$.ajax({
						type:'POST',
						url:'calendar/functions.php',
						data:'func=getCalender&year='+year+'&month='+month,
						success:function(html){
							$('#'+target_div).html(html);
						}
					});
				}

				function getEvents(date){
					$.ajax({
						type:'POST',
						url:'calendar/functions.php',
						data:'func=getEvents&date='+date,
						success:function(html){
							$('#event_list').html(html);
							$('#event_add').slideUp('slow');
							$('#event_list').slideDown('slow');
						}
					});
				}
        //For Add Event
        function addEvent(date){
        	$('#eventDate').val(date);
        	$('#eventDateView').html(date);
        	$('#event_list').slideUp('slow');
        	$('#event_add').slideDown('slow');
        }
        //For Add Event
        $(document).ready(function(){
        	$('#addEventBtn').on('click',function(){
        		var date = $('#eventDate').val();
        		var title = $('#eventTitle').val();
        		$.ajax({
        			type:'POST',
        			url:'calendar/functions.php',
        			data:'func=addEvent&date='+date+'&title='+title,
        			success:function(msg){
        				if(msg == 'ok'){
        					var dateSplit = date.split("-");
        					$('#eventTitle').val('');
        					alert('Event Created Successfully.');
        					getCalendar('calendar_div',dateSplit[0],dateSplit[1]);
        				}else{
        					alert('Some problem occurred, please try again.');
        				}
        			}
        		});
        	});
        });
        
        $(document).ready(function(){
        	$('.date_cell').mouseenter(function(){
        		date = $(this).attr('date');
        		$(".date_popup_wrap").fadeOut();
        		$("#date_popup_"+date).fadeIn();    
        	});
        	$('.date_cell').mouseleave(function(){
        		$(".date_popup_wrap").fadeOut();        
        	});
        	$('.month_dropdown').on('change',function(){
        		getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
        	});
        	$('.year_dropdown').on('change',function(){
        		getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
        	});
        	$(document).click(function(){
        		$('#event_list').slideUp('slow');
        	});
        });
    </script>
    <?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 01)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/*
 * Get events by date
 */
function getEvents($date = ''){
    //Include db configuration file
	include 'dbConfig.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
    //Get events based on the current date
	$result = $db->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
			$eventListHTML .= '<li>'.$row['title'].'</li>';
		}
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
}

/*
 * Add event to date
 */
function addEvent($date,$title){
    //Include db configuration file
	include 'dbConfig.php';
	$currentDate = date("Y-m-d H:i:s");
    //Insert the event data into database
	$insert = $db->query("INSERT INTO events (title,date,created,modified) VALUES ('".$title."','".$date."','".$currentDate."','".$currentDate."')");
	if($insert){
		echo 'ok';
	}else{
		echo 'err';
	}
}
?>