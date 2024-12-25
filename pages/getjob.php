<h4> Get Data from API CSDLNN</h4>
<hr>
<div id="api_csdlnn">
    <table style="width=100%" border="0">
        <tr style="height: 70px">
            <td>
                <input type="button" value="Lấy dữ liệu" id="getValueApi" name="getValueApi" />
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#getValueApi").click(function(evt){
            $.ajax({
                type: 'POST',
                url: 'go',
                data: {
                    for: "getApiListStation"
                }
            }).done(function(data){
                var value = JSON.parse(data);
                console.log(value);
            });
        });
    });		
</script>