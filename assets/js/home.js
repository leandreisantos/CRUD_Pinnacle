const body = document.querySelector(".home-body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      inputSearch = body.querySelector(".nav-search");

      toggle.addEventListener("click",()=>{
        sidebar.classList.toggle("close");
        //inputSearch.value=null;
      });

//Navigation toggle
var activeLink;
const navigationItems = document.querySelectorAll('.navlink');
navigationItems.forEach(item=>{
  item.addEventListener("click",()=>{
    toggleActiveLink(item);    
  });
});

function toggleActiveLink(clickedItem){
    var links = document.querySelectorAll(".active");
    links.forEach(function(link){
      //Remove active link
      link.classList.remove("active");

      //Add "active" class to the clicked navigation item
      var element = clickedItem.querySelector('a');
      element.classList.add('active');
    });
}

const showMoreTime = document.getElementById('show-more-time');

//Navigation search
const searchInput = document.getElementById('nav-search');
const navlinks  = document.getElementById('menu-links').getElementsByTagName('a');

searchInput.addEventListener('input',function(){
  const searchText = this.value.toLowerCase(); //Get search query and convert to lowercase
  Array.from(navlinks).forEach(link =>{
    const linkText = link.textContent.toLowerCase(); //Get the text of the link and convert to lower case
    //console.log(linkText);
    if(linkText.includes(searchText)){
      link.parentNode.style.display=''; // show the list of item if the search query mathes
    }else{
      link.parentNode.style.display='none';
    }
  });
});


//Calendar
const isLeapYear = (year) => {
  return (
    (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
    (year % 100 === 0 && year % 400 === 0)
  );
};
const getFebDays = (year) => {
  return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.calendar');
const month_names = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  // 'July',
  // 'August',
  // 'September',
  // 'October',
  // 'November',
  // 'December',
];
let month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
  month_list.classList.remove('hideonce');
  month_list.classList.remove('hide');
  month_list.classList.add('show');
  dayTextFormate.classList.remove('showtime');
  dayTextFormate.classList.add('hidetime');
  timeFormate.classList.remove('showtime');
  timeFormate.classList.add('hideTime');
  dateFormate.classList.remove('showtime');
  dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
  let calendar_days = document.querySelector('.calendar-days');
  calendar_days.innerHTML = '';
  let calendar_header_year = document.querySelector('#year');
  let days_of_month = [
    31,
    getFebDays(year),
    31,
    30,
    31,
    30,
    31,
    31,
    30,
    31,
    30,
    31,
  ];
  
  let currentDate = new Date();
  
  month_picker.innerHTML = month_names[month];
  
  calendar_header_year.innerHTML = year;
  
  let first_day = new Date(year, month);


for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

    let day = document.createElement('div');

    if (i >= first_day.getDay()) {
      day.innerHTML = i - first_day.getDay() + 1;

      if (i - first_day.getDay() + 1 === currentDate.getDate() &&
        year === currentDate.getFullYear() &&
        month === currentDate.getMonth()
      ) {
        day.classList.add('current-date');
      }
    }
    calendar_days.appendChild(day);
  }
};

let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
  let month = document.createElement('div');
  month.innerHTML = `<div>${e}</div>`;

  month_list.append(month);
  month.onclick = () => {
    currentMonth.value = index;
    generateCalendar(currentMonth.value, currentYear.value);
    month_list.classList.replace('show', 'hide');
    dayTextFormate.classList.remove('hideTime');
    dayTextFormate.classList.add('showtime');
    timeFormate.classList.remove('hideTime');
    timeFormate.classList.add('showtime');
    dateFormate.classList.remove('hideTime');
    dateFormate.classList.add('showtime');
  };
});

(function () {
  month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
  --currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
  ++currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};

timeDisplay();

function timeDisplay()
{
  let currentDate = new Date();
  let currentMonth = { value: currentDate.getMonth() };
  let currentYear = { value: currentDate.getFullYear() };
  generateCalendar(currentMonth.value, currentYear.value);

  const todayShowTime = document.querySelector('.time-formate');
  const todayShowDate = document.querySelector('.date-formate');

  const currshowDate = new Date();
  const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
  };
  const currentDateFormate = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
  ).format(currshowDate);
  todayShowDate.textContent = currentDateFormate;
  setInterval(() => {
    const timer = new Date();
    const option = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
    };
    const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
      2,
      '0'
    )}:${`${timer.getMinutes()}`.padStart(
      2,
      '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formateTimer;
  }, 1000);
}



