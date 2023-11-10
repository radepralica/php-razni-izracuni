'use strict';
let result = document.getElementById('result');
const btnCalc = document.getElementById('btnCalc');

function calculateAverage() {
  const tt = document.getElementById('upis').value;
  let trimmed = tt.replaceAll(' ', '');
  let upis = trimmed.replaceAll(',', '.');
  let numbers = [];

  numbers = upis.split('\n').map(Number);

  numbers = numbers.filter(function (val) {
    return val > 0;
  });

  let res =
    numbers.reduce(function (acc, curr, i) {
      return acc + curr;
    }, 0) / numbers.length;
  result.value = res.toFixed(2);
}
btnCalc.addEventListener('click', function (e) {
  e.preventDefault();
  if (document.getElementById('upis').value === '') {
    Swal.fire('Greška', 'Nema podataka za izračun!!!');
    upis.textContent = '';
    return;
  }

  calculateAverage();
});

//Razlika datuma

let diff = document.getElementById('btnDiff');

function calculateDateDifference() {
  var startDate = new Date(document.getElementById('start_date').value);
  var endDate = new Date(document.getElementById('end_date').value);

  // Calculate the difference in milliseconds
  var differenceInMilliseconds = endDate - startDate;

  // Convert the difference to days
  var differenceInDays = differenceInMilliseconds / (1000 * 60 * 60 * 24);

  document.getElementById('results').value = differenceInDays;
  upis.value += differenceInDays + '\r';
}

btnDiff.addEventListener('click', function (e) {
  e.preventDefault();
  let startDt = document.getElementById('start_date').value;
  let endDt = document.getElementById('end_date').value;

  if (startDt === '' || endDt === '') {
    Swal.fire('Greška', 'Selektujte oba datuma');
    return;
  }

  if (startDt >= endDt) {
    Swal.fire('Greška', 'Krajnji datum mora biti veći');
    return;
  }
  calculateDateDifference();
});
