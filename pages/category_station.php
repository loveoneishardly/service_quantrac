<h4> Danh mục trạm quan trắc</h4>
<hr>
<div class="row" id="listrow">
    <div id="liststation"></div>
</div>
<div id="addTramquantrac" style="display:none;">
    <table style="width=100%" border="0">
        <tr style="height: 70px">
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Ký hiệu mã trạm</label>
                </div>
            </td>
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Tên trạm</label>
                </div>
            </td>
        </tr>
        <tr style="height: 70px">
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Địa chỉ</label>
                </div>
            </td>
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Thư mục lấy dữ liệu</label>
                </div>
            </td>
        </tr>
        <tr style="height: 70px">
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Kinh độ</label>
                </div>
            </td>
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Vĩ độ</label>
                </div>
            </td>
        </tr>
        <tr style="height: 70px">
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Mô tả</label>
                </div>
            </td>
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Mã khu vực/vùng</label>
                </div>
            </td>
        </tr>
        <tr style="height: 70px">
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Loại trạm</label>
                </div>
            </td>
            <td>
                <div class="group" style="width:400px !important;">      
                    <input type="text" required name="capnhat_hoten" id="capnhat_hoten" style="width:400px !important;">
                    <span class="bar" style="width:400px !important;"></span>
                    <label>Mã ID khác</label>
                </div>
        </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" value="THÊM" id='themtramquantrac' class="qt_button"/>
                <input type="button" value="HỦY" id='huythem' class="qt_button"/>
            </td>
        <tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#themtramquantrac").jqxButton({ width: 100, height: 40 });
        $("#huythem").jqxButton({ width: 100, height: 40 });
        var source_liststation;
        $(document).ready(function () {
            source_liststation = {
                datatype: "json",
                datafields: [
                    { name: 'ID'},
                    { name: 'FCODE'},
                    { name: 'TENTRAM'},
                    { name: 'FADDRESS'},
                    { name: 'DIRECTORY'},
                    { name: 'FLOCATION_LAT'},
                    { name: 'FLOCATION_LNG'},
                    { name: 'FDESCRIPTION'},
                    { name: 'FAREA_ID'},
                    { name: 'FTYPE'},
                    { name: 'FIDANOTHER'},
                    { name: 'FSTATUS'}
                ],
                url: 'go?for=loadStation',
                cache: false,
                pagesize: 30,
                pager: function (pagenum, pagesize, oldpagenum) {
                }
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
                        modal_addTramquantrac.open();
                    });
                    editButton.click(function (event) {
                        modal_addTramquantrac.open();
                    });
                    deleteButton.click(function (event) {
                        var selectedrowindex = $("#grid").jqxGrid('getselectedrowindex');
                        var rowscount = $("#grid").jqxGrid('getdatainformation').rowscount;
                        var id = $("#grid").jqxGrid('getrowid', selectedrowindex);
                        $("#grid").jqxGrid('deleterow', id);
                    });
                    reloadButton.click(function (event) {
                        load_liststation();
                    });
                },
                columns: [
                    { text: 'ID', datafield: 'ID', width: 60, align: 'center', cellsalign: 'center'},
                    { text: 'FCODE', datafield: 'FCODE', width: 120, align: 'center', cellsalign: 'center'},
                    { text: 'TENTRAM', datafield: 'TENTRAM', width: 300, align: 'center',
                        aggregates: [{'<b>Tổng trạm</b>':
                            function (aggregatedValue, currentValue, column, record) {
                                return aggregatedValue + 1;
                            }
                        }]
                    },
                    { text: 'FADDRESS', datafield: 'FADDRESS', width: 300, align: 'center'},
                    { text: 'DIRECTORY', datafield: 'DIRECTORY', width: 200, align: 'center'},
                    { text: 'FLOCATION_LAT', datafield: 'FLOCATION_LAT', width: 150, align: 'center', cellsalign: 'center'},
                    { text: 'FLOCATION_LNG', datafield: 'FLOCATION_LNG', width: 150, align: 'center', cellsalign: 'center'},
                    { text: 'FDESCRIPTION', datafield: 'FDESCRIPTION', width: 120, align: 'center', cellsalign: 'center'},
                    { text: 'FAREA_ID', datafield: 'FAREA_ID', width: 100, align: 'center', cellsalign: 'center'},
                    { text: 'FTYPE', datafield: 'FTYPE', width: 100, align: 'center', cellsalign: 'center'},
                    { text: 'FIDANOTHER', datafield: 'FIDANOTHER', width: 120, align: 'center', cellsalign: 'center'},
                    { text: 'FSTATUS', datafield: 'FSTATUS', width: 100, align: 'center', cellsalign: 'center'}
                ]
            });

            $("#loadliststation").click(function(){
                load_liststation();
            });
            var modal_addTramquantrac = new jBox('Modal', {
                title: "THÊM TRẠM QUAN TRẮC",
                overlay: true,
                responsiveWidth: true,
                content: $('#addTramquantrac'),
                animation: {
                    open: 'move:right',
                    close: 'slide:top'
                },
                position: {
                    x: 'center'
                },
                draggable: 'title',
                closeButton: 'title',
                fixed: true,
                closeOnClick: false,
                zIndex: 9999
            });
        });
        function load_liststation(){
            var url_dslog = "go?for=loadStation";
            source_liststation.url = url_dslog;
            $("#liststation").jqxGrid('updatebounddata');
        }
        function addListstation(){

        }
        function editListstation(){
            
        }
        function deleteListstation(){
            
        }
    });		
</script>