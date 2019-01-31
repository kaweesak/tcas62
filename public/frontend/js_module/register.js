function dateCheck(from, to, check) {

    var fDate, lDate, cDate;
    fDate = Date.parse(from);
    lDate = Date.parse(to);
    cDate = Date.parse(check);

    if ((cDate <= lDate && cDate >= fDate)) {
        return true;
    }
    return false;
}

function dateCheckMax(to, check) {

    var lDate, cDate;
    //fDate = Date.parse(from);
    lDate = Date.parse(to);
    cDate = Date.parse(check);

    if ((cDate >= lDate)) {
        return true;
    }
    return false;
}

function goto_link(x) {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    var h1 = today.getTime();
    var xurl = 'https://bit.ly/2m4jZz1';

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }
    console.log(today);
    //today = mm + '/' + dd + '/' + yyyy + ' '+h1;
    //console.log(today);
    if (x === 1) {
        if (dateCheck("12/01/2018", "12/15/2018", today)) { //mm/dd/yyyy
            window.location = xurl; //change link to regis website
        } else {
            if (dateCheckMax("12/15/2018", today)) {
                swal('ปิดรับสมัคร!', '').catch(swal.noop);
            } else {
                swal('เปิดรับสมัคร!', 'วันที่ 1 - 15  ธันวาคม 2561', 'info').catch(swal.noop);
            }
        }
    }
    if (x === 2) {
        if (dateCheck("02/02/2019", "03/05/2019", today)) { //mm/dd/yyyy
            window.location = xurl; //change link to regis website
        } else {

            if (dateCheckMax("03/05/2019", today)) { //mm/dd/yyyy
                swal('ปิดรับสมัคร!', '').catch(swal.noop);
            } else {
                swal('เปิดรับสมัคร!', 'วันที่ 4 กุมภาพันธ์ - 23 มีนาคม 2562', 'info').catch(swal.noop);
            }
        }
    }
    if (x === 3) {
        if (dateCheck("04/17/2019", "04/29/2019", today)) { //mm/dd/yyyy
            window.location = xurl; //change link to regis website
        } else {
            if (dateCheckMax("04/29/2019", today)) {
                swal('ปิดรับสมัคร!', '').catch(swal.noop);
            } else {
                swal('เปิดรับสมัคร!', 'วันที่ 4 - 29 เมษายน 2562', 'info').catch(swal.noop);
            }
        }
    }
    if (x === 4) {
        if (dateCheck("05/09/2019", "05/19/2019", today)) { //mm/dd/yyyy
            window.location = xurl; //change link to regis website
        } else {
            if (dateCheckMax("05/19/2019", today)) {
                swal('ปิดรับสมัคร!', '').catch(swal.noop);
            } else {
                swal('เปิดรับสมัคร!', 'วันที่ 9 - 19 พฤษภาคม 2562', 'info').catch(swal.noop);
            }
        }
    }
    if (x === 5) {
        if (dateCheck("05/30/2019", "06/10/2019", today)) { //mm/dd/yyyy
            window.location = xurl; //change link to regis website
        } else {
            if (dateCheckMax("06/10/2019", today)) {
                swal('ปิดรับสมัคร!', '').catch(swal.noop);
            } else {
                swal('เปิดรับสมัคร!', 'วันที่ 30 พฤษภาคม - 10 มิถุนายน 2562', 'info').catch(swal.noop);
            }
        }
    }

    /* if (x === 4) {
         swal({

             text: "หากมหาวิทยาลัยตรวจพบว่า ผู้สมัครสอบในรอบที่ 5 รับตรงอิสระ ได้ยืนยันสิทธิ์เข้าศึกษาในสถาบันอุดมศึกษาอื่นแล้ว ขอสงวนสิทธิ์การคืนเงินทุกประการ และผู้สมัครจะไม่มีสิทธิ์เข้าสอบสัมภาษณ์กับทางมหาวิทยาลัยสวนดุสิตในวันเวลาที่กำหนด",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'สมัครเรียน'
         }).then(function() {
             window.location.href = 'https://bit.ly/2m4jZz1';

         });

     }
     if (x === 5) {
         if (dateCheck("12/01/2017", "02/28/2018", today)) //mm/dd/yyyy
             window.location = xurl; //change link to regis website
         else
             swal('เปิดรับสมัคร!', 'วันที่ 1 ธันวาคม 2560 เป็นต้นไป', 'info').catch(swal.noop);
     }
     if (x === 99) {
         if (dateCheckMax("07/30/2018 08:00:00", today)) //mm/dd/yyyy
             window.location = 'https://goo.gl/ifCgDG'; //change link to regis website
         else
             swal('ประกาศรายชื่อผู้มีสิทธิ์รายงานตัวเข้าศึกษา!', 'วันที่ 30 กรกฎาคม 2561', 'info').catch(swal.noop);
     }
     if (x === 90) {
         if (dateCheckMax("07/30/2018 08:00:00", today)) //mm/dd/yyyy
             window.location = 'https://goo.gl/ifCgDG'; //change link to regis website
         else
             swal('พิมพ์ใบชำระค่ายืนยันสิทธิ์ ', 'วันที่ 30 กรกฎาคม – 2 สิงหาคม 2561', 'info').catch(swal.noop);
     }
     if (x === 91) {
         if (dateCheckMax("07/30/2018 08:00:00", today)) //mm/dd/yyyy
             window.location = 'https://goo.gl/ZRwhDp'; //change link to regis website
         else
             swal('บันทึกประวัติ ', 'วันที่ 2 - 4 สิงหาคม 2561', 'info').catch(swal.noop);
     }*/
}