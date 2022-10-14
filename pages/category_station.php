<h4><button class="button_stg" name="loadliststation" id="loadliststation"><i class="fa fa-refresh"></i></button> Danh mục trạm quan trắc</h4>
<hr>
<div class="row" id="listrow">
    <div id="liststation"></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var source_liststation;
        $(document).ready(function () {
            source_liststation = {
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
                url: 'go?for=loadStation',
                cache: false
            };
            var dataAdapter = new $.jqx.dataAdapter(source_liststation);
            $("#liststation").jqxGrid({
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

            $("#loadliststation").click(function(){
                load_liststation();
            });
        });
        function load_liststation(){
            var url_dslog = "go?for=loadStation";
            source_liststation.url = url_dslog;
            $("#liststation").jqxGrid('updatebounddata');
        }
    });		
</script>