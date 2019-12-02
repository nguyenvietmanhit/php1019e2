function handleSubmit() {


	//khai báo 2 biến chứa thông tin lỗi và thành công tương ứng
	var error = '';
	var result = '';

	//lấy ra các đối tượng với từng input trong form
	var obj_name = document.getElementById('name');
	var name = obj_name.value;

	var obj_address = document.getElementById('address');
	var address = obj_address.value;

	var obj_zip_code = document.getElementById('zip-code');
	var zip_code = obj_zip_code.value;

	var obj_country = document.getElementById('country');
	var country = obj_country.value;

	var obj_gender_male = document.getElementById('gender_male');
	var gender_male = obj_gender_male.value;
	var obj_gender_female = document.getElementById('gender_female');
	var gender_female = obj_gender_male.value;

	var obj_color_red = document.getElementById('checkbox_red');
	var color_red = obj_color_red.value;
	var obj_color_green = document.getElementById('checkbox_green');
	var color_green = obj_color_green.value;
	var obj_color_blue = document.getElementById('checkbox_blue');
	var color_blue = obj_color_blue.value;

	var obj_phone = document.getElementById('phone');
	var phone = obj_phone.value;

	var obj_mail = document.getElementById('email');
	var mail = obj_mail.value; 

	var obj_password = document.getElementById('password');
	var password = obj_password.value; 

	var obj_verify_password = document.getElementById('password');
	var verify_password = obj_verify_password.value; 

	//validate 
	if (name == '') {
		error = 'Name không được để trống';
		obj_name.focus();
	}

	//hiển thị thông báo lỗi cũng như thông báo thành công
	var obj_error = document.getElementById('error');
	obj_error.innerHTML = error;

	var obj_result = document.getElementById('result');
	obj_result.innerHTML = result;

	//ngăn ngừa tải lại trang
	return false;
}