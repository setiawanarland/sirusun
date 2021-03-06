$( document ).ready(function() {

  $('#create_excel').click(function() {
    console.log($('#report_table').html());
  }); 

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

  var today2 = new Date();
  var mm2 = today2.getMonth() + 1; //Month starts from 0
  var yyyy2 = today2.getFullYear();

  if (mm2<10) {
      mm2='0'+mm2
  } 
  today2 = yyyy2;

  $('#yearpicker').val(today2);
  
	$("#yearpicker").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years"
	});


  // tooltip
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

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
      url: 'http://localhost/sirusun/admin/useractivation',
      data: {id: userId, isActive: userActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun/admin/user';
      }
    })


  })

  // switcher submenu
  $('.switcher-submenu').on('change', function() {
    var submenuId = $(this).data('submenu');
    var submenuActive = $(this).data('active');

    console.log(submenuId);

    $.ajax({
      url: 'http://localhost/sirusun/admin/submenuactivation',
      data: {id: submenuId, isActive: submenuActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun/admin/submenu';
      }
    })


  })

  // switcher access menu
  $('.role-access').on('change', function() {
   var menuId = $(this).data('menu');
   var roleId = $(this).data('role');

   $.ajax({
    url: 'http://localhost/sirusun/admin/changeaccess',
    type: 'post',
    data: {
        menuId: menuId,
        roleId: roleId
        },
    success: function() {
      document.location = 'http://localhost/sirusun/admin/roleaccess/' + roleId;
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
    url: 'http://localhost/sirusun/admin/changeaccessrusun',
    type: 'post',
    data: {
        rusunId: rusunId,
        userId: userId
        },
    success: function() {
      document.location = 'http://localhost/sirusun/admin/rusunaccess/' + rusunId;
    }
   });
  });

  // switcher activation rusun
  $('.switcher-rusun').on('change', function() {
    var rusunId = $(this).data('rusun');
    var rusunActive = $(this).data('active');

    // console.log('ok');

    $.ajax({
      url: 'http://localhost/sirusun/admin/rusunactivation',
      data: {id: rusunId, isActive: rusunActive},
      method: 'post',
      // dataType: 'json',
      success: function(data) {
        document.location = 'http://localhost/sirusun/admin/rusun';
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

  window.location = 'http://localhost/sirusun/admin/lantai/' + rusunId;

});

// get kamar by rusun
$('#search-kamar').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-kamar').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun/admin/kamar/' + rusunId;

});

// get daftar kamar by rusun
$('#search-daftarkamar').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftarkamar').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun/main/kamar/' + rusunId;

});

// get daftar penghuni by rusun
$('#search-daftarpenghuni').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-daftarpenghuni').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun/main/penghuni/' + rusunId;

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

  window.location = 'http://localhost/sirusun/main/tagihan/' + rusunId + '/' + bulan + '/' + tahun;

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

  window.location = 'http://localhost/sirusun/main/pendapatan/' + rusunId + '/' + bulan + '/' + tahun;

});

// get laporan tahunan by rusun
$('#search-laporan').on('click', function() {
  // console.log($(this).val());

  var rusunId = $('#list-rusun-laporan').val();
  var tahun = $('#yearpicker').val();
    
  // loading
  $('#main-wrapper').removeClass('show');
  $('#preloader').fadeIn(500);

  window.location = 'http://localhost/sirusun/main/laporan/' + rusunId + '/' + tahun;

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
      url: 'http://localhost/sirusun/admin/getLantaiByRusunChange',
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
      url: 'http://localhost/sirusun/admin/getHargaByLantaiChange',
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