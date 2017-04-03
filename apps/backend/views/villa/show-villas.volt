
<br>
<h2>Villas management</h2>

<div class="pull-right">
    <a href="/admin/villa/createVilla"> <span class="glyphicon glyphicon-plus"></span> Add new Villa </a>
</div>

<div>
   {{ flash.output() }}
</div>


<table class="table table-striped table-bordered">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>short title</td>
        <td>text</td>
        <td>services</td>
        <td>gallery</td>
        <td>edit</td>
        <td>delete</td>
    </tr>

   {% for villa in villas %}
        <tr>
            <td>{{ villa.room_id }}</td>
            <td>{{ villa.room_name}}</td>
            <td>{{ villa.room_short_title }}</td>
            <td><a href="/admin/villa/editVillaText/{{ villa.room_id }}"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> </td>
            <td><a href="/admin/villa/editVillaServices/{{ villa.room_id }}"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> </td>
            <td><a href="/admin/villa/editGallery/{{ villa.room_id }}"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> </td>
            <td><a href="/admin/villa/editVilla/{{ villa.room_id }}"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> </td>
            <td><a href="/admin/villa/deleteVilla/{{ villa.room_id }} "> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a> </td>
        </tr>
   {% endfor %}
</table>
