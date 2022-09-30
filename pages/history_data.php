<h4><button class="button_stg" name="loadlisthistory" id="loadlisthistory"><i class="fa fa-refresh"></i></button> Lịch sử nhận dữ liệu</h4>
<hr>
<div class="row" id="listrow">
    <div id="listlog"></div>
</div>
<script type="text/javascript">
    var source_logdata;
    $(document).ready(function () {
        source_logdata = {
			datatype: "json",
			datafields: [
				{ name: 'FKEY'},
				{ name: 'FACTION'},
				{ name: 'FTYPE'},
				{ name: 'FCREATED'}
			],
			url: 'go?for=loadHistory',
			cache: false
		};
        var dataAdapter = new $.jqx.dataAdapter(source_logdata);
		$("#listlog").jqxGrid({
            source: dataAdapter,
            width: '100%',
            height: '505',
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
                { text: 'Mã giao dịch', datafield: 'FKEY', width: 280, align: 'center', cellsalign: 'center'},
                { text: 'Thao tác', datafield: 'FACTION', width: 500, align: 'center'},
                { text: 'Loại', datafield: 'FTYPE', width: 200, align: 'center'},
                { text: 'Thời gian', datafield: 'FCREATED', width: 300, align: 'center', cellsalign: 'center'}
		    ]
		});

        $("#loadlisthistory").click(function(){
        	load_history();
        });
    });
    function load_history(){
        var url_dslog = "go?for=loadHistory";
        source_logdata.url = url_dslog;
        $("#listlog").jqxGrid('updatebounddata');
    }
</script>