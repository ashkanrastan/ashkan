
<?php require('ink.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <script src="public/js/jquery-3.0.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <meta charset="utf-8">
    <title>جدول با قابلیت افزودن سطر</title>


    
            <script>


            function Total() {
    var sum = 0;
    $('.debit').each(function () {
        var debitVal = +$(this).val().replace(/,/g, '');
        console.log("Debit value: ", debitVal);
        sum += debitVal;
    });
    console.log("Total sum: ", sum);
    $('#total_sum').html(addCommas(sum));

    var dis = 0;
    $('.credit').each(function () {
        var creditVal = +$(this).val().replace(/,/g, '');
        console.log("Credit value: ", creditVal);
        dis += creditVal;
    });
    console.log("Total discount: ", dis);
    $('#total_discount').html(addCommas(dis));

    var debit1 = 0;
    $('.debit').each(function () {
        var debitVal1 = +$(this).val().replace(/,/g, '');
        console.log("Debit value (second time): ", debitVal1);
        debit1 += debitVal1;
    });
    console.log("Total_debit: ", debit1);
    $('#total_debit').html(addCommas(debit1));
}



$(document).ready(function () {

              
Total();
});

function addCommas(x) {
var parts = x.toString().split(".");
parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
return parts.join(".");
}



$(document).on('change paste keyup', '.x', function (event) {
if (event.which >= 37 && event.which <= 40) return;
$(this).val(function (index, value) {
    return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        ;
});
});




// این تابع مقادیر تمام سلول‌های با کلاس debit را جمع می‌کند و نتیجه را در تگ span با id total_debit قرار می‌دهد.


window.onload = function () {
            var elements = document.getElementsByClassName("cls");
            for (var i = 0; i < elements.length; i++) {
                elements[i].value = "";
            }
        }
        $(document).ready(function () {
            function refreshRowNumber() {
                $('#tbl-2 tr:not(:last-child)').each(function () {
                    var index = $(this).index() + 1;
                    $(this).find('td:first-child').text(index);
                });
            }


            $(document).ready(function () {
                $('#tbl-2 tr:first-child td:eq(3) input').val('');

                $('#tbl-2').on('keydown', 'tr:nth-last-child(2) td:nth-child(8) input', function (e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();

                        var currentRow = $(this).closest('tr');
                        var newRow = currentRow.clone();
                        newRow.find('input').val('');
                        newRow.find('td:last-child').html('<button class="remove-row">-</button>');
                        newRow.find('td:first-child').html($('#tbl-2 tr').length - 1);
                        currentRow.after(newRow);
                        refreshRowNumber();
                    }
                });


                $('#myForm').submit(function (e) {
                    e.preventDefault();

                    // اجرای کدهای خودتان

                    this.submit();
                });
            });


            // Add event listener to remove row button
            $('#tbl-2').on('click', '.remove-row', function () {
                var currentRow = $(this).closest('tr');
                currentRow.remove();
                refreshRowNumber();
            });

            $('#tbl-2').on('input', '.input-value', function () {
                // recalculate sum when an input value changes
                refreshSum();
            });
            $('#tbl-2').on('click', '.remove-row', function () {
                // remove the row and then recalculate the sum
                $(this).closest('tr').remove();
                refreshSum();
            });
        });


        $(document).ready(function () {
            var addRows = function (numberOfRows) {
                var table = $('#tbl-2'); // جدول مورد نظر

                var currentRow = table.find('tr:nth-last-child(2)'); // سطر قبل از آخرین سطر جدول

                for (var i = 0; i < numberOfRows; i++) {
                    var newRow = currentRow.clone(); // کپی کردن سطر فعلی
                    newRow.find('input').val(''); // خالی کردن مقادیر ورودی در سطر جدید
                    newRow.find('td:last-child').html('<button class="remove-row">-</button>'); // اضافه کردن دکمه حذف به سطر جدید
                    newRow.find('td:first-child').html(table.find('tr').length - 1); // تنظیم شماره سطر جدید
                    currentRow.after(newRow); // اضافه کردن سطر جدید پس از سطر فعلی
                    currentRow = newRow; // سطر فعلی را به سطر جدید تغییر می‌دهیم
                }

                refreshRowNumber();
            };

          
        });
        <?php

        ?>

    </script>

    <script type="text/javascript">


        $(document).ready(function () {
            $(document).on('keyup', '.mocode', function () {
                const inp = $(this);
                $.ajax({
                    url: "ink.php",
                    method: "POST",
                    data: "code3=" + $(this).val(),
                    success: function (res) {
                        var name = res
                        
                        inp.parent('td').next('td').find('.moname').val(name);
                       

                    },
                    /*error: function(res) {
                        console.log(res)
                    }*/
                })
            })
        });

        
        $(document).ready(function () {
            $(document).on('keyup', '.tacode', function () {
                const inp = $(this);
                $.ajax({
                    url: "ink.php",
                    method: "POST",
                    data: "code4=" + $(this).val(),
                    success: function (res) {
                        var name = res
                        
                        inp.parent('td').next('td').find('.taname').val(name);
                       

                    },
                    /*error: function(res) {
                        console.log(res)
                    }*/
                })
            })
        });
       


       






    </script>

    <style>
        #tbl-2 {
            border-collapse: collapse;
            width: 1900px;
           
            direction: rtl;
            margin: 0 auto;
            margin-top: 50px;
        }

        #tbl-2 th, td {
            text-align: center;
            padding: 8px;
            font-size: 16px;
        }

        #tbl-2 th {
            background-color: #4CAF50;
            color: white;
        }

        #tbl-2 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tbl-2 input[type=text], input[type=number] {
            width: 100%;
            padding: 6px 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        #tbl-2 input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        #tbl-2 input[type=submit]:hover {
            background-color: #45a049;
        }

        #tbl-2 tr td:nth-child(1) {
            width: 75px;

        }

        #tbl-2 tr td:nth-child(2) {
            width: 100px;
        }

        #tbl-2 tr td:nth-child(4) {
            width: 100px;
        }

        #tbl-2 tr td:nth-child(5) {
            width: 280px;
        }

        #tbl-2 tr td:nth-child(6) {
            width: 466px;
        }

        #tbl-2 tr td:nth-child(3) {
            width: 280px;
        }

        #tbl-2 tr td:nth-child(7) {
            width: 188px;
        }

        @media screen and (min-width: 768px) {
            table {
                font-size: 20px;
                margin-top: 100px;
            }

            #tbl-2 th, td {
                font-size: 20px;
                padding: 12px;
            }

            #tbl-2 input[type=text], input[type=number] {
                font-size: 20px;
            }

            #tbl-2 input[type=submit] {
                font-size: 20px;
            }
        }

        @media screen and (min-width: 1200px) {
            table {
                font-size: 24px;
                margin-top: 150px;
            }

            #tbl-2 th, td {
                font-size: 18px;
                padding: 12px;
            }

            #tbl-2 input[type="number"]::-webkit-inner-spin-button,
            #tbl-2 input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            #tbl-2 input[type="number"] {
                -moz-appearance: textfield;
            }

            .btn {
                width: 180px;
                height: 60px;
                background: #31b0d5;
                display: flex;
                justify-content: center;
                float: right;
                margin-bottom: 15px;
                margin-top: 10px;
                margin-right: 189px;
                font-size: 18pt;
                font-family: yekan;
                font-weight: bold;
            }
        }
    </style>
    <style>
        .remove-row {
            width: 20px;
            height: 20px;
            font-size: 8px;
        }
    </style>
    <style>

        #tbl-1 td {
            font-family: yekan;

        }

        #tbl-1 {
            width: 1600px;
            border-collapse: collapse;
            direction: rtl;
            margin: 0 auto;
            margin-top: 100px;
            border: none;
        }

        #tbl-1 td,
        #tbl-1 th {
            border: none;
        }

        #tbl-1 td,
        #tbl-1 th,
        #tbl-1 tbody,
        #tbl-1 thead,
        #tbl-1 tr {
            border: none !important;
        }

        #tbl-1 td {
            border: 1px solid black;
            width: 25%;
            text-align: center;
            padding: 10px;
        }

        #tbl-1 tr:first-child {
            background-color: #90EE90;
        }

        #tbl-1 input {
            border-radius: 5px;
            font-size: 18px;
            width: 77%;
            height: 100%;
            font-size: 18px;
        }

        #tbl-1 tr:nth-child(2) td:nth-child(2) input {

            height: 40px;
            width: 160px;

        }

        #tbl-1 tr:nth-child(2) td:nth-child(4) input {

            height: 40px;
            width: 50px;

        }

        #tbl-1 tr:nth-child(2) td:nth-child(4) img {

            height: 29px;
            width: 34px;

        }

        #tbl-1 tr:nth-child(2) td:nth-child(4) img:nth-child(2) {

            position: relative;
            top: 20px;
            left: -27px;

        }

      

        #tbl-1 tr:nth-child(2) td:nth-child(4) img:nth-child(1) {

            position: relative;
            top: -8px;
            left: -66px;

        }

        #tbl-1 tr:nth-child(2) td:nth-child(4) img:nth-child(3) {

            position: relative;
            top: 20px;
            left: -94px;

        }

        #tbl-1 tr:nth-child(3) td:nth-child(2) input {

            height: 40px;
            width: 160px;

        }

        #tbl-1 tr:nth-child(3) td:nth-child(3) input {

            height: 40px;
            width: 520px;
            float: left;

        }

        #tbl-1 tr:nth-child(4) td:nth-child(2) input {

            height: 40px;
            width: 940px;
            left: -40px;

        }

        #tbl-1 tr:nth-child(4) td:nth-child(4) input {

            height: 40px;
            width: 200px;

        }

        #tbl-1 tr:nth-child(5) td:nth-child(2) input {

            height: 40px;
            width: 950px;

        }

        #tbl-1 {
            font-size: 22px;
            font-family: yekan;
        }

        #tbl-1 tr:first-child {
            height: 80px;
        }

        #tbl-1 {
            font-family: yekan;
        }

        #tbl-1, th, td {
            border: none;
        }

        #dcode {
            width: 190px;
            height: 50px;

            font-size: 16pt;
            position: relative;
            left: -31px;
            border: 1px solid;
            border-radius: 5px;
        }

        #tell {
            width: 190px;
            height: 50px;

            font-size: 11pt;
            position: relative;
            left: 3px;
            border: 1px solid;
            border-radius: 5px;
        }

        #adress {
            width: 900px;
            height: 40px;

            font-size: 11pt;
            position: relative;
            left: -45px;
            border: 1px solid;
            border-radius: 5px;
        }
    </style>
    
    <script>
      
    </script>

