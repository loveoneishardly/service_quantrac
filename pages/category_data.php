<h4>Danh mục dữ liệu</h4>
<hr>
<div class="row" id="listrow">
    <div id="listdatatype"></div>
</div>
<script type="text/javascript">
    var source_listtypedata;
    $(document).ready(function () {
        source_listtypedata = {
			datatype: "json",
			datafields: [
				{ name: 'id'},
				{ name: 'unit_index'},
				{ name: 'unit_name'},
				{ name: 'unit_symbol'},
                { name: 'unit_upper'},
				{ name: 'unit_lower'},
				{ name: 'unit_comment'},
				{ name: 'unit_status'}
			],
			url: 'go?for=loadlistdatatype',
			cache: false,
            pagesize: 50,
            pager: function (pagenum, pagesize, oldpagenum) {
            }
		};
        var dataAdapter = new $.jqx.dataAdapter(source_listtypedata);
		$("#listdatatype").jqxGrid({
            source: dataAdapter,
            width: '100%',
            height: '550',
            source: dataAdapter,
            columnsresize: true,
            showfilterrow: true,
            filterable: true,
            editable: true,
            selectionmode: 'singlerow',
            showstatusbar: true,
            statusbarheight: 32,
            showaggregates: true,
            pageable: true,
            pagermode: 'simple',
            showtoolbar: true,
            showtoolbar: true,
            rendertoolbar: function (statusbar) {
                var container = $("<div style='overflow: hidden; position: relative; margin: 5px;'></div>");
                var addButton = $("<div style='cursor: pointer; float: left; margin-left: 2px;'><span style='margin-left: 1px; position: relative; top: 2px; font-weight: bold;'><i class='fa fa-plus'></i> Thêm</span></div>");
                var editButton = $("<div style='cursor: pointer; float: left; margin-left: 2px;'><span style='margin-left: 1px; position: relative; top: 2px; font-weight: bold;'><i class='fa fa-pencil-square-o'></i> Sửa</span></div>");
                var deleteButton = $("<div style='cursor: pointer; float: left; margin-left: 2px;'><span style='margin-left: 1px; position: relative; top: 2px; font-weight: bold;'><i class='fa fa-times'></i> Xóa</span></div>");
                var reloadButton = $("<div style='cursor: pointer; float: left; margin-left: 2px;'><span style='margin-left: 1px; position: relative; top: 2px; font-weight: bold;'><i class='fa fa-refresh'></i> Xem DS</span></div>");
                container.append(addButton);
                container.append(editButton);
                container.append(deleteButton);
                container.append(reloadButton);
                statusbar.append(container);
                addButton.jqxButton({  width: 58, height: 20 });
                editButton.jqxButton({  width: 47, height: 20 });
                deleteButton.jqxButton({  width: 47, height: 20 });
                reloadButton.jqxButton({  width: 80, height: 20 });
                addButton.click(function (event) {
                    alert("Action: Thêm");
                });
                editButton.click(function (event) {
                    /*modal_addTramquantrac.open();*/
                    alert("Action: Sửa");
                });
                deleteButton.click(function (event) {
                    /*
                    var selectedrowindex = $("#listdatatype").jqxGrid('getselectedrowindex');
                    var rowscount = $("#listdatatype").jqxGrid('getdatainformation').rowscount;
                    var id = $("#listdatatype").jqxGrid('getrowid', selectedrowindex);
                    $("#listdatatype").jqxGrid('deleterow', id);
                    */
                    alert("Action: Xóa");
                });
                reloadButton.click(function (event) {
                    load_datatype();
                });
            },
            columns: [
                { text: 'ID', datafield: 'id', width: 70, align: 'center', cellsalign: 'center'},
                { text: 'Tên chỉ số', datafield: 'unit_index', width: 180, align: 'center'},
                { text: 'Tên', datafield: 'unit_name', width: 250, align: 'center',
                    aggregates: [{'<b>Tổng</b>':
                        function (aggregatedValue, currentValue, column, record) {
                            return aggregatedValue + 1;
                        }
                    }]
                },
                { text: 'Đơn vị', datafield: 'unit_symbol', width: 200, align: 'center', cellsalign: 'center'},
                { text: 'Chỉ số Max', datafield: 'unit_upper', width: 150, align: 'center', cellsalign: 'center'},
                { text: 'Chỉ số Min', datafield: 'unit_lower', width: 150, align: 'center', cellsalign: 'center'},
                { text: 'Comment', datafield: 'unit_comment', width: 150, align: 'center', cellsalign: 'center'},
                { text: 'Trạng thái', datafield: 'unit_status', width: 100, align: 'center', cellsalign: 'center'}
            ]
        });

        $("#loadlistdatatype").click(function(){
        	load_datatype();
        });
    });
    function load_datatype(){
        var url_dslog = "go?for=loadlistdatatype";
        source_listtypedata.url = url_dslog;
        $("#listdatatype").jqxGrid('updatebounddata');
    }
</script>