$(document).ready(function () {

    $(".select").selectpicker();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select-loaits').click(function () {
        search_loaiTSCD(1);
        search_ts(1);
        search_chitiet(1);
    });

    $('.select-loaisp').click(function () {
        search_phieubangiao(1);
        search_hopdong(1);
    });

    $(document).on('click', '.loaits-select', function () {
        check('#loaits');
        hao_mon();
        loc_nvOftaisan('#loaits', '#nhanvien');
    });
    $(document).on('click', '.loaits_up-select', function () {
        check('#loaits_up');
        hao_mon();
        loc_nvOftaisan('#loaits_up', '#nhanvien_up');
    });

    hao_mon();
    
    $('.nhanvien-select').click(function () {
        check('#nhanvien');
    });

    $('.trangthai-select').click(function () {
        check('#trangthai');
    });

    $('.select-ncc').click(function () {
        check('#ncc');
    });

    $('.select-phongban').click(function () {
        check('#phongban');
        search_ts(1);
        search_chitiet(1);
        list_ts_kiemke();
        search_kiemke(1);
        search_nhanvien(1)
    });

    $('.select-nv-kk').click(function(){
        check('#nv_kk_1_lb');
        check('#nv_kk_2_lb');
        check('#nv_kk_3_lb');
        var ma_nv1=$('#nv_kk_1 option:selected').val();
        var ma_nv2=$('#nv_kk_2 option:selected').val();
        var ma_nv3=$('#nv_kk_3 option:selected').val();
        if(ma_nv1 !=''){
            loc_cv_nv('/kiemke/loc_cv',ma_nv1,'.chucvu_1');
        }
        if(ma_nv2 !=''){
            loc_cv_nv('/kiemke/loc_cv',ma_nv2,'.chucvu_2');
        }
        if(ma_nv3 !=''){
            loc_cv_nv('/kiemke/loc_cv',ma_nv3,'.chucvu_3');
        }
    });

    // check số
    $('.soluong').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    // phân trang
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        search_baocao(page);
        search_loaiTSCD(page);
        search_loai(page)
        search_ts(page);
        search_chitiet(page);
        search_phieubangiao(page);
        search_tieuhao(page);
        search_nhanvien(page);
        search_kiemke(page);
    });

    // chỉnh calendar
    $(".date").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true
    });


    $(document).on('click', '.btn_uploaiTSCD', function () {
        var id = $(this).data('id');
        update_loaiTSCD(id);
    });

    $(document).on('click', '.btn_chitiet', function () {
        var id = $(this).data('id_chitiet');
        update_chitiet(id);
    });

    $(document).on('click', '.btn_modal_chitiet', function () {
        var id = $(this).data('id');
        var ma_ts = $(this).data('ma_ts');
        show_modal_chitiet(id, ma_ts);
    });


    $(document).on('click', '.btn_suaphong', function () {
        var id = $(this).data('id');
        update_phongban(id);
    });

    $(document).on('click', '.btn_up_nhanvien', function () {
        var id = $(this).data('id');
        update_nv(id);
    });

    $(document).on('click', '.btn_upNCC', function () {
        var id = $(this).data('id');
        update_ncc(id);
    });

    $('.ngia').change(function () {
        var ngia = $(this).val();
        var hm = $('.tile_HM').text();
        var giatri = Number(ngia) * (Number(hm) / 100);
        var tgsdconlai = Number($('.tg_SD_conlai_HM').text());
        var tgsd = Number($('.tgSD').text());
        if (giatri) {
            $('.giatri_HM').text(giatri);
        } else {
            $('.giatri_HM').text('0');
        }
        // if((tgsd-tgsdconlai)>0){

        // }

    });

    $('#so_tai_san').change(function () {
        var sl = Number($('#so_tai_san').val());
        var ma_phong = $('.select-phonggiao option:selected').val();
        $.ajax({
            url: '/bangiao/more_ts',
            method: 'post',
            data: { sl: sl, ma_phong: ma_phong },
            success: function (data) {
                $('.more_taisan').html(data);
                $(".select").selectpicker();

            }
        });

    });

    $(document).on('click','.phongban-select',function(){
        loc_select('loc_nv',$('.phongban-select option:selected').val(),'#nhanvien');
        loc_select('loc_nv',$('#phongban_up option:selected').val(),'#nhanvien_up');
    });
    // lọc select------------------
    $('.select-phonggiao').click(function () {
        loc_select('loc_nv', $('.select-phonggiao option:selected').val(), '#nv_giao')
    });

    $('.select-phongnhan').click(function () {
        loc_select('loc_nv', $('.select-phongnhan option:selected').val(), '#nv_nhan');
    });

    $(document).on('click', '.select-phonggiao', function () {
        // var sl = Number($('#so_tai_san').val());
        // if (sl > 1) {
        //     for (i = 1; i <= sl; i++)
        //         loc_select('loc_chitiet', $('#nv_giao' + i + ' option:selected').val(), '#chitiet' + i);
        // } else {
        //     loc_select('loc_chitiet', $('#nv_giao option:selected').val(), '#chitiet1');
        // }
        var sl = Number($('#so_tai_san').val());
        var ma_phong = $('.select-phonggiao option:selected').val();
        $.ajax({
            url: '/bangiao/more_ts',
            method: 'post',
            data: { sl: sl, ma_phong: ma_phong },
            success: function (data) {
                $('.more_taisan').html(data);
                $(".select").selectpicker();
            }
        });
    });
    
    $(document).on('keyup','.soluongkiemke',function(){
        var id =$(this).data('id');
        tru_sl_kiemke($(this).val(),id);
    });

    // xóa chi tiết tài sản
    $(document).on("click", ".btn_delete", function () {
        var id = $(this).data("id");
        $.confirm({
            title: 'Thông báo!!!',
            content: 'Bạn có chắc muốn xóa chi tiết tài sản',
            draggable: true,
            dragWindowBorder: false,
            boxWidth: "30%",
            useBootstrap: false,
            type: 'red',
            icon: 'fa fa-warning',
            typeAnimated: true,
            dragWindowGap: 50,
            alignMiddle: true,
            offsetTop: 0,
            offsetBottom: 500,
            buttons: {
                xoa: {
                    btnClass: "btn-red",
                    text: 'Xóa',
                    action: function (xoa) {
                        $.ajax({
                            url: "/chitiettaisan/delete/" + id,
                            method: "post",
                            success: function (data) {
                                if(data == true){
                                    $(document).ready(function(){
                                        $.alert({
                                            title: 'Thành công!!!',
                                            content: 'Xóa chi tiết tài sản thành công',
                                            draggable: true,
                                            dragWindowBorder: false,
                                            boxWidth: "30%",
                                            useBootstrap: false,
                                            type: 'green',
                                            icon: 'fa fa-check',
                                            typeAnimated: true,
                                            dragWindowGap: 50,
                                            alignMiddle: true,
                                            offsetTop: 0,
                                            offsetBottom: 500,
                                        });
                                        var page = $('li.active span.page-link').text();
                                        search_chitiet(page);
                                    });
                                    
                                }else{
                                    $.alert({
                                        title: 'Thất bại!!!',
                                        content: 'Chi tiết tài sản đang được sử dụng không thể xóa',
                                        draggable: true,
                                        dragWindowBorder: false,
                                        boxWidth: "30%",
                                        useBootstrap: false,
                                        type: 'red',
                                        icon: 'fa fa-warning',
                                        typeAnimated: true,
                                        dragWindowGap: 50,
                                        alignMiddle: true,
                                        offsetTop: 0,
                                        offsetBottom: 500,
                                    });
                                }
                                

                            }
                        });
                        
                        
                    }
                },
                huy: {
                   text:'Hủy'
                }

            }
        });
    });

});


