$(document).on('click', '#logout', function () {
  var formData = $(this).serialize();

  Swal.fire({
    title: 'ออกจากระบบ',
    text: "คุณต้องการออกจากระบบหรือไม่ ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ต้องการออกจากระบบ',
    cancelButtonText: 'ยกเลิก',
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'logout.php',
        type: 'POST',
        dataType: 'html',
        data: formData,
        success: function (data) {
          console.log(data);
          Swal.fire({
            icon: 'success',
            title: 'ออกจากระบบ',
            text: 'ออกจากระบบสำเร็จ',
            showConfirmButton: false,
          })
          setTimeout(function () { window.location.href = "../index.php" }, 1500);
        }
      })
    }
  })
});