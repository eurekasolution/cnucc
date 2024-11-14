<script>
    function testAjax()
    {
        var org = document.querySelector("#org").value;
        //alert(org);
        var param = "org=" + org;

        $.ajax({
            url: "ajaxServer.php",
            type: "POST",
            cache: false,
            data: param,
            success:function(data)
            {
                $("#target").html(data)
            }
        });
    }
</script>

<div class="row">
    <div class="col colLine">
        <textarea class='form-control' rows='10' id="org">TEST</textarea>
    </div>
    <div class="col colLine">
        <textarea class='form-control' rows='10' id="target"></textarea>    

    </div>
</div>
<div class="row">
    <div class="col colLine text-center">
        <button type="button" class="btn btn-primary" onClick="testAjax()">버튼</button>
    </div>
</div>