// -------------------------các hàm js ---------------------------------------//
function search_loaiTSCD(page) {
    var text = $('#search_loai').val();
    var seleted = $('#loai_taisan option:selected').val();
    
    $.ajax({

        url: '/loaiTSCD/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
            
        },
        success: function (data) {
            $('#list_loaiTSCD').html(data);
        }
    });
}
function search_ts(page) {
    var text = $('#search').val();
    var seleted = $('#taisan option:selected').val();
    var ma_phong = $('#phong option:selected').val();
    var ma_loai = $('.ma_loai').val();
    var phongban = $('.phongban').val();
    $.ajax({

        url: '/taisan/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
            ma_phong: ma_phong,
            ma_loai:ma_loai,
            phongban:phongban
        },
        success: function (data) {
            $('#list_taisan').html(data);
        }
    });
}
function search_phieubangiao(page) {
    var text = $('#search').val();
    var seleted = $('#nv option:selected').val();
    $.ajax({

        url: '/bangiao/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
        },
        success: function (data) {
            $('#list_phieubangiao').html(data);
        }
    });
}

function search_tieuhao(page) {
    var text = $('#search').val();
    $.ajax({
        url: '/tieuhao/search?page=' + page,
        method: "post",
        data: {
            text: text,
        },
        success: function (data) {
            $('#list_tieuhao').html(data);
        }
    });
}

