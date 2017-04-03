<br>
<h2>Hoster management</h2>
<div class="pull-right">
   <a href="/admin/hoster/createHoster"> <span class="glyphicon glyphicon-plus"></span> Add new Hoster </a>
</div>

<div>
   {{ flash.output() }}
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td>id</td>
      <td>hoster name</td>
      <td>edit text</td>
      <td>edit</td>
      <td>delete</td>
   </tr>

   {% for hoster in hosters %}
      <tr>
         <td>{{ hoster.hoster_id }}</td>
         <td>{{ hoster.hoster_name }}</td>
         <td><a href="/admin/hoster/editHosterText/{{ hoster.hoster_id }}"> <span class="glyphicon glyphicon-pencil"
                                                                                  aria-hidden="true"></span></a></td>
         <td><a href="/admin/hoster/editHoster/{{ hoster.hoster_id }}"> <span class="glyphicon glyphicon-pencil"
                                                                              aria-hidden="true"></span></a></td>
         <td><a href="/admin/hoster/deleteHoster/{{ hoster.hoster_id }} "> <span class="glyphicon glyphicon-remove"
                                                                                 aria-hidden="true"></span> </a></td>
      </tr>
   {% endfor %}
</table>
