<div class="container events tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab">
  <div class="row">
    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
      <?php if( get_field('events_enabled') ){ ?>
        <h2 class="events-title other-type"><?php the_field('events_title'); ?></h2>
        <p><?php the_field('events_main_text'); ?></p>
      <?php } ?>
    </div>

    <div class="yellow-disc col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
      <?php if(!empty($main_events)){ ?>
      <h3>Main Events</h3>
      <ul>
        <?php foreach($main_events as $main_event){ ?>
          <li><?= $main_event; ?></li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>
  </div>

  <div class="col-12 px-0">
    <select name="menu" class="message-subject" style="display: none;">
      <option value="Event">Events</option>
    </select>
    <div class="dropdown pb-3" tabindex="1">
      <div class="select d-flex justify-content-between align-items-center">
        <span class="message check">All Events</span> <span class="icon icon-bracket-accordion"></span>
      </div>
      <input type="hidden" name="gender">
      <ul class="dropdown-menu" style="display: none;">
        <!-- auto add li -->
      </ul>
    </div>
  </div>


  <div class="row">
    <div class="col-xl-12 col-lg-12 pl-0 pl-lg-3">
      <div class="calendarBig-wrap">
        <table id="calendarBig">
          <thead>
          <tr><td><td><td>
          <tbody class="month-wrap">
          <tr class="month-line">
            <td>
              <table data-m="0">
                <thead>
                <tr><td colspan="7">January
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="1">
                <thead>
                <tr><td colspan="7">February
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="2">
                <thead>
                <tr><td colspan="7">March
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
          <tr class="month-line">
            <td>
              <table data-m="3">
                <thead>
                <tr><td colspan="7">April
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="4">
                <thead>
                <tr><td colspan="7">May
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="5">
                <thead>
                <tr><td colspan="7">June
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
          <tr class="month-line">
            <td>
              <table data-m="6">
                <thead>
                <tr><td colspan="7">July
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="7">
                <thead>
                <tr><td colspan="7">August
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="8">
                <thead>
                <tr><td colspan="7">September
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
          <tr class="month-line">
            <td>
              <table data-m="9">
                <thead>
                <tr><td colspan="7">October
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="10">
                <thead>
                <tr><td colspan="7">November
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
            <td>
              <table data-m="11">
                <thead>
                <tr><td colspan="7">December
                <tr class="names-days"><td>Mo<td>Tu<td>We<td>Th<td>Fr<td>Sa<td>Su
                <tbody>
              </table>
        </table>
      </div>

      <!-- this toggle events in calendar -->
      <div id="calendarTable">
        <?php if(!empty($all_events)){ ?>
          <?php foreach($all_events as $key => $event){ ?>
            <div data-id='<?= $key; ?>' data-dd="<?= ltrim($event['date_day'], '0'); ?>" data-mm="<?= $event['date_month']; ?>" data-text="<?= $event['title']; ?>"></div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- /.row -->

    <!-- Modal 1 -->
    <?php if(!empty($all_events)){ ?>
        <?php foreach($all_events as $key => $event){ ?>
            <div class="modal fade eventModal" id="eventModal_<?= $key; ?>" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="<?= $event['image']; ?>" alt="">
                            <div class="modal-footer flex-column justify-content-center">
                                <h4 class="d-block"><?= $event['title']; ?></h4>
                                <span><?= $event['date']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <!-- Modal 2 -->
    <?php if(!empty($all_events)){ ?>
        <div class="modal fade eventModal eventModal__list" id="eventModalList" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-events__list js-modal-events"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
  <script>

          function calendarBig(year) {
              for (var m = 0; m <= 11; m++) {
                  var D = new Date(year, [m], 1),
                      Dlast = new Date(D.getFullYear(), D.getMonth() + 1, 0).getDate(),
                      DNlast = new Date(D.getFullYear(), D.getMonth(), Dlast).getDay(),
                      DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay(),
                      calendar = '<tr>';

                  if (DNfirst != 0) {
                      for (var i = 1; i < DNfirst; i++) calendar += '<td>';
                  } else {
                      for (var i = 0; i < 6; i++) calendar += '<td>';
                  }

                  for (var i = 1; i <= Dlast; i++) {
                      if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
                          calendar += '<td class="today">' + i;
                      } else {
                          if (
                              (i == 1 && D.getMonth() == 0 && ((D.getFullYear() > 1897 && D.getFullYear() < 1930) || D.getFullYear() > 1947)) ||
                              (i == 2 && D.getMonth() == 0 && D.getFullYear() > 1992) ||
                              ((i == 3 || i == 4 || i == 5 || i == 6 || i == 8) && D.getMonth() == 0 && D.getFullYear() > 2004) ||
                              (i == 7 && D.getMonth() == 0 && D.getFullYear() > 1990) ||
                              (i == 23 && D.getMonth() == 1 && D.getFullYear() > 2001) ||
                              (i == 8 && D.getMonth() == 2 && D.getFullYear() > 1965) ||
                              (i == 1 && D.getMonth() == 4 && D.getFullYear() > 1917) ||
                              (i == 9 && D.getMonth() == 4 && D.getFullYear() > 1964) ||
                              (i == 12 && D.getMonth() == 5 && D.getFullYear() > 1990) ||
                              (i == 7 && D.getMonth() == 10 && (D.getFullYear() > 1926 && D.getFullYear() < 2005)) ||
                              (i == 8 && D.getMonth() == 10 && (D.getFullYear() > 1926 && D.getFullYear() < 1992)) ||
                              (i == 4 && D.getMonth() == 10 && D.getFullYear() > 2004)
                          ) {
                              // calendar += '<td class="holiday">' + i;
                              calendar += '<td>' + i;
                          } else {
                              calendar += '<td>' + i;
                          }
                      }
                      if (new Date(D.getFullYear(), D.getMonth(), i).getDay() == 0) {
                          calendar += '<tr>';
                      }
                  }

                  if (DNlast != 0) {
                      for (var i = DNlast; i < 7; i++) calendar += '<td>';
                  }

                  document.querySelector('#calendarBig table[data-m="' + [m] + '"] tbody').innerHTML = calendar;
                  // title text " Events 2021..+/- "
                  if (document.querySelector('.events-title')) {
                      document.querySelector('.events-title').innerHTML = 'Events ' + year;
                  }
                  // document.querySelector('#calendarBig > thead td:nth-child(2)').innerHTML = 'Calendar for ' + year + ' year';
                  // document.querySelector('#calendarBig > thead td:nth-child(1)').innerHTML = 'Calendar for ' + parseFloat(parseFloat(year)-1) + ' year';
                  // document.querySelector('#calendarBig > thead td:nth-child(3)').innerHTML = 'Calendar for ' + parseFloat(parseFloat(year)+1) + ' year';

                  // paragraph creates messages


              }
          }

          calendarBig(new Date().getFullYear());
          document.querySelector('#calendarBig > thead td:nth-child(1)').onclick = calendarBigG;
          document.querySelector('#calendarBig > thead td:nth-child(3)').onclick = calendarBigG;

          function calendarBigG() {
              calendarBig(this.innerHTML.replace(/[^\d]/gi, ''));
          }



              for (var k = 1; k <= document.querySelectorAll('#calendarTable div').length; k++) {

                  var my = document.querySelector('#calendarTable div:nth-child(' + [k] + ')');
                  var myD = document.querySelectorAll('#calendarBig table td');
                  var newSpan = document.createElement("span");

                  for (var i = 0; i < myD.length; i++) {
                      // console.log('myD[i]2', i);
                      // console.log('myD.length', myD.length);

                      if (my.dataset.yyyy) {
                          if (myD[i].innerText == my.dataset.dd && myD[i].parentNode.parentNode.parentNode.dataset.m == (my.dataset.mm - 1) && year == my.dataset.yyyy) {
                              myD[i].title = myD[i].title.concat( my.dataset.text);
                              // myD[i].appendChild(newSpan).title = my.dataset.text;
                              if (my.dataset.link) {
                                  myD[i].innerHTML = '<a href="' + my.dataset.link + '" target="_blank">' + myD[i].innerHTML + '</a>';
                              }
                          }
                      } else {

                          if ((myD[i].innerText == my.dataset.dd) && (myD[i].parentNode.parentNode.parentNode.dataset.m == (my.dataset.mm - 1))) {
                              myD[i].classList.add('has-event');
                              myD[i].title = myD[i].title.concat( ' ' + my.dataset.text);
                              console.log('myD[i].title.concat( my.dataset.text)', myD[i].title.concat( my.dataset.text))
                              if (my.dataset.link) {
                                  myD[i].innerHTML = '<a href="' + my.dataset.link + '" target="_blank">' + myD[i].innerHTML + '</a>';
                              }
                          }
                          // if (myD[i].innerHTML == my.dataset.dd_d && myD[i].parentNode.parentNode.parentNode.dataset.m == (my.dataset.mm - 1)) {
                          //   myD[i].title += " and " + my.dataset.text;
                          // }
                          if ((myD[i].innerText == my.dataset.dd) && (myD[i].parentNode.parentNode.parentNode.dataset.m == (my.dataset.mm - 1))) {
                              const event =  myD[i].appendChild(newSpan);
                              event.setAttribute('data-id', my.dataset.id);
                              event.setAttribute('data-title', my.dataset.text);
                              // event.innerText =  my.dataset.text;
                          }
                      }
                  }
              }

              //Added event click ---> open popup


          // select in add.js
          // let dateEvent = document.querySelectorAll('td[title]')
          let dateEvent = document.querySelectorAll('#calendarTable > div')
          let dropMenu = document.querySelector('.dropdown-menu')
          for (let i = 0; i < dateEvent.length; i++) {
              // const element = dateEvent[i].getAttribute('title');
              const element = dateEvent[i].getAttribute('data-text');
              const elementId = dateEvent[i].getAttribute('data-id');
              let li = document.createElement('li');
              li.innerHTML = element;
              li.setAttribute('data-id', elementId);

              dropMenu.appendChild(li);

              // console.log(element);
          }

          // open popup function in app.js

  </script>
</div>