function search_kiemke(page) {
    var text = $('#search').val();
    var seleted = $('#phong option:selected').val();
    $.ajax({
        url: '/kiemke/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted:seleted
        },
        success: function (data) {
            $('#list_kiemke').html(data);
        }
    });
}

function search_chitiet(page) {
    var text = $('#search').val();
    var seleted = $('#taisan option:selected').val();
    var ma_phong = $('.select-phongban option:selected').val();
    var ma_ts =$('.ma_ts').val();
    var ma_nv =$('.nhanvien').val();
    $.ajax({

        url: '/chitiettaisan/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
            ma_phong:ma_phong,
            ma_ts :ma_ts,
            ma_nv:ma_nv
        },
        success: function (data) {
            $('#list_chitiet').html(data);
        }
    });
}

//check input rỗng
function check(id) {
    var lop = '';
    var end = id.search("_lb");
    if (end > 0) {
        var t = id.slice(end + 1);

    } else {
        var t = id.slice(1);
    }

    if (end == -1) {

        var dk = id.slice(1);
        lop = id;

    } else {

        var dk = id.slice(1, end);
        lop = id.slice(0, end);
    }
    var val = $(id).text();
    val = val.toLowerCase().replaceAll(":", "");
    switch (t) {
        case 'lb': text = 'nhập ' + val;
            break;
        case 'file_temp': text = 'chọn file';
            break;
        case 'file_pdf': text = 'chọn file';
            break;
        case 'name': text = 'nhập tên đăng nhập';
            break;
        case 'pass': text = 'nhập mật khẩu';
            break;
        case 'loaits': text = 'chọn loại tài sản';
            break;
        case 'loaits_up': text = 'chọn loại tài sản';
            break;
        case 'phongban': text = 'chọn phòng ban';
            break;
        case 'nhanvien': text = 'chọn nhân viên';
            break;
        case 'trangthai': text = 'chọn trạng thái';
            break;
        case 'chucvu': text = 'chọn chức vụ';
            break;
        case 'ncc': text = 'chọn nhà cung cấp';
            break;
        case 'nv_nhan': text = 'chọn nhân viên nhận';
            break;
        case 'nv_giao': text = 'chọn nhân viên giao';
            break;
        case 'phonggiao': text = 'chọn phòng giao';
            break;
        case 'phongnhan': text = 'chọn phòng nhận';
            break;
    }
    if ($(lop).val() == "") {
        $(lop).addClass('error_input');
        $("." + dk + "_icon").css("display", "block");
        $(".error_" + dk).text("Vui lòng  " + text);
        $(".error_" + dk).css("display", "block");
        return false;
    } else {
        $(lop).removeClass('error_input');
        $("." + dk + "_icon").css("display", "none");
        $(".error_" + dk).css("display", "none");
        return true;
    }
}

