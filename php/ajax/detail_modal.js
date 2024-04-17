$(document).ready(function(){
    // Nhấn vào xem chi tiết thì lấy ra thông tin của phòng đó
    $('.btn-primary[data-toggle="modal"]').click(function() {
      let roomId = $(this).data('target').slice(13); //Lấy id từ data-target của modal
      loadDetail(roomId);
    });
  });
  
  function loadDetail(roomId) {
    $.ajax({
      url: 'Controller/admin/admin_room_list.php?act=detail',
      method: "GET",
      data: {id: roomId},
      dataType: "json",
      success: function(res) {
        console.log(res);
        // updateModalContent(response);
      },
      error: function() {
        console.error("Error");
      }
    });
  }
  }
  