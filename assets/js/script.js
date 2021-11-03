$( document ).ready(function() {

  // datepicker
  var today = new Date();
  var mm = today.getMonth() + 1; //Month starts from 0
  var yyyy = today.getFullYear();

  if (mm<10) {
      mm='0'+mm
  } 
  today = mm+' '+yyyy;
  $('#datepicker').val(today);
  
	$("#datepicker").datepicker({
		format: "mm yyyy",
		viewMode: "months",
		minViewMode: "months"
	});


  // tooltip
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });


  
  console.log($('.tahun-pendapatan').data('tahun'));
  
//   // Morris bar chart
//   Morris.Bar({
//     element: 'chart1',
//     data: [{
//         y: '2006',
//         a: 100,
//         b: 90
//     }, {
//         y: '2007',
//         a: 75,
//         b: 65
//     }, {
//         y: '2008',
//         a: 50,
//         b: 40
//     }, {
//         y: '2009',
//         a: 75,
//         b: 65
//     }, {
//         y: '2010',
//         a: 50,
//         b: 40
//     }, {
//         y: '2011',
//         a: 75,
//         b: 65
//     }, {
//         y: '2012',
//         a: 100,
//         b: 90
//     }, {
//         y: '2013',
//         a: 10,
//         b: 20
//     }],
//     xkey: 'y',
//     ykeys: ['a', 'b'],
//     labels: ['A', 'B'],
//     barColors: ['#343957', '#5873FE'],
//     hideHover: 'auto',
//     gridLineColor: '#eef0f2',
//     resize: true
// });




  // sweetalert logged in
  var logged = $('.logged').data('logged');

  if (logged) {

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      
    })

    Toast.fire({
      icon: 'success',
      title: 'Logged in successfully'
    })
  }



  // flashdata sweetalert
  var flashData = $('.flashdata').data('flashdata');
  var flashMessage = $('.flashdata').data('message');

  if (flashData) {
    Swal.fire({
      title: `${flashMessage}`,
      text: `${flashData}`,
      icon: 'success'
    });
  }




  // delete menu trigger
  $('.btn-del').on('click', function(e) {
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
      title: 'Are you sure to delete this data?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = href;
      }
    });
  })

  // check out penghuni
  $('.check-out').on('click', function(e) {
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
      title: 'Are you sure to checking out?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Checkout!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = href;
      }
    });
  })

  // button bayar tagihan
  $('.bayar-tagihan').on('click', function(e) {
    e.preventDefault();
    var href = $(this).attr('href');
    var jmlTagihan = $(this).data('bayar');

    Swal.fire({
      title: 'Total Tagihan ' + toRupiah(jmlTagihan),
      text: "Pastikan pembayaran sesuai dengan total tagihan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Bayar!'
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location = href;
      }
    });
  });

  

   // reset pasword trigger
  $('.reset-password').on('click', function(e) {
    e.preventDefault();
    var href = $(this).attr('href');
    var user = $(this).data('user')

    Swal.fire({
      title: `Are you sure to reset password ${user}?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = href;
      }
    });
  })



  // switcher
  $('.switcher-user').on('change', function() {
    var userId = $(this).data('user');
    var userActive = $(this).data('active');

    console.log(userId);

    $.ajax({
      url: 'http://localhost/sirusun2/admin/useractivation',
      data: {id: userId, isActive: userActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun2/admin/user';
      }
    })


  })

  // switcher submenu
  $('.switcher-submenu').on('change', function() {
    var submenuId = $(this).data('submenu');
    var submenuActive = $(this).data('active');

    console.log(submenuId);

    $.ajax({
      url: 'http://localhost/sirusun2/admin/submenuactivation',
      data: {id: submenuId, isActive: submenuActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun2/admin/submenu';
      }
    })


  })

  // switcher access menu
  $('.role-access').on('change', function() {
   var menuId = $(this).data('menu');
   var roleId = $(this).data('role');

   $.ajax({
    url: 'http://localhost/sirusun2/admin/changeaccess',
    type: 'post',
    data: {
        menuId: menuId,
        roleId: roleId
        },
    success: function() {
      document.location = 'http://localhost/sirusun2/admin/roleaccess/' + roleId;
    }
   });
  });

  // switcher access rusun
  $('.rusun-access').on('change', function() {
   var rusunId = $(this).data('rusun');
   var userId = $(this).data('user');
   console.log(rusunId);
   console.log(userId);

   $.ajax({
    url: 'http://localhost/sirusun2/admin/changeaccessrusun',
    type: 'post',
    data: {
        rusunId: rusunId,
        userId: userId
        },
    success: function() {
      document.location = 'http://localhost/sirusun2/admin/rusunaccess/' + rusunId;
    }
   });
  });

  // switcher activation rusun
  $('.switcher-rusun').on('change', function() {
    var rusunId = $(this).data('rusun');
    var rusunActive = $(this).data('active');

    // console.log('ok');

    $.ajax({
      url: 'http://localhost/sirusun2/admin/rusunactivation',
      data: {id: rusunId, isActive: rusunActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun2/admin/rusun';
      }
    })


  })



// get lantai by rusun
$('#search-lantai').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-kamar').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/admin/lantai/' + rusunId;

});

// get kamar by rusun
$('#search-kamar').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-kamar').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/admin/kamar/' + rusunId;

});

// get daftar kamar by rusun
$('#search-daftarkamar').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftarkamar').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/main/kamar/' + rusunId;

});

// get daftar penghuni by rusun
$('#search-daftarpenghuni').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftarpenghuni').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/main/penghuni/' + rusunId;

});

// get daftar tagihan by rusun
$('#search-daftartagihan').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftartagihan').val();
  var bulan = $('#datepicker').val().substr(0, 2);
  var tahun = $('#datepicker').val().substr(3, 6);
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/main/tagihan/' + rusunId + '/' + bulan + '/' + tahun;

});

// get daftar pendapatan by rusun
$('#search-daftarpendapatan').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftarpendapatan').val();
  var bulan = $('#datepicker').val().substr(0, 2);
  var tahun = $('#datepicker').val().substr(3, 6);
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun2/main/pendapatan/' + rusunId + '/' + bulan + '/' + tahun;

});



// get no kamar when add penghuni
$('.btnTambahPenghuni').on('click', function() {
  var noKamar = $(this).data('nomor');
  var kamarId = $(this).data('id');

  $('#kamar-id').val(kamarId);
  $('#no-kamar').val(noKamar);


})




// get lantai by rusun Change
$('#rusun-id').on('change', function() {
  var rusunId = $(this).val();
  console.log(rusunId);

  $.ajax({
      url: 'http://localhost/sirusun2/admin/getLantaiByRusunChange',
      data: {rusunId: rusunId},
      method: 'post',

      success: function(data) {
        $('#lantai-id').html(data);
        console.log(data);
      }
    })

});


// get harga by lantai Change
$('#lantai-id').on('change keypress', function() {
  var lantaiId = $(this).val();
  console.log(lantaiId);

  $.ajax({
      url: 'http://localhost/sirusun2/admin/getHargaByLantaiChange',
      data: {lantaiId: lantaiId},
      method: 'post',

      success: function(data) {
        $('#harga-lantai').val(data);
        console.log(data);
      }
    })

});




// check status kamar
const kamar = document.querySelectorAll('.kamar');
  
  for (var i = 0; i < kamar.length; i++) {
    if (kamar[i].getAttribute('data-status') == 1) {
      kamar[i].classList.toggle('bg-danger');
      kamar[i].childNodes[3].innerHTML = '<i class="fas fa-door-closed fa-5x textHitam"></i>';
      kamar[i].childNodes[5].childNodes[1].remove();

    } else {
      kamar[i].classList.toggle('bg-success');
    }
  }







});