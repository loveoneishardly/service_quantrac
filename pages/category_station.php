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
                statusbarheight: 20,
                showaggregates: true,
                pageable: true,
                pagermode: 'simple',
                columns: [
                    { text: 'ID', datafield: 'ID', width: 60, align: 'center', cellsalign: 'center'},
                    { text: 'FCODE', datafield: 'FCODE', width: 120, align: 'center', cellsalign: 'center'},
                    { text: 'TENTRAM', datafield: 'TENTRAM', width: 300, align: 'center'},
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
        });
        function load_liststation(){
            var url_dslog = "go?for=loadStation";
            source_liststation.url = url_dslog;
            $("#liststation").jqxGrid('updatebounddata');
        }
    });		
</script>