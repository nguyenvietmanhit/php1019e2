$(document).ready(function() {
	//code js
	$('#form-bt-1').submit(function(event) {
		var error = '';
		var result = '';
		//ngăn ngừa refresh trang khi submit form
		event.preventDefault();
		//lấy giá trị của 2 số vừa nhập
		// var number1 = $('#number1').attr('value');
		var number1 = $('#number1').val();
		var number2 = $('#number2').val();
		//check validate với trường hợp để trống
		if (number1 == '') {
			error = "Không được bỏ trống số thứ nhất";
			$('#number1').focus();
		}
		else if (number2 == '') {
			error = "Không được bỏ trống số thứ hai";
			$('#number2').focus();
		} else {
			//thực hiện logic tính toán
			number1 = parseInt(number1);
			number2 = parseInt(number2);
			var perimeter = (number1 + number2) * 2;
			var area = number1 * number2;
			result = "Chu vi = " + perimeter + "m";
			result += "Diện tích = " + area + "m<sup>2</sup>";
		}
		//cần xóa phần tử chứa class error và result nếu có
		// rồi mới hiển thị
		$('.error').remove();
		$('.result').remove();
		//đổ dữ liệu error và result ra
		$('#form-bt-1').append("<h3 class='error'>" + error + "</h3>");
		$('#form-bt-1').append("<h3 class='result'>" + result + "</h3>");
	});
});