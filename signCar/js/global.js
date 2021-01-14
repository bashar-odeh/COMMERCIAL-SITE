// (function($) {
//     'use strict';
//     /*==================================================================
//         [ Daterangepicker ]*/
//     try {
//         $('.js-datepicker').daterangepicker({
//             "singleDatePicker": true,
//             "showDropdowns": true,
//             "autoUpdateInput": false,
//             locale: {
//                 format: 'DD/MM/YYYY'
//             },
//         });

//         var myCalendar = $('.js-datepicker');
//         var isClick = 0;

//         $(window).on('click', function() {
//             isClick = 0;
//         });

//         $(myCalendar).on('apply.daterangepicker', function(ev, picker) {
//             isClick = 0;
//             $(this).val(picker.startDate.format('DD/MM/YYYY'));

//         });

//         $('.js-btn-calendar').on('click', function(e) {
//             e.stopPropagation();

//             if (isClick === 1) isClick = 0;
//             else if (isClick === 0) isClick = 1;

//             if (isClick === 1) {
//                 myCalendar.focus();
//             }
//         });

//         $(myCalendar).on('click', function(e) {
//             e.stopPropagation();
//             isClick = 1;
//         });

//         $('.daterangepicker').on('click', function(e) {
//             e.stopPropagation();
//         });


//     } catch (er) { console.log(er); }
//     /*[ Select 2 Config ]
//         ===========================================================*/

//     try {
//         var selectSimple = $('.js-select-simple');

//         selectSimple.each(function() {
//             var that = $(this);
//             var selectBox = that.find('select');
//             var selectDropdown = that.find('.select-dropdown');
//             selectBox.select2({
//                 dropdownParent: selectDropdown
//             });
//         });

//     } catch (err) {
//         console.log(err);
//     }


// })(jQuery);

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         console.log(input.files);
//         console.log(input.files[0]);
//         var reader = new FileReader();

//         console.log("hi");
//         reader.onload = function(e) {
//             $('#blah')
//                 .attr('src', e.target.result)
//                 .width(150)
//                 .height(200);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }

function previewFile() {
    var file = document.querySelector('#photo1').files;
    var inputfile = document.querySelectorAll('.input-group');
    console.log(file);
    console.log(inputfile);
    for (element of file) {


        var preview = document.createElement('img');

        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            console.log(preview.src);
        }
        console.log(1);
        reader.readAsDataURL(element);
        inputfile[5].append(preview);


    }

}



// document.querySelector('#photo1-mul').onchange = function() {
//     var preview = document.querySelector('#preview1');
//     [].forEach.call(this.files, function(file) {

//         if (/image\/.*/.test(file.type)) { // use any image format the browser can read
//             var img = new Image;

//             img.onload = remURL; // to remove Object-URL after use
//             img.style.height = "75px"; // use style, "width" defaults to "auto"

//             img.src = (URL || webkitURL).createObjectURL(file);
//             preview.appendChild(img); // add image to preview container
//             console.log(img.src);
//         }
//     });

//     function remURL() {
//         (URL || webkitURL).revokeObjectURL(this.src)
//     }
// };
// document.querySelector('#photo1').onchange = function() {
//     var preview = document.querySelector('#preview');
//     console.log(this.files);
//     [].forEach.call(this.files, function(file) {

//         if (/image\/.*/.test(file.type)) { // use any image format the browser can read
//             var img = new Image;

//             img.onload = remURL; // to remove Object-URL after use
//             img.style.height = "75px"; // use style, "width" defaults to "auto"

//             img.src = (URL || webkitURL).createObjectURL(file);
//             preview.appendChild(img); // add image to preview container
//         }
//     });

//     function remURL() {
//         (URL || webkitURL).revokeObjectURL(this.src)
//     }
// };