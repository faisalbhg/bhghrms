<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>BHG HRM::Dashboard</title>
	
	<?=view('common/favicon');?>
	<link href="<?=base_url('assets/vendor/jquery-nice-select/css/nice-select.css');?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/calender-crm.css?v=0.3');?>">

	<?=view('common/styles');?>
	
</head>
<body>

    <?=view('common/preload');?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?=view('common/navheader');?>
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
							
                        </div>
                        <?=view('common/navheaderright');?>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <?=view('common/sidebar');?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 mt-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="row shapreter-row">
											<div class="col-xl-3 col-lg-2 col-sm-4 col-6" style="display: none;">
												<div class="static-icon">
													<span>
														<i class="fas fa-suitcase text-success"></i>
													</span>
													<h3 class="count"><?=$totalpostedjobs;?></h3>
                          <?php
                          if(session()->get('userType')==1 || session()->get('userType')==2 || session()->get('userType')==3 || session()->get('userType')==5 || session()->get('userType')==6)
                          {
                            ?>
                            <a href="<?=base_url('jobs-list');?>"><span class="fs-14">Total Active Vacancies </span></a>
                            <?php
                          }
                          else
                          {
                            ?>
                            <span class="fs-14">Total Active Vacancies </span>
                            <?php
                          }
                          ?>
												</div>
											</div>

											<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
												<div class="static-icon">
													<span>
														<i class="fas fa-suitcase text-warning"></i>
													</span>
													<h3 class="count"><?=$totalpendingjobapprovals;?></h3>
                          <?php
                          if(session()->get('userType')==1 || session()->get('userType')==3)
                          {
                            ?>
                            <a href="<?=base_url('aproval-jobs');?>"><span class="fs-14">Pending Vacancies Approval </span></a>
                            <?php
                          }
                          else
                          {
                            ?>
                            <span class="fs-14">Pending Vacancies Approval </span>
                            <?php
                          }
                          ?>
												</div>
											</div>
											
											<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
												<div class="static-icon">
													<span>
														<i class="fas fa-suitcase text-info"></i>
													</span>
													<h3 class="count"><?=$jobProposalApprovals;?></h3>
                          <?php
                          if(session()->get('userType')==1 || session()->get('userType')==3)
                          {
                            ?>
                            <a href="<?=base_url('aproval-jobproposal');?>"><span class="fs-14">Pending Proposal</span></a>
                            <?php
                          }
                          else
                          {
                            ?>
                            <span class="fs-14">Pending Proposal</span>
                            <?php
                          }
                          ?>
													
												</div>
											</div>
											<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
                        <div class="static-icon">
                          <span>
                            <i class="fa fa-download"></i>
                          </span>
                          <h3 class="count"><?=$applications;?></h3>
                          <span class="fs-14">Application Received</span>
                        </div>
                      </div>
											<!-- <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
												<div class="static-icon">
													<span>
														<i class="fas fa-eye"></i>
													</span>
													<h3 class="count">687</h3>
													<span class="fs-14">Website Visitors</span>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 mt-sm-0 pt-2">
								<div class="col-12">
									<div class="widget-calendar h-100">
										<!-- Card body -->
										<div class="border-radius-lg" id="calendar"></div>
										<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>	
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <?=view('common/footer');?>

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url('assets/vendor/global/global.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/chart.js/Chart.bundle.min.js');?>"></script>
	<script src="<?=base_url('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js');?>"></script>
	
	<!-- Apex Chart -->
	<script src="<?=base_url('assets/vendor/apexchart/apexchart.js');?>"></script>
	
	<script src="<?=base_url('assets/vendor/chart.js/Chart.bundle.min.js');?>"></script>
	
	<!-- Chart piety plugin files -->
    <script src="<?=base_url('assets/vendor/peity/jquery.peity.min.js');?>"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?=base_url('assets/js/dashboard/statistics-page.js');?>"></script>
	
	
	
    <script src="<?=base_url('assets/js/custom.min.js');?>"></script>
	<script src="<?=base_url('assets/js/dlabnav-init.js');?>"></script>
	
    
	<script>
		$(document).ready(function() {

		  var counters = $(".count");
		  var countersQuantity = counters.length;
		  var counter = [];

		  for (i = 0; i < countersQuantity; i++) {
			counter[i] = parseInt(counters[i].innerHTML);
		  }

		  var count = function(start, value, id) {
			var localStart = start;
			setInterval(function() {
			  if (localStart < value) {
				localStart++;
				counters[id].innerHTML = localStart;
			  }
			}, 40);
		  }

		  for (j = 0; j < countersQuantity; j++) {
			count(0, counter[j], j);
		  }
		});	
	</script>

	<script type="text/javascript">
    !function () {
      var today = moment();

      function Calendar(selector, events) {
        this.el = document.querySelector(selector);
        this.events = events;
        this.current = moment().date(1);
        this.draw();
        var current = document.querySelector('.today');
        if (current) {
          var self = this;
          window.setTimeout(function () {
            self.openDay(current);
          }, 500);
        }
      }

      Calendar.prototype.draw = function () {
        //Create Header
        this.drawHeader();

        //Draw Month
        this.drawMonth();

        //
        //this.drawLegend();
      }

      Calendar.prototype.drawHeader = function () {
        var self = this;
        if (!this.header) {
          //Create the header elements
          this.header = createElement('div', 'header');
          this.header.className = 'header';

          this.title = createElement('h1');
          this.title.addEventListener('click', function () {
             self.curMonth();
          });

          var right = createElement('div', 'right');
          right.addEventListener('click', function () {
            self.nextMonth();
          });

          var left = createElement('div', 'left');
          left.addEventListener('click', function () {
            self.prevMonth();
          });

          //Append the Elements
          this.header.appendChild(this.title);
          this.header.appendChild(right);
          this.header.appendChild(left);
          this.el.appendChild(this.header);
        }

        this.title.innerHTML = this.current.format('MMMM YYYY');
      }

      Calendar.prototype.drawMonth = function () {
        var self = this;

        this.events.forEach(function (ev) {
        //  ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
          ev.date = moment(ev.eventTime, "YYYY-MM-DD");
        });


        if (this.month) {
          this.oldMonth = this.month;
          this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
          this.oldMonth.addEventListener('animationend', function () {
            self.oldMonth.parentNode.removeChild(self.oldMonth);
            self.month = createElement('div', 'month');
            self.backFill();
            self.currentMonth();
            self.fowardFill();
            self.el.appendChild(self.month);
            window.setTimeout(function () {
              self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
            }, 16);
          });
        } else {
          this.month = createElement('div', 'month');
          this.el.appendChild(this.month);
          this.backFill();
          this.currentMonth();
          this.fowardFill();
          this.month.className = 'month new';
        }
      }

      Calendar.prototype.backFill = function () {
        var clone = this.current.clone();
        var dayOfWeek = clone.day() - 1;

        if (dayOfWeek == -1)
          dayOfWeek = 6;

        if (!dayOfWeek) {
          return;
        }

        clone.subtract('days', dayOfWeek + 1);

        for (var i = dayOfWeek; i > 0; i--) {
          this.drawDay(clone.add('days', 1));
        }
      }

      Calendar.prototype.fowardFill = function () {
        var clone = this.current.clone().add('months', 1).subtract('days', 1);
        var dayOfWeek = clone.day();

        if (dayOfWeek === 7) {
          return;
        }

        for (var i = dayOfWeek; i < 7; i++) {
          this.drawDay(clone.add('days', 1));
        }
      }

      Calendar.prototype.currentMonth = function () {
        var clone = this.current.clone();

        while (clone.month() === this.current.month()) {
          this.drawDay(clone);
          clone.add('days', 1);
        }
      }

      Calendar.prototype.getWeek = function (day) {
        if (!this.week || day.day() === 1) {
          this.week = createElement('div', 'week');
          this.month.appendChild(this.week);
        }
      }

      Calendar.prototype.drawDay = function (day) {
        var self = this;
        this.getWeek(day);

        //Outer Day
        var clickState = 0;
        var outer = createElement('div', this.getDayClass(day));
        outer.addEventListener('click', function () {
          if ( this.classList.contains('active') ) {
             self.closeDay(this);
          } 
          else {
             self.openDay(this);
          }
        
        });

        //Day Name
        var name = createElement('div', 'day-name', day.format('ddd'));

        //Day Number
        var number = createElement('div', 'day-number', day.format('DD'));


        //Events
        var events = createElement('div', 'day-events');
        this.drawEvents(day, events);

        outer.appendChild(name);
        outer.appendChild(number);
        outer.appendChild(events);
        this.week.appendChild(outer);
      }

      Calendar.prototype.drawEvents = function (day, element) {
        if (day.month() === this.current.month()) {
          var todaysEvents = this.events.reduce(function (memo, ev) {
            if (ev.date.isSame(day, 'day')) {
              memo.push(ev);
            }
            return memo;
          }, []);

          todaysEvents.forEach(function (ev) {
            var evSpan = createElement('span', ev.color);
            element.appendChild(evSpan);
          });
        }
      }

      Calendar.prototype.getDayClass = function (day) {
        classes = ['day'];
        if (day.month() !== this.current.month()) {
          classes.push('other');
        } else if (today.isSame(day, 'day')) {
          classes.push('today');
        }
        return classes.join(' ');
      }

      Calendar.prototype.closeDay = function (el) {
        // var details, arrow;
        // var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
        // var day = this.current.clone().date(dayNumber);
        var daysActive = document.querySelectorAll(".day.active");
        [].forEach.call(daysActive, function(i) {
          i.classList.remove("active");
        });
        var currentOpened = document.querySelector('.details');
    
        if (currentOpened) {
          currentOpened.addEventListener('webkitAnimationEnd', function () {
            currentOpened.parentNode.removeChild(currentOpened);
          });
          currentOpened.addEventListener('oanimationend', function () {
            currentOpened.parentNode.removeChild(currentOpened);
          });
          currentOpened.addEventListener('msAnimationEnd', function () {
            currentOpened.parentNode.removeChild(currentOpened);
          });
          currentOpened.addEventListener('animationend', function () {
            currentOpened.parentNode.removeChild(currentOpened);
          });
          currentOpened.className = 'details out';
        }
      }

      Calendar.prototype.openDay = function (el) {
        var details, arrow;
        var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
        var day = this.current.clone().date(dayNumber);

        var daysActive = document.querySelectorAll(".day.active");

        [].forEach.call(daysActive, function(i) {
          i.classList.remove("active");
        });
        el.classList.add('active');

        var currentOpened = document.querySelector('.details');
    
        //Check to see if there is an open detais box on the current row
        if (currentOpened && currentOpened.parentNode === el.parentNode) {
          details = currentOpened;
          arrow = document.querySelector('.arrow');
        
        } else {
          //Close the open events on differnt week row
          //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
         //  el.classList.remove('active');
          if (currentOpened) {
            currentOpened.addEventListener('webkitAnimationEnd', function () {
              currentOpened.parentNode.removeChild(currentOpened);
            });
            currentOpened.addEventListener('oanimationend', function () {
              currentOpened.parentNode.removeChild(currentOpened);
            });
            currentOpened.addEventListener('msAnimationEnd', function () {
              currentOpened.parentNode.removeChild(currentOpened);
            });
            currentOpened.addEventListener('animationend', function () {
              currentOpened.parentNode.removeChild(currentOpened);
            });
            currentOpened.className = 'details out';
           
          }

          //Create the Details Container
          details = createElement('div', 'details in');

          //Create the arrow
          var arrow = createElement('div', 'arrow');

          //Create the event wrapper

          details.appendChild(arrow);
          el.parentNode.appendChild(details);
        }

        var todaysEvents = this.events.reduce(function (memo, ev) {
          if (ev.date.isSame(day, 'day')) {
            memo.push(ev);
          }
          return memo;
        }, []);

        this.renderEvents(todaysEvents, details);

        arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + 'px';
      }

      Calendar.prototype.renderEvents = function (events, ele) {
        //Remove any events in the current details element
        var currentWrapper = ele.querySelector('.events');
        var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));

        events.forEach(function (ev) {
          var div = createElement('div', 'event');
          var square = createElement('div', 'event-category ' + ev.color);
          var span = createElement('span', '', ev.eventName);
          var alink = createElement('a', '', ev.eventUrl);

          div.appendChild(square);
          div.appendChild(span);
          div.appendChild(alink);
          wrapper.appendChild(div);
        });

        if (!events.length) {
          var div = createElement('div', 'event empty');
          var span = createElement('span', '', 'No Events');
          var alink = createElement('a', '', 'No Link');

          div.appendChild(span);
          span.appendChild(alink);
          wrapper.appendChild(div);
        }

        if (currentWrapper) {
          currentWrapper.className = 'events out';
          currentWrapper.addEventListener('webkitAnimationEnd', function () {
            currentWrapper.parentNode.removeChild(currentWrapper);
            ele.appendChild(wrapper);
          });
          currentWrapper.addEventListener('oanimationend', function () {
            currentWrapper.parentNode.removeChild(currentWrapper);
            ele.appendChild(wrapper);
          });
          currentWrapper.addEventListener('msAnimationEnd', function () {
            currentWrapper.parentNode.removeChild(currentWrapper);
            ele.appendChild(wrapper);
          });
          currentWrapper.addEventListener('animationend', function () {
            currentWrapper.parentNode.removeChild(currentWrapper);
            ele.appendChild(wrapper);
          });
        } else {
          ele.appendChild(wrapper);
        }
      }

      Calendar.prototype.drawLegend = function () {
        var legend = createElement('div', 'legend');
        var calendars = this.events.map(function (e) {
          return e.calendar + '|' + e.color;
        }).reduce(function (memo, e) {
          if (memo.indexOf(e) === -1) {
            memo.push(e);
          }
          return memo;
        }, []).forEach(function (e) {
          var parts = e.split('|');
          var entry = createElement('span', 'entry ' + parts[1], parts[0]);
          legend.appendChild(entry);
        });
        this.el.appendChild(legend);
      }

      Calendar.prototype.nextMonth = function () {
        this.current.add('months', 1);
        this.next = true;
        this.draw();
      }

      Calendar.prototype.prevMonth = function () {
        this.current.subtract('months', 1);
        this.next = false;
        this.draw();
      }
      
      Calendar.prototype.curMonth = function () {
        this.current = moment().date(1);
        this.draw();
      }

      window.Calendar = Calendar;

      function createElement(tagName, className, innerText) {
        var ele = document.createElement(tagName);
        if (className) {
          ele.className = className;
        }
        if(tagName == 'a')
        {
          if (innerText!='No Link') {
            ele.innderText = ele.textContent = ' Open';
            ele.href = innerText;
          }
          else
          {
            ele.innderText = ele.textContent = '';
          }

        }
        else
        {
          if (innerText) {
            ele.innderText = ele.textContent = innerText;
          }
        }
        return ele;
      }
    }();

    !function () {
      var data = [


        <?php
        if($schedlDatas)
        {
          foreach($schedlDatas as $schedlData)
          {
            ?>
            {
              eventName: 'Interview with <?=$schedlData['applicantName'];?> for the position of <?=$schedlData['jobTitle'];?> On <?=date("dS M Y H:i A",strtotime($schedlData['interviewDate'])); ?>, Interviewer: <?=$schedlData['interviewWith'];?>', calendar: 'Interview Schedule', color: 'red', eventTime: moment("<?=date("Y-m-d",strtotime($schedlData['interviewDate']));?>"),eventUrl: '<?=base_url('application-details/'.$schedlData['jobApplicationId']);?>'},
            <?php
          }
          
        }
        else
        {
          ?>
          {eventName: 'Lunch Meeting w/ Mark', calendar: 'Work', color: 'white', eventTime: moment("2021-08-16")},
          {eventName: 'Interview - Jr. Web Developer', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-16")},
          {eventName: 'Demo New App to the Board', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-1")},
          {eventName: 'Dinner w/ Marketing', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-30")}
        <?php
        }
        ?>/*
        
        {eventName: 'Lunch Meeting w/ Mark', calendar: 'Work', color: 'white', eventTime: moment("2021-08-16")},
        {eventName: 'Interview - Jr. Web Developer', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-16")},
        {eventName: 'Demo New App to the Board', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-1")},
        {eventName: 'Dinner w/ Marketing', calendar: 'Work', color: 'orange', eventTime: moment("2021-08-30")},

        {eventName: 'Game vs Portalnd', calendar: 'Sports', color: 'blue', eventTime: moment("2021-08-16")},
        {eventName: 'Game vs Houston', calendar: 'Sports', color: 'blue', eventTime: moment("2021-08-5")},
        {eventName: 'Game vs Denver', calendar: 'Sports', color: 'blue', eventTime: moment("2021-08-8")},
        {eventName: 'Game vs San Degio', calendar: 'Sports', color: 'blue', eventTime: moment("2021-08-10")},

        {eventName: 'School Play', calendar: 'Kids', color: 'yellow', eventTime: moment("2021-08-16")},
        {eventName: 'Parent/Teacher Conference', calendar: 'Kids', color: 'yellow', eventTime: moment("2021-08-13")},
        {eventName: 'Pick up from Soccer Practice', calendar: 'Kids', color: 'yellow', eventTime: moment("2021-08-26")},
        {eventName: 'Ice Cream Night', calendar: 'Kids', color: 'yellow', eventTime: moment("2021-08-22")},

        {eventName: 'Free Tamale Night', calendar: 'Other', color: 'green', eventTime: moment("2021-058-16")},
        {eventName: 'Bowling Team', calendar: 'Other', color: 'green', eventTime: moment("2021-08-27")},
        {eventName: 'Teach Kids to Code', calendar: 'Other', color: 'green', eventTime: moment("2021-08-19")},
        {eventName: 'Startup Weekend', calendar: 'Other', color: 'green', eventTime: moment("2021-08-31")}*/
      ];



      function addDate(ev) {

      }

      var calendar = new Calendar('#calendar', data);

    }();                  

  </script>

</body>
</html>