$(document).ready(function(){

  //View dashboard tab in sidebar
  function ViewDashboardEventHandler(e){
    e.preventDefault();
    SubmitAjax('POST','home_dash',null,ViewDashboard);
  }$('.dashboard').off('click').on('click',ViewDashboardEventHandler);

  function ViewDashboard(response){
    $('.home').html(response.home);
    timeDisplay();
  }

  $('.show-more-time').click(function(){
    $('.show-time-logs').click();
  });

  //View time logs tab in sidebar    
  function ViewTimeLogsEventHandler(e){
    e.preventDefault();
    SubmitAjax('POST','showTimeLogs',null,ViewTimeLogs);
  } $('.show-time-logs').off('click').on('click',ViewTimeLogsEventHandler);

  function ViewTimeLogs(response){
    $('.home').html(response.timeLogTable);
  }

  $('.timelogs-see-more').off('click').on('click',ViewTimeLogsEventHandler);

  //View profile tab in sidebar
  function ViewProfileEventHandler(e){
    e.preventDefault();
    SubmitAjax('POST','profile',null,ViewProfile);
  }$('.view-profile').off('click').on('click',ViewProfileEventHandler);

  function ViewProfile(response){
    $('.home').html(response.profileTab);
  }

  function ViewNotificationEventHandler(e){
    e.preventDefault();
    SubmitAjax('GET','notification',null,ViewNotification);
  }$('.view-notification').off('click').on('click',ViewNotificationEventHandler);

  function ViewNotification(response)
  {
    $('.home').html(response.body);
  }


  //View Under employee tab in sidebar
  function ShowUnderEmpEventHandler(e){
    e.preventDefault();
    SubmitAjax('POST','show_under_employee/0',null,ShowUnderEmployee);
  }$('.show-under-emp-btn').off('click').on('click',ShowUnderEmpEventHandler);

  function ShowUnderEmployee(response)
  {
    $('.home').html(response.tableShowEmployeeUnder);
  }

  //View employee tab in sidebar
  function ViewEmployeeEventHandler(e){
    e.preventDefault();
    SubmitAjax('POST','view_employee',null,ViewEmployee);
  }$('.view-employee').off('click').on('click', ViewEmployeeEventHandler);

  function ViewEmployee(response){
    $('.home').html(response.viewEmpTab);
  }

  //View departments tab in sidebar
  function ViewDepartmentsEventHandler(e){
    e.preventDefault();
    SubmitAjax('GET','view_departments',null,ViewDepartments);
  }$('.view-departments').off('click').on('click',ViewDepartmentsEventHandler);

  function ViewDepartments(response){
    $('.home').html(response.viewDeptTab);
  }

  //View position tab in sidebar
  function ViewPositionEventHandler(e){
    e.preventDefault();
    SubmitAjax('GET','view_positions',null,ViewPosition);
  }$('.view-positions').off('click').on('click',ViewPositionEventHandler);

  function ViewPosition(response){
    $('.home').html(response.viewPositionsTab);
  }

  //Logout
  function LogoutEventHandler(e){
    SubmitAjax('POST','logout',null,Logout);
  }$('.modal-logout').off('click').on('click',LogoutEventHandler);

  function Logout(response)
  {
    location.reload();
  }

  //Edit enable
  // function EditEnableEventHandle(e){
  //   e.preventDefault();
  //   alert("click edit");
  //   //SubmitAjax('POST','enableEdit',null,EditEnable);
  // }$('.icon-edit').off('click').on('click',EditEnableEventHandle);

  // function EditEnable(response)
  // {

  // }

  // $('.enable-edit').click(function(){
  //   alert('click');
  // });

});

//** FUNCTION FOR SUBMITTING AJAX TO SERVER */
function SubmitAjax(_type,_url,_data=null,func)
{
    $.ajax({
        type:_type,
        url:_url,
        data:_data,
        success:function(response)
        {
            func(response);
        },
        error:function(xhr,status,erro)
        {
            alert(xhr.responseTxt);
        }
    });
}
