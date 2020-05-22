//Tạo 1 file script.js tại backend/assets/js
//đây là file chứa các code js custom của bạn

//luôn sử dụng document.ready khi có tích hợp jquery
$(document).ready(function() {
    //tích hợp Ckeditor vào trường Mô tả của category
    //truyền name của textarea muốn set vào phương thức replace của
    // class CKEDTIOR

    // CKEDITOR.replace('description');
    //tích hợp cả ckeditor và ckfinder trong cùng 1 câu lệnh
    var obj_ckfinder = {
        //nhúng đường dẫn của file assets/ckfinder/ckfinder.html
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //nhúng đường dẫn file connector.php
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'

    };
    CKEDITOR.replace('description', obj_ckfinder);
});