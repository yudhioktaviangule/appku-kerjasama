


<table class="table">
    <tr>
        <th class="bg-info">
            INFORMASI UMUM
        </th>
    </tr>
    <tr>
        <td>

        
<div class='form-group'>
    <label for=nomor>Nomor</label>
    <p>
        {{$data->nomor}}

    </p>
</div>
<div class='form-group'>
    <label for=nomor>Instansi</label>
    <p>
        {{$data->getPenanggungJawab()->getPerusahaan()->name}}

    </p>
</div>
<div class='form-group'>
    <label for=nomor>Tentang</label>
    <p>
        {{$data->tentang}}

    </p>
</div>
        </td>
    </tr>


</table>