// kiểm tra file
function readURL(input, id_img, loaifile = '') {
    var file = $(id_img).prop('files');
    var id = id_img.slice(1);
    var kq = false;
    var match = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document", 'application/pdf', 'application/msword'];
    if (file.length > 0 && file != "") {
        var files = $(id_img).prop('files')[0];
        var type = files.type;
        if (loaifile == 'pdf') {
            $('.text_name_pdf').text(files.name);
            if (type == match[1]) {
                $('.' + id + "_icon").css('display', 'none');
                $(".error_" + id).text('');
                $(".error_" + id).css("display", 'none');
                kq = true;
            } else {
                $(".error_" + id).text('File không hợp lệ');
                $(".error_" + id).css("display", 'block');
                $('.' + id + "_icon").css('display', 'block');
            }
        } else {
            $('.text_name_file').text(files.name);
            if (type == match[0] || type == match[2]) {
                $('.' + id + "_icon").css('display', 'none');
                $(".error_" + id).css("display", 'none');
                $(".error_" + id).text('');
                kq = true;
            } else {
                $(".error_" + id).text('File không hợp lệ');
                $(".error_" + id).css("display", 'block');
                $('.' + id + "_icon").css('display', 'block');
            }
        }
    } else {
        if (loaifile == 'pdf') {
            $('.text_name_pdf').text('');
        } else {
            $('.text_name_file').text('');
        }
        $(".error_" + id).text('Vui lòng chọn file');
        $(".error_" + id).css("display", 'block');
        $('.' + id + "_icon").css('display', 'block');
    }
    return kq;
}

function check_insertFile() {
    check('.mota_lb');
    check('#file_pdf');
    readURL(this, '#file_temp', 'word');
    readURL(this, '#file_pdf', 'pdf');
    if (check('.title_lb') && check('#file_temp') && check('#file_pdf') && check('.mota_lb') && readURL(this, '#file_temp', 'word') && readURL(this, '#file_pdf', 'pdf'))
        return true;
    return false;
}

// tìm kiếm báo cáo
function search_baocao(page) {
    var text = $("#search_baocao").val();
    $.ajax({
        url: '/maubaocao/search?page=' + page,
        method: 'post',
        data: { text: text },
        success: function (data) {
            $('#list_baocao').html(data);
        }
    });
}

function checklogin() {
    var name = $('#name').val();
    var pass = $('.pass').val();
    var kq = false;
    if (check('#name') && check('.pass')) {
        ;
        $.ajax({
            url: '/check',
            method: 'post',
            data: { name: name, pass: pass },
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data[0] == 'false') {
                    $(".error_name").text('Tên đăng nhập không tồn tại');
                    $(".error_name").css("display", 'block');
                    $(".name_icon").css('display', 'block');
                } else {
                    $(".error_name").text('');
                    $(".error_name").css("display", 'none');
                    $(".name_icon").css('display', 'none');
                }
                if (data[1] == 'false') {
                    $(".error_pass").text('Mật khẩu không đúng');
                    $(".error_pass").css("display", 'block');
                    $(".pass_icon").css('display', 'block');
                } else {
                    $(".error_pass").text('');
                    $(".error_pass").css("display", 'none');
                    $(".pass_icon").css('display', 'none');
                }
                if (data[0] == 'true' && data[1] == 'true') {
                    kq = true;
                }

            }
        });
    } else {
        check('#name');
        check('.pass');
    }
    return kq;
}

//tìm kiếm loại

function search_loai(page) {
    var text = $('#search_loai').val();
    $.ajax({
        url: '/loaits/search?page=' + page,
        method: "post",
        data: { text: text },
        success: function (data) {
            $('#list_loai').html(data);
        }
    });
}


// thêm phòng

function insert_phong() {
    var ten_phong = $('.ten_phong').val();
    var mo_ta = $('.mo_ta').val();
    if (check('.ten_phong_lb')) {
        $.ajax({
            url: '/phongban',
            method: 'post',
            data: { ten_phong: ten_phong, mo_ta: mo_ta },
            success: function (data) {
                location.reload();
            }
        })
    }
}

