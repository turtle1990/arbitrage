$(document).ready(function() {

    var columnDefs = [
    {
    data: "ID",
    title: "ID",
    type: "readonly",
    visible: false
    },
    {
    data: "SCORE",
    title: "SCORE",
    },
    {
    data: "EXCHANGE_NAME",
    title: "EXCHANGE_NAME",
    type: "readonly"
    },
    {
    data: "RIAL",
    title: "RIAL"
    },
    {
    data: "USDT",
    title: "USDT"
    },
    {
    data: "XRP",
    title: "XRP"
    },
    {
    data: "DOT",
    title: "DOT"
    },
    {
    data: "DOGE",
    title: "DOGE"
    },
    {
    data: "XLM",
    title: "XLM"
    },
    {
    data: "EOS",
    title: "EOS"
    },
    {
    data: "TRX",
    title: "TRX"
    },
    {
    data: "BNB",
    title: "BNB"
    },
    {
    data: "MATIC",
    title: "MATIC"
    },
    {
    data: "DAI",
    title: "DAI"
    },
    {
    data: "LTC",
    title: "LTC"
    },
    // {
    // data: null,
    // title: "Actions",
    // name: "Actions",
    // render: function (data, type, row, meta) {
    //     return '<a class="delbutton fa fa-minus-square btn btn-danger" href="#"></a>';
    // },
    // disabled: true
    // } 
    ];

    var myTable;

    myTable = $('#example').DataTable({
        "paging":   false,
        "order": [[ 2, "asc" ]],
        data: dataSet,
        columns: columnDefs,
        dom: 'Bfrtip',        // Needs button container
        select: {
            style: 'single',
            toggleable: false
        },
        responsive: false,
        altEditor: true,     // Enable altEditor
        buttons: []          // no buttons, however this seems compulsory
    });

    //Edit

    $(document).on('click', "[id^='example'] tbody ", 'tr', function () {
        var tableID = $(this).closest('table').attr('id');    // id of the table
        var that = $( '#'+tableID )[0].altEditor;
        that._openEditModal();
        $('#altEditor-edit-form-' + that.random_id)
            .off('submit')
            .on('submit', function (e) {
                e.preventDefault();
                e.stopPropagation();
                that._editRowData();

                // setup some local variables
                var $form = $(this);
                var $inputs = $form.find("input, select, button, textarea");
                var serializedData = $form.serialize();
                $inputs.prop("disabled", true);

                $.ajax({
                    url:"/db_action.php",
                    type: "POST",
                    cache: false,
                    data: serializedData,
                    success: function(value)
                    {
                        // console.log("Successful");
                        console.log(value);
                    },
                    error: function(){
                        alert("Failure");
                    }
                });

        });
    });

        // Delete
    // $(document).on('click', "[id^='example'] .delbutton", 'tr', function (x) {
    //     var tableID = $(this).closest('table').attr('id');    // id of the table
    //     var that = $( '#'+tableID )[0].altEditor;
    //     that._openDeleteModal();
    //     $('#altEditor-delete-form-' + that.random_id)
    //         .off('submit')
    //         .on('submit', function (e) {
    //             e.preventDefault();
    //             e.stopPropagation();
    //             that._deleteRow();
    //         });
    //     x.stopPropagation(); //avoid open "Edit" dialog
    // });  


  // Add row
    // $('#addbutton').on('click', function () {
    //     var that = $( '#example' )[0].altEditor;
    //     that._openAddModal();
    //     $('#altEditor-add-form-' + that.random_id)
    //         .off('submit')
    //         .on('submit', function (e) {
    //             e.preventDefault();
    //             e.stopPropagation();
    //             that._addRowData();
    //         });
    // });
});
    