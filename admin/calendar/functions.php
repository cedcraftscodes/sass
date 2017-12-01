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

			<form class="form-inline">
				<a class="btn btn-default" href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>

				<select name="month_dropdown" class="month_dropdown dropdown form-control form-inline"><?php echo getAllMonths($dateMonth); ?></select>
				<select name="year_dropdown" class="year_dropdown dropdown form-control form-inline"><?php echo getYearList($dateYear); ?></select>

				<a class="btn btn-default" href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>

			</form>
		</h2>



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
				$dateNow = date("Y-m-d");

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

                        // TODO ----> Disable adding in date prior to current date
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

						if($eventNum == 0){
							echo '<div class="popup_event">No Events!</div>';
						}else{
							echo '<div class="popup_event">Events ('.$eventNum.')</div>';
							echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents(\''.$currentDate.'\');">view events</a><br/>':'';
						}

						if(strtotime($currentDate) > strtotime($dateNow)){ 
							//For Add Event
							echo '<a href="javascript:;" onclick="addEvent(\''.$currentDate.'\');">add event</a>';
							echo '</div></div>';
						}


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
							$("#showEventsModal").modal("show");
						}
					});
				}
        //For Add Event
        function addEvent(date){
        	$('#eventDate').val(date);
        	$('#eventDateView').html(date);
        	$("#addEventModal").modal("show");
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
        				if(msg.trim() == 'ok'){
        					var dateSplit = date.split("-");
        					$('#eventTitle').val('');
        					alert('Event Created Successfully.');
        					getCalendar('calendar_div',dateSplit[0],dateSplit[1]);
        					$("#addEventModal").modal("hide");
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
	include '../config/config.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");



	$query = $conn->prepare('SELECT title, date FROM events WHERE date = :date AND status = 1');
	$query->execute(array(':date' => $date));



                      


	if($query->rowCount() > 0){
		$eventListHTML = "<div id='showEventsModal' class='modal fade' role='dialog'>
			                <div class='modal-dialog'>
			                  <div class='modal-content'>
			                    <div class='modal-header modal-header-info'>
			                      <button type='button' class='close' data-dismiss='modal'>&times;</button>
			                      <h4 class='modal-title'> Events on ".date("l, d M Y",strtotime($date))."</span></small></h4>
			                    </div>
			                    <div class='modal-body'>";
		$eventListHTML .= 			"<table class='table'>
				                      <thead>
				                        <tr>
				                          <th>Event Title</th>
				                          <th>Event Date</th>
				                          <th>Action</th>
				                        </tr>
				                      </thead>
				                      <tbody>";

                      
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$eventListHTML .= 			'<tr>
											<td>'.$row['title'].'</td>
											<td>'.$row['date'].'</td>
											<td>View</td>
										</tr>';
		}

		$eventListHTML .= 			"</tbody>
									</table>
									</div>
				                    <div class='modal-footer'>
				                      <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
				                    </div>
			                </div>
			              </div>
			            </div>";
	}
	echo $eventListHTML;
}

/*
 * Add event to date
 */
function addEvent($date,$title){
	include '../config/config.php';
	$currentDate = date("Y-m-d H:i:s");

	$stmt = $conn->prepare("INSERT INTO events (title,date,created,modified) VALUES (:title, :date,:current_date , :modified)");
	$stmt->bindParam(':title',$title);
	$stmt->bindParam(':date',$date);
	$stmt->bindParam(':current_date',$currentDate);
	$stmt->bindParam(':modified',$currentDate);
	$stmt->execute();
	echo 'ok';
}
?>