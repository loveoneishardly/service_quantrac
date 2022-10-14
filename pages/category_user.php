<h4><button class="button_stg" name="loadlistuser" id="loadlistuser"><i class="fa fa-refresh"></i></button> Tài khoản</h4>
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
			cache: false
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