</head>
<body>
<form action="action.php" method="post" id="myForm1">

    <input class="btn" type="submit" name="submitAction" value="ثبت">
    <input class="btn" type="submit" name="submitAction" value="بازیابی">
    <input class="btn" type="submit" name="submitAction" value="حذف">
    <input class="btn" type="submit" name="submitAction" value="بروزرسانی">

    <table id="tbl-1">
        <tr>
            <td colspan="4" style="font-family: yekan">سند حسابداری </td>


        </tr>
        <tr>
            <td>شماره سند </td>
            <td><input type="text" name="fnum" autocomplete="off"></td>
            <td>ستون تاریخ</td>
            <td><img src="public/pic/orderdetailsclose.png" id="increaseButton1" alt="Increase"> <img
                    src="public/pic/orderdetailsopen.png" id="decrease1"><img
                    src="public/pic/orderdetailsopen.png" id="decrease2"><input type="text" placeholder="day"
                                                                                id="inputday" name="inputday"

                                                                                value="

<?php
                                                                                $query = "SELECT day1 FROM recent WHERE id=1";
                                                                                $result = $conn->query($query);
                                                                                if ($result->num_rows > 0) {
                                                                                    while ($row = $result->fetch_assoc()) {
                                                                                        echo $row['day1'];
                                                                                    }
                                                                                } else {
                                                                                    echo "day22";
                                                                                }


                                                                                ?>




