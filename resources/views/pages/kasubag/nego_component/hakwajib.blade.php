<div class="container-fluid">
    <div class="col">
        <div class="text-right">
            
                <a id='btn-terusan' href="#" onclick="window.nego.teruskanBagHukum({{$data->id}})" class="btn btn-success">
                    <i class="fas fa-share"></i>&nbsp;Teruskan Ke Bag. Hukum
                </a>
            
                <a id='btn-refresh' href="#" onclick="window.nego.hdank.requery({{$data->id}})" class="btn btn-primary">
                    <i class="fas fa-sync fa-spin"></i>&nbsp;Refresh
                </a>

            
        </div>

    </div>
</div>
<br>
<div id='hk-content' class="container-fluid">

</div>