function check_insert_ncc() {
    check('.sdt_ncc_lb');
    check('.email_ncc_lb');
    check('.diachi_ncc_lb');
    if (check('.ten_ncc_lb') && check('.sdt_ncc_lb') && check('.email_ncc_lb') && check('.diachi_ncc_lb')) {
        return true;
    }
    return false;
}

function insert_ncc() {
    var ten_ncc = $('.ten_ncc').val();
    var sdt_ncc = $('.sdt_ncc').val();
    var email_ncc = $('.email_ncc').val();
    var diachi_ncc = $('.diachi_ncc').val();
    if (check_insert_ncc()) {
        $.ajax({
            url: '/nhacungcap',
            method: 'post',
            data: {
                ten_ncc: ten_ncc,
                sdt_ncc: sdt_ncc,
                email_ncc: email_ncc,
                diachi_ncc: diachi_ncc
            },
            success: function (data) {
                location.reload();
            }
        })
    }
}



function check_insert_taisan(mess = '') {
    check('.tents_lb');
    check('#loaits');
    check('.sl_lb');
    check('#phongban');
    check('.so_hieu_lb');
    check('.nsx_lb');
    check('#ncc');
    check('.nuoc_sx_lb');
    check('.ngaymua_lb');
    check('.ngaytang_lb');
    check('.ngaysd_lb');
    check('.ngia_lb');
    check_ngaysd();
    if (check('.tents_lb') && check('#loaits') && check('.sl_lb') && check('#phongban')
        && check('.so_hieu_lb') && check('.nsx_lb') && check('#ncc') && check('.nuoc_sx_lb')
        && check('.ngaymua_lb') && check('.ngaytang_lb') && check('.ngaysd_lb') && check('.ngia_lb') && check_ngaysd()
    ) {
        return true;
    } else {
        toastr.error('Vui lòng nhập thông tin tài sản ' + mess);
    }

    return false;
}

function check_insert_nv() {
    check('.email_nv_lb');
    check('.diachi_nv_lb');
    check('#phongban');
    check('#chucvu');
    if (check('.ten_nv_lb') && check('.email_nv_lb') && check('.diachi_nv_lb') && check('#phongban') && check('#chucvu')) {
        return true;
    }
    return false;
}

(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));


function update_loaiTSCD(id) {
    $.ajax({
        url: '/loaiTSCD/' + id + '/edit',
        method: 'get',
        success: function (data) {
            $('#modal_tscd').html(data);
            $('#updateTSCD').modal({
                show: true,
                backdrop: 'static'
            });
            $(document).ready(function () {
                $(".select").selectpicker();
            });
        }
    });
}

// thông tin hao mòn
function tinh_nam_HM(val) {
    if (val != undefined) {
        var today = new Date();
        var nam = Number(today.getFullYear());
        var bd = Number(val.slice(val.lastIndexOf('-') + 1));
        var conlai = nam - bd;
        var tgsd = Number($('.tgSD').text());
        if (tgsd > 0) {
            if (conlai < tgsd) {
                $('.tgSD_conlai_HM').text(tgsd - conlai);

            } else {
                $('.tgSD_conlai_HM').text('0');
            }
            $('.dennam_HM').text(bd + tgsd);
        }
    }


}
function hao_mon() {
    var id = $('.loaits-select option:selected').val()
    if (id != '') {
        $.ajax({
            url: '/tieuhao/find',
            method: "post",
            data: { ma_loai: id },
            dataType: 'json',
            success: function (data) {
                if (data != null) {
                    $('.tile_HM').text(data['muc_tieuhao']);
                    $('.tgSD').text(data['thoi_gian_sd']);
                    tinh_nam_HM($('.ngaysd').val());
                    var ngia = $('.ngia').val();
                    var hm = $('.tile_HM').text();
                    var giatri = Number(ngia) * (Number(hm) / 100);
                    if (giatri) {
                        $('.giatri_HM').text(giatri);
                    } else {
                        $('.giatri_HM').text('0');
                    }
                    khau_hao();
                }

            }
        });
    } else {
        $('.tile_HM').text('0.00');
        $('.tgSD').text('0');
    }
    tinh_nam_HM($('.ngaysd').val());
    var ngia = $('.ngia').val();
    var hm = $('.tile_HM').text();
    var giatri = Number(ngia) * (Number(hm) / 100);
    if (giatri) {
        $('.giatri_HM').text(giatri);
       
    } else {
        $('.giatri_HM').text('0');
        
    }
    var ngay = $('.ngaysd').val();
    if (ngay != '') {
        $('.bd_HM').text(ngay);
        $('.bd_KH').text(ngay);
    } else {
        $('.bd_HM').text('dd-mm-yyyy');
        $('.bd_KH').text('dd-mm-yyyy');
    }
    


}