"

                                                                                style="margin-left: 5px; "><img
                    src="public/pic/orderdetailsclose.png" id="increaseButton2"
                    style="position: relative;top: -8px ;right: -2px"> <input
                    type="text" placeholder="moon" style="margin-left: 5px" id="inputmoona" name="inputmoon" value="

<?php
                $query = "SELECT moon FROM recent WHERE id=1";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['moon'];
                    }
                } else {
                    echo "moon";
                }


                ?>

"
                ><input type="text" value="

<?php


                $query_yare = "SELECT year FROM info WHERE id=1";
                $result1_yare = $conn->query($query_yare);
                if ($result1_yare->num_rows > 0) {
                    while ($row_yare = $result1_yare->fetch_assoc()) {
                        echo $row_yare['year'];
                    }
                } else {
                    echo "year";
                }


                ?>









" readonly name="inputyear"></td>


        </tr>
        <tr>



        </tr>

        <tr>
            <td>توضیحات سند </td>
            <td colspan="3"><input id="adress" style="height: 50px" name="adress"></td>

        </tr>
    </table>


    <table id="tbl-2">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>کدمعین</th>
            <th>شرح معین </th>
            <th>کد تفصیل</th>
            <th>شرح تفصیل </th>
            <th>شرح سند </th>
            <th>بدهکار</th>
            <th>بستانکار</th>

            <th>s</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td><input type="text" name="row[]" value="1" class="ppn" style="text-align: center" readonly></td>
            <td><input type="text" name="mocode[]" class="cls mocode" autocomplete="off"></td>
            <td><input type="text" name="moname[]" class="moname" readonly></td>
            <td><input type="text" name="tacode[]" class="cls tacode" value="1" autocomplete="off"></td>
            <td><input type="text" name="taname[]" class="cls taname x" readonly></td>
            <td><input type="text" name="des[]" class="cls des" readonly></td>
            <td><input type="text" name="debit[]" class="cls debit x"></td>
            <td><input type="text" name="credit[]" class="cls cerdit x" ></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>جمع کل <span id="total_sum">0</span></td>
            <td>جمع بدهکار<span id="total_debit"></span></td>
            <td> جمع بستانکار </td> <span id="total_amount">0</span></td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>

