$(document).ready(function () {

//Balance wallet
        $(".modal-open").on("click", function (e) {
            $(".modal").show();
        });

        // close modal
        $(document).on("click", ".modal-close", function (e) {
            $(".modal").hide();
            clearModal();
        });


// Cədvəlin sətrlərini tutub sürüşdürməyə imkan veir
        $(".sortable").sortable();
    /*
            // Yadda saxlama əməliyyatı

            $(".card").find("#save").click(function () {

                swal({
                    title: "Təbriklər !",
                    text: "Əməliyyat uğurla yerinə yetirildi !",
                    icon: "success",
                });

            });

        */


//Data picker
        /*    $('#default-datepicker').datepicker({
                todayHighlight: true
            });
            $('#autoclose-datepicker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            $('#inline-datepicker').datepicker({
                todayHighlight: true
            });

            $('#dateragne-picker .input-daterange').datepicker({});

        */
//multi select and multiple select boxes
        /*
           $(document).ready(function () {
               $('.single-select').select2();

               $('.multiple-select').select2();

               //multiselect start

               $('#my_multi_select1').multiSelect();
               $('#my_multi_select2').multiSelect({
                   selectableOptgroup: true
               });

               $('#my_multi_select3').multiSelect({
                   selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                   selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                   afterInit: function (ms) {
                       var that = this,
                           $selectableSearch = that.$selectableUl.prev(),
                           $selectionSearch = that.$selectionUl.prev(),
                           selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                           selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                       that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                           .on('keydown', function (e) {
                               if (e.which === 40) {
                                   that.$selectableUl.focus();
                                   return false;
                               }
                           });

                       that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                           .on('keydown', function (e) {
                               if (e.which == 40) {
                                   that.$selectionUl.focus();
                                   return false;
                               }
                           });
                   },
                   afterSelect: function () {
                       this.qs1.cache();
                       this.qs2.cache();
                   },
                   afterDeselect: function () {
                       this.qs1.cache();
                       this.qs2.cache();
                   }
               });

               $('.custom-header').multiSelect({
                   selectableHeader: "<div class='custom-header'>Selectable items</div>",
                   selectionHeader: "<div class='custom-header'>Selection items</div>",
                   selectableFooter: "<div class='custom-header'>Selectable footer</div>",
                   selectionFooter: "<div class='custom-header'>Selection footer</div>"
               });


           });
       */

// bootstrapSwitch
        $(".bt-switch .my_check").bootstrapSwitch();
        var radioswitch = function () {
            var bt = function () {
                $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }), $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }), $(".radio-switch").on("switch-change", function () {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
            };
            return {
                init: function () {
                    bt()
                }
            }
        }();
        $(document).ready(function () {
            radioswitch.init()
        });
        //Switchery Js
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });

        $('#inline-datepicker').datepicker({
            todayHighlight: true
        });

        $('#dateragne-picker .input-daterange').datepicker({});


        //lightgallery start
        /*
        $(document).ready(function() {
            $(".lightgallery").lightGallery();
            $('#ul-li').lightGallery();
        });
            */





});
