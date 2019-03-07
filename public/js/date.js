function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
  "Juli", "Augustus", "September", "Oktober", "November", "Desember"
];

const dayNames = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",
  "Minggu"
];

var today = new Date();
var dday = today.getDay();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd;
}

if (mm < 10) {
  mm = '0' + mm;
}

if (dday == 0) {
  dday =7;
}

today = dayNames[dday-1] + ',' + dd + '  ' + monthNames[today.getMonth()] + '  ' + yyyy;
document.getElementById("date").innerHTML = today;