function check_ngaysd() {
    if ($('.ngaymua').val() != '') {
        var ngaymua = $('.ngaymua').val().split('-');
        var ngaysd = $('.ngaysd').val().split('-');
        var mua = moment([ngaymua[2],ngaymua[1],ngaymua[0]]);
        var sd =  moment([ngaysd[2],ngaysd[1],ngaysd[0]]);
        if (sd >= mua) {
            $('.ngaysd').removeClass('error_input');
            $(".ngaysd_icon").css("display", "none");
            $(".error_ngaysd").text("");
            $(".error_ngaysd").css("display", "none");
            return true;
        } else {

            $('.ngaysd').addClass('error_input');
            $(".ngaysd_icon").css("display", "block");
            $(".error_ngaysd").text("Ngày sử dụng phải lớn hơn hoặc bằng ngày mua");
            $(".error_ngaysd").css("display", "block");
            return false;
        }
    }


}

function in_theTSCD() {
    var tents = $('.tents').val();
    var nuoc_sx = $('.nuoc_sx').val();
    var phong = $('#phongban option:selected').text();
    var nam_sx = $('.nsx').val();
    var nam_sd = $('.ngaysd').val().slice($('.ngaysd').val().lastIndexOf('-') + 1);
    var ngia = $('.ngia').val();
    $.ajax({
        url: '/taisan/in_the',
        method: 'post',
        data: {
            tents: tents,
            nuoc_sx: nuoc_sx,
            phong: phong,
            nam_sx: nam_sx,
            nam_sd: nam_sd,
            ngia: ngia
        },
        cache: false,
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 2) {
                    if (xhr.status == 200) {
                        xhr.responseType = "blob";
                    } else {
                        xhr.responseType = "text";
                    }
                }
            };
            return xhr;
        },
        success: function (data) {
            var filename = 'thetaisan.docx';
            var blob = new Blob([data], { type: "application/octet-stream" });

            //Check the Browser type and download the File.
            var isIE = false || !!document.documentMode;
            if (isIE) {
                window.navigator.msSaveBlob(blob, filename);
            } else {
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = $("<a />");
                a.attr("download", filename);
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
            }
        }

    });
}

function update_chitiet(id) {
    
    if (id != '') {
        $.ajax({
            url: '/chitiettaisan/edit/' + id,
            method: 'post',
            success: function (data) {
                $('#modal_chitiet').html(data);
                $(document).ready(function () {
                    $(".select").selectpicker();
                    $('#suachitiet').modal({
                        show: true,
                        backdrop: 'static'
                    });
                    var page = $('li.active span').text();
                    $('.page_chitiet').val(page);
                    
                
                });
            }
        });

    }
}

function show_modal_chitiet(id, ma_ts) {
    if (id != '') {
        $.ajax({
            url: '/taisan/modal_chitiet/' + id,
            method: 'post',
            data: { ma_ts: ma_ts },
            success: function (data) {
                $('#modal_chitietofts').html(data);
                $(document).ready(function () {
                    $(".select").selectpicker();
                    $('#suachitiet').modal({
                        show: true,
                        backdrop: 'static'
                    });
                    var page = $('li.active span').text();
                    $('.page_chitiet').val(page);
                });
            }
        });

    }
}

function loc_select(url, id, div) {
    if (url != '' && id != '') {
        $.ajax({
            url: '/bangiao/' + url,
            method: 'post',
            data: { id: id },
            success: function (data) {
                $(div).html(data);
                $(div).selectpicker('refresh');
            }
        });
    }
}




