﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Datatable Example</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="Stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="Stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js"></script>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <table id="dtexample" border="1px" cellpadding="0px" width="auto" cellspacing="0px">
                <thead id="headD">
                    <tr></tr>
                    <tr></tr>
                </thead>
                <tbody id="dataD" runat="server"></tbody>
            </table>
            <script type="text/javascript">
                var mdataArray = [];
                var EditRowData = [];
                var ColumnData;
                var table;
                var defaultcol = "";
                //get Table and Columns properties
                function getTableMeta() {
                    $.ajax({
                        type: 'POST',
                        url: '/WebService.asmx/GetTableMeta',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            ColumnData = data.Column;
                            $.each(data.Column, function (index, element) {
                                $('#dtexample thead tr:first-child').append($('<th>', {
                                    text: element.Name
                                }));
                                if (element.Searchable == true)
                                    $('#dtexample thead tr:nth-child(2)').append($('<th>', {
                                        text: element.Name
                                    }));
                                else $('#dtexample thead tr:nth-child(2)').append($('<th>', {
                                    text: ''
                                }));
                                mdataArray.push({ mData: element.Name, class: element.Name });
                            });
                            defaultcol = data.Column[0].Name;
                            //once table headers and table data property set, initialize DT
                            initializeDataTable();
                        }
                    });
                }
                $(document).ready(function () {
                    getTableMeta();
                });
                $(document).keyup(function (e) {
                    if (e.keyCode == 27)
                            cancelBtn();
                });
                function initializeDataTable() {
                    //put Input textbox for filtering
                    $('#dtexample thead tr:nth-child(2) th').each(function () {
                        var title = $(this).text();
                        if (title != '')
                            $(this).html('<input type="text" class="sorthandle" style="width:100%;" />');
                    });
                    //don't sort when user clicks on input textbox to type for filter
                    $('#dtexample').find('thead th').click(function (event) {
                        if ($(event.target).hasClass('sorthandle')) {
                            event.stopImmediatePropagation()
                        }
                    });
                    table = $('#dtexample').DataTable({
                        "ajax": {
                            "url": "/WebService.asmx/GetTableData",
                            "type": "POST",
                            data: function (data) {
                                editIndexTable = -1;
                                var colname;
                                var sort = data.order[0].column;
                                if (!data['columns'][sort]['data'] == '')
                                    colname = data['columns'][sort]['data'] + ' ' + data.order[0].dir;
                                //in case no sorted col is there, sort by first col
                                else colname = defaultcol + " asc";
                                var colarr = [];
                                //  colname = 'ID asc';
                                var colfilter, col;
                                var arr = {
                                    'draw': data.draw, 'length': data.length,
                                    'sort': colname, 'start': data.start, 'search': data.search.value
                                };
                                //add each column as formdata key/value for filtering
                                data['columns'].forEach(function (items, index) {
                                    col = data['columns'][index]['data'];
                                    colfilter = data['columns'][index]['search']['value'];
                                    arr[col] = colfilter;
                                });
                                return arr;
                            }
                        },
                        "lengthMenu": [10, 50, 100], "searching": true,
                        //rowId required when doing update, can put any unique value for each row instead of ID
                        rowId: 'ID',
                        serverSide: true, "processing": true,
                        aoColumns: mdataArray
                    });
                    //call search api when user types in filter input
                    table.columns().every(function () {
                        var that = this;
                        $('input', this.header()).on('keyup change', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
                    var onEditClickcls = '';
                    $.each(ColumnData, function (index, element) {
                        if (element.Editable == true) {
                            onEditClickcls += 'tr td.' + element.Name + ',';
                        }
                    });
                    onEditClickcls = onEditClickcls.substring(0, onEditClickcls.length - 1);
                    console.log(onEditClickcls);
                    $("#dtexample tbody").on('click', onEditClickcls, function (e) {
                        if ($(e.target).is('input') || $(e.target).is('img') || $(e.target).is('span.copyAll')) {
                            e.preventDefault();
                            return;
                        }
                        RoweditMode($(this).parent());
                    });
                    $("#dtexample tbody").on('keyup', 'input.userinput', function (e) {
                        if (e.keyCode == 13) {
                                updateRowData(this.parentNode.parentNode);
                        }
                    });
                }
                var editIndexTable = -1;
                function RoweditMode(rowid) {
                    var prevRow;
                    var rowIndexVlaue = parseInt(rowid.attr("indexv"));
                    if (editIndexTable == -1) {
                        saveRowIntoArray(rowid);
                        rowid.attr("editState", "editState");
                        editIndexTable = rowid.rowIndex;
                        setEditStateValue(rowid, rowIndexVlaue + 2);
                    }
                    else {
                        prevRow = $("[editState=editState]");
                        prevRow.attr("editState", "");
                        rowid.attr("editState", "editState");
                        editIndexTable = rowIndexVlaue;
                        saveArrayIntoRow(prevRow);
                        saveRowIntoArray(rowid);
                        setEditStateValue(rowid, rowIndexVlaue + 2);
                    }
                }
                function setEditStateValue(td1, indexRow) {
                    for (var k in EditRowData) {
                        $($(td1).children('.' + k)[0]).html('<input value="' + EditRowData[k] + '" class="userinput"  style="width: 99% " />');
                    }
                }
                function cancelBtn() {
                    var prevRow = $("[editState=editState]");
                    prevRow.attr("editState", "");
                    if (prevRow.length > 0) { saveArrayIntoRow($(prevRow)); }
                    editIndexTable = -1;
                }
                function saveRowIntoArray(cureentCells) {
                    $.each(ColumnData, function (index, element) {
                        if (element.Editable == true) {
                            var htmlVal = $($(cureentCells).children('.' + element.Name)[0]).html();
                            EditRowData[element.Name] = htmlVal;
                        }
                    });
                }
                function saveArrayIntoRow(cureentCells) {
                    for (var k in EditRowData) {
                        $($(cureentCells).children('.' + k)[0]).html(EditRowData[k]);
                    }
                }
                function updateRowData(currentCells) {
                    var table = $("#dtexample").DataTable();
                    var row = table.row(currentCells);
                    rowid = currentCells.getAttribute('id');
                    var UpdateRowData = [];

                    $.each(ColumnData, function (index, element) {
                        if (element.Editable==true) {
                            UpdateRowData.push({
                                'pname': element.Name , 'pvalue': $($($(currentCells).children('.' + element.Name)).children('input')[0]).val()
                            });
                        }
                    });
                    console.log(UpdateRowData);
                    UpdateRowData.push({ 'pname': 'rowid', 'pvalue': rowid });
                    var parameter = "";
                    for (i = 0; i < UpdateRowData.length; i++) {
                        if (i == UpdateRowData.length - 1)
                            parameter = parameter + UpdateRowData[i].pname + "=" + UpdateRowData[i].pvalue;
                        else
                            parameter = parameter + UpdateRowData[i].pname + "=" + UpdateRowData[i].pvalue + "&";
                    }
                    $.ajax({
                        type: 'POST',
                        url: '/WebService.asmx/UpdateTableData',
                        data: parameter,
                        success: function (data) {
                            var table = $('#dtexample').DataTable();
                            table.draw('page');
                        }
                    });
                }
               
            </script>
        </div>
    </form>
</body>
</html>