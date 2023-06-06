//Show button
$('#ic').on('click', () => {
  let ps = $('#pass'),
  ic = $('#ic');
  if( ps.attr('type') == 'password' ) {
    ps.attr('type', 'text');
    ic.attr('class', 'fas fa-unlock');
  } else {
    ps.attr('type', 'password');
    ic.attr('class', 'fas fa-lock');
  }
});

$('#ic2').on('click', () => {
  let ps = $('#pass2'),
  ic = $('#ic2');
  if( ps.attr('type') == 'password' ) {
    ps.attr('type', 'text');
    ic.attr('class', 'fas fa-unlock');
  } else {
    ps.attr('type', 'password');
    ic.attr('class', 'fas fa-lock');
  }
});

$('#ic3').on('click', () => {
  let ps = $('#pass3'),
  ic = $('#ic3');
  if( ps.attr('type') == 'password' ) {
    ps.attr('type', 'text');
    ic.attr('class', 'fas fa-unlock');
  } else {
    ps.attr('type', 'password');
    ic.attr('class', 'fas fa-lock');
  }
});


//Close button
$('.alt i').on('click', function() {
  $(this).parent('.alt').remove();
});
//Reset button 
$('.capt i').on('click', function() {
  var ig = $('.capt img'),
  cac = new Date().getTime(),
  c = "?l=" + cac;
  ig.src += c;
});