function check_inser_bangiao() {
    check('#nv_giao');
    check('#nv_nhan');
    check('.ngaygiao_lb');
    readURL(this, '#file_pdf', 'pdf');
    check('#phongnhan');
    check_ts_more('chitiet');
    check_trung_ts('chitiet');
    if (check('#phonggiao') && check('#nv_giao') && check('#nv_nhan') && check('.ngaygiao_lb') && check('#phongnhan') && readURL(this, '#file_pdf', 'pdf') && check_ts_more('chitiet') && check_trung_ts('chitiet')) {
        return true;
    }
    return false;
}
function check_ts_more(ten) {
    var sl = Number($('#so_tai_san').val());
    var kq = false;
    for (i = 1; i <= sl; i++) {
        if ($('#' + ten + i).val() == '') {
            $('.' + ten + i).addClass('error_input');
            $("." + ten + i + "_icon").css("display", "block");
            $(".error_" + ten + i).text("Vui lòng chọn tài sản");
            $(".error_" + ten + i).css("display", "block");
            kq = false;
        } else {
            kq = true;
        }
    }
    return kq;
}

function check_trung_ts(ten){
    var sl = Number($('#so_tai_san').val());
    var kq = false;
    if(sl ==1){
        kq = true;
    }else{
        for (i = 1; i <= sl; i++) {
            for(j=i+1;j<=sl;j++){
                if ($('#' + ten + i).val() == $('#' + ten + j).val() ) {
                    $('.' + ten + j).addClass('error_input');
                    $("." + ten + j + "_icon").css("display", "block");
                    $(".error_" + ten + j).text("Tài sản đã được chọn");
                    $(".error_" + ten + j).css("display", "block");
                    kq = false;
                } else {
                    // $('.' + ten + j).removeClass('error_input');
                    // $("." + ten + j + "_icon").css("display", "none");
                    // $(".error_" + ten + j).text("");
                    // $(".error_" + ten + j).css("display", "none");
                    kq = true;
                }
                
            }
        }
    }
    return kq;
}

function loc_nvOftaisan(id, div) {
    var ma_ts = $('' + id + ' option:selected').val();
    if (ma_ts != "") {
        $.ajax({
            url: '/chitiettaisan/loc_nv',
            method: 'post',
            data: { ma_ts: ma_ts },
            success: function (data) {
                $(div).html(data);
                $(div).selectpicker('refresh');
            }
        });
    }
}

function xuat_excel_ts() {
    var ma_phong = $('#phong option:selected').val();
        $.ajax({
            url: '/taisan/excel',
            method: 'post',
            data: { ma_phong: ma_phong },
            cache: false,
            xhr: function () {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 2) {
                        if (xhr.status == 200) {
                            xhr.responseType = "blob";
                        } else {
                            xhr.responseType = "text";
                        }
                    }
                };
                return xhr;
            },
            success: function (data) {
                var filename = 'taisan.xlsx';
                var blob = new Blob([data], { type: "application/octet-stream" });
    
                //Check the Browser type and download the File.
                var isIE = false || !!document.documentMode;
                if (isIE) {
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var url = window.URL || window.webkitURL;
                    link = url.createObjectURL(blob);
                    var a = $("<a />");
                    a.attr("download", filename);
                    a.attr("href", link);
                    $("body").append(a);
                    a[0].click();
                    $("body").remove(a);
                }
            }
        });
}


//js sua phong
function update_phongban(id) {
    $.ajax({
        url: '/phongban/' + id + '/edit',
        method: 'get',
        success: function (data) {
            $('#modal_phongban').html(data);
            $('#update_phongban').modal('show');
            $(document).ready(function () {
                $(".select").selectpicker();
            });
        }
    });
}
//sua nhan vien
function update_nv(id) {
    $.ajax({
        url: '/nhanvien/' + id + '/edit',
        method: 'get',
        success: function (data) {
            $('#modal_nhanvien').html(data);
            $('#update_nhanvien').modal({
                show:true,
                backdrop: 'static',
            });
            $(document).ready(function () {
                $(".select").selectpicker();
            });
        }
    });
}
//update ncc
function update_ncc(id) {
    $.ajax({
        url: '/nhacungcap/' + id + '/edit',
        method: 'get',
        success: function (data) {
            $('#modal_ncc').html(data);
            $('#update_ncc').modal({
                show:true,
                backdrop:'static',
            });
            $(document).ready(function () {
                $(".select").selectpicker();
            });
        }
    });
}

