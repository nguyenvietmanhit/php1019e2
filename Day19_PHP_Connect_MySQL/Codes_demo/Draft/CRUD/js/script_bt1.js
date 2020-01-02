/**
 *
 * @param email
 * @param name
 * @param phone
 * @param notes
 * @param no
 * @returns {boolean}
 */
function checkValidate(email, name, phone, notes, no) {
    var showError = document.getElementById("show-error");
    if (email === '' || name === '' || phone === '' || notes === '' || no === '') {
        showError.innerText = "Không được để trống dữ liệu";
        return false;
    }

    showError.innerText = '';
    return true;
}

/*

 */
function displayForm() {
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var notes = document.getElementById("notes").value;
    var no = document.getElementById("no").value;

    if (checkValidate(email, name, phone, notes, no)) {
        var text = "Email: " + email + "<br />";
        text += "Name: " + name + "<br />";
        text += "Telephone Number: " + phone + "<br />";
        text += "Notes: " + notes + "<br />";
        text += "No. of guests: " + no + "<br />";
        document.getElementById("show-result").innerHTML = text;
    }


    return false;

}
