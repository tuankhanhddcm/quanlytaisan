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

    $('.select-loaisp').click(function(){
        search_phieubangiao(1);
    });

    $('.loaits-select').click(function () {
        check('#loaits');
        hao_mon();
    });

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
        show_modal_chitiet(id);
    });
    $(document).on('click', '.btn_modal_chitiet', function () {
        var id = $(this).data('id');
        var ma_ts = $(this).data('ma_ts');
        show_modal_chitiet(id, ma_ts);
    });


    $('.ngia').change(function () {
        var ngia = $(this).val();
        var hm = $('.tile_HM').text();
        var giatri = Number(ngia) * (Number(hm) / 100);
        if (giatri) {
            $('.giatri_HM').text(giatri);
        } else {
            $('.giatri_HM').text('0');
        }

    });

    $('#so_tai_san').change(function () {
        var sl = Number($(this).val());
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


    // lọc select------------------
    $('.select-phonggiao').click(function () {
        loc_select('loc_nv', $('.select-phonggiao option:selected').val(), '#nv_giao');
        loc_select('loc_ts', $('.select-phonggiao option:selected').val(), '#ts');
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

    $('.select-phongnhan').click(function () {
        loc_select('loc_nv', $('.select-phongnhan option:selected').val(), '#nv_nhan');
    });

    $(document).on('click', '.select-ts', function () {
        var sl = Number($('#so_tai_san').val());
        if (sl > 1) {
            for (i = 1; i <= sl; i++)
                loc_select('loc_chitiet', $('#ts' + i + ' option:selected').val(), '#chitiet' + i);
        } else {
            loc_select('loc_chitiet', $('#ts1 option:selected').val(), '#chitiet1');
        }
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
    $.ajax({

        url: '/taisan/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
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

function search_chitiet(page) {
    var text = $('#search').val();
    var seleted = $('#taisan option:selected').val();
    $.ajax({

        url: '/chitiettaisan/search?page=' + page,
        method: "post",
        data: {
            text: text,
            seleted: seleted,
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
                kq = true;
            } else {
                $(".error_" + id).text('File không hợp lệ');
                $('.' + id + "_icon").css('display', 'block');
            }
        } else {
            $('.text_name_file').text(files.name);
            if (type == match[0] || type == match[2]) {
                $('.' + id + "_icon").css('display', 'none');
                $(".error_" + id).text('');
                kq = true;
            } else {
                $(".error_" + id).text('File không hợp lệ');
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
    check('#file_pdf')
    if (check('.title_lb') && check('#file_temp') && check('#file_pdf') && check('.mota_lb'))
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
    if (check('.tents_lb') && check('#loaits') && check('.sl_lb') && check('#phongban')
        && check('.so_hieu_lb') && check('.nsx_lb') && check('#ncc') && check('.nuoc_sx_lb')
        && check('.ngaymua_lb') && check('.ngaytang_lb') && check('.ngaysd_lb') && check('.ngia_lb')
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
            $('#updateTSCD').modal('show');
            $(document).ready(function () {
                $(".select").selectpicker();
            });
        }
    });
}

// thông tin hao mòn
function hao_mon() {
    var id = $('.loaits-select option:selected').val()
    if (id != '') {
        $.ajax({
            url: '/tieuhao/find',
            method: "post",
            data: { ma_loai: id },
            dataType: 'json',
            success: function (data) {
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
                    $('#suachitiet').modal('show');
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
                    $('#suachitiet').modal('show');
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


function tinh_nam_HM(val) {
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

function check_inser_bangiao() {
    check('#nv_giao');
    check('#nv_nhan');
    check('.ngaygiao_lb');
    readURL(this, '#file_pdf', 'pdf');
    check('#phongnhan');
    check_ts_more('ts');
    check_ts_more('chitiet');
    if (check('#phonggiao') && check('#nv_giao') && check('#nv_nhan') && check('.ngaygiao_lb') && check('#phongnhan') && readURL(this, '#file_pdf', 'pdf') && check_ts_more('ts') && check_ts_more('chitiet')) {
       return true;
    }
    return false;
}
function check_ts_more(ten) {
    var sl = Number($('#so_tai_san').val());
    var kq = false;
    for (i = 1; i <= sl; i++) {
        if ($('#'+ten+i).val() == '') {
            $('.'+ten + i).addClass('error_input');
            $("."+ten + i + "_icon").css("display", "block");
            $(".error_"+ten + i).text("Vui lòng chọn tài sản");
            $(".error_"+ten + i).css("display", "block");
            kq = false;
        }else{
            kq = true;
        }
    }
    return kq;
}