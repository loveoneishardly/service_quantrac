<h4>Tài khoản</h4>
<hr>
<div class="row" id="listrow">
    <div id="listuser"></div>
</div>
<script type="text/javascript">
    var source_listuser;
    $(document).ready(function () {
        source_listuser = {
			datatype: "json",
			datafields: [
				{ name: 'id'},
				{ name: 'username'},
				{ name: 'fname'},
				{ name: 'fbirthday'},
                { name: 'fGender'},
                { name: 'faddress'},
                { name: 'femail'},
                { name: 'fmenu'},
                { name: 'fadmin'},
                { name: 'fstatus'}
			],
			url: 'go?for=loadUser',
			cache: false,
            pagesize: 30,
            pager: function (pagenum, pagesize, oldpagenum) {
            }
		};
        var dataAdapter = new $.jqx.dataAdapter(source_listuser);
		$("#listuser").jqxGrid({
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
            statusbarheight: 20,
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
                    var selectedrowindex = $("#listuser").jqxGrid('getselectedrowindex');
                    var rowscount = $("#listuser").jqxGrid('getdatainformation').rowscount;
                    var id = $("#listuser").jqxGrid('getrowid', selectedrowindex);
                    $("#grilistuserd").jqxGrid('deleterow', id);
                    */
                    alert("Action: Xóa");
                });
                reloadButton.click(function (event) {
                    load_listuser();
                });
            },
            columns: [
                { text: 'Mã tài khoản', datafield: 'id', width: 150, align: 'center', cellsalign: 'center'},
                { text: 'Tên đăng nhập', datafield: 'username', width: 150, align: 'center'},
                { text: 'Tên', datafield: 'fname', width: 200, align: 'center'},
                { text: 'Ngày sinh', datafield: 'fbirthday', width: 120, align: 'center', cellsalign: 'center'},
                { text: 'Giới tính', datafield: 'fGender', width: 100, align: 'center', cellsalign: 'center'},
                { text: 'Địa chỉ', datafield: 'faddress', width: 300, align: 'center'},
                { text: 'Email', datafield: 'femail', width: 300, align: 'center'},
                { text: 'Menu', datafield: 'fmenu', width: 100, align: 'center', cellsalign: 'center'},
                { text: 'Admin', datafield: 'fadmin', width: 100, align: 'center', cellsalign: 'center'},
                { text: 'Trạng thái', datafield: 'fstatus', width: 150, align: 'center', cellsalign: 'center'}
		    ]
		});

        $("#loadlistuser").click(function(){
        	load_listuser();
        });
    });
    function load_listuser(){
        var url_dslog = "go?for=loadUser";
        source_listuser.url = url_dslog;
        $("#listuser").jqxGrid('updatebounddata');
    }
</script>