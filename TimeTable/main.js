$(function(){
    $('#tkb').on('click', 'td', function(){
		//alert($(this).html());
		if ($(this).html()!="_____"){
			load_ajax($(this).html());
		}else {
			$('#kqTKB').html("N/A");
		}
  });
});

function load_ajax(monhoc){
    $.ajax({
        url : "action.php",
        type : "post",
        dateType:"text",
        data : {
            tenmon : monhoc
        },
    success : function (result){
			//alert(result);
			var kq = $.parseJSON(result);
			var TEN_MON = kq.TEN_MON;
			var PHONG = kq.PHONG;
			var NHOM = kq.NHOM;
			var DESC = kq.DESC;
    	$('#kqTKB').html("<b>Học phần: </b>" + TEN_MON + "<br><b>Phòng: </b>" + PHONG + "<br><b>Nhóm: </b>" + NHOM + "<br><b>Ghi chú: </b>" + DESC);
    }
  });
}