function search_phong(){
    var text = $('#search').val();
    $.ajax({
        url: '/phongban/search',
        method: 'post',
        data:{
            text :text,
        },
        success: function(data){
            $('#list_phong').html(data);
        }
    });
}
function search_nhanvien(page){
    var text = $('#search').val();
    var seleted = $('#phong option:selected').val();
    $.ajax({
        url:'/nhanvien/search?page='+page,
        method :'post',
        data:{
            text:text,
            seleted:seleted
        },
        success:function(data){
            $('#list_nhanvien').html(data);
        }
    });
}
function search_ncc(){
    var text = $('#search').val();
    $.ajax({
        url:'/nhacungcap/search',
        method :'post',
        data:{
            text:text,
        },
        success:function(data){
            $('#list_nhacungcap').html(data);
        }
    });
}
function khau_hao(){
    var tgsd =$('.tgSD').text();
    var ngia = $('.ngia').val();
    var tgsdconlai = $('.tgSD_conlai_HM').text();
    var hm = $('.giatri_HM').text();
    if(tgsd !=undefined){
        tgkh = Number(tgsd)*12;
        $('.tg_KH').text(tgkh);
        if(ngia !=undefined && tgsdconlai !=undefined && hm !=undefined){
            var giatriconlai = ngia-(tgsd-tgsdconlai)*hm
            giatri_kh=Math.round(Number(ngia)/tgkh);
            $('.giatri_KH_thang').text(giatri_kh);
            $('.giatri_KH').text(ngia);
            $('.tg_KH_conlai').text(tgsdconlai*12);
            $('.conlai').text(giatriconlai);
        }else{
            $('.giatri_KH').text('0');
            $('.tg_KH_conlai').text('0');
            $('.conlai').text('0');
        }
        
    }
    
    
    
}

function list_ts_kiemke(){
    var ma_phong = $('#phongban option:selected').val();
        $.ajax({
            url: '/kiemke/list_taisan',
            method:'post',
            data:{ma_phong:ma_phong},
            success:function(data){
                $('#list_taisan_kiemke').html(data);
            }
        });
}

function loc_cv_nv(url,ma_nv,div){
    $.ajax({
        url: url,
        method: 'post',
        data:{ma_nv:ma_nv},
        success:function(data){
            $(div).val(data);
        }
    });
}

function check_inser_kiemke(){
    check('#nv_kk_1_lb');
    check('#nv_kk_2_lb');
    check('#nv_kk_3_lb');
    check('#phongban');
    check('.ngaykk_lb') ;
    check('.dot_kk_lb');
    if(check('#nv_kk_1_lb') && check('#nv_kk_2_lb') && check('#nv_kk_3_lb') && check('#phongban') && check('.ngaykk_lb') && check('.dot_kk_lb')){
        return true;
    }
    return false;
}

function tru_sl_kiemke(val,id){
    var sl = Number(val) - Number($('#soluong_ht'+id).text());
    console.log(sl);
    if(sl < 0){
        $('#soluong'+id).css('color','red');
    }else{
        $('#soluong'+id).css('color','black');
    }
    $('#soluong'+id).text(sl);
}

function check_export_ds_kiemke(){
    check('#phongban');
    if(check('#phongban')){
        var ma_phong =$('#phongban option:selected').val();
        location.href ='/kiemke/export_ds/'+ma_phong;
    }
}

function search_hopdong(page) {
    var text = $('#search').val();
    var seleted = $('#ncc option:selected').val();
    $.ajax({

        url: '/hopdong/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
        },
        success: function (data) {
            $('#list_hopdong').html(data);
        }
    });
}