<script>

    document.getElementById("increaseButton2").addEventListener("click", function () {
        var inputBox = document.getElementById("inputmoona");
        var currentValue = parseInt(inputmoona.value, 10);
        var newValue = currentValue + 1;
        if (newValue > 12) {
            newValue = 1;
        }

        var formattedValue = ("0" + newValue).slice(-2);
        inputmoona.value = formattedValue;
    });

    document.getElementById("decrease2").addEventListener("click", function () {
        var inputmoona = document.getElementById("inputmoona");
        var currentValue = parseInt(inputmoona.value, 10);
        var newValue = currentValue - 1;

        if (newValue < 1) {
            newValue = 12;
        }

        var formattedValue = ("0" + newValue).slice(-2);
        inputmoona.value = formattedValue;
    });

    document.getElementById("increaseButton1").addEventListener("click", function () {
        var inputBox = document.getElementById("inputday");
        var currentValue = parseInt(inputday.value, 10);
        var newValue = currentValue + 1;
        if (newValue > 31) {
            newValue = 1;
        }

        var formattedValue = ("0" + newValue).slice(-2);
        inputday.value = formattedValue;
    });


    document.getElementById("decrease1").addEventListener("click", function () {
        var inputday = document.getElementById("inputday");
        var currentValue = parseInt(inputday.value, 10);
        var newValue = currentValue - 1;
        if (newValue < 1) {
            newValue = 31;
        }

        var formattedValue = ("0" + newValue).slice(-2);
        inputday.value = formattedValue;
    });


</script>