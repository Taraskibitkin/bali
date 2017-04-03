<br>
<h2>Page management</h2>
<br>

<div>
   {{ flash.output() }}
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td>ID</td>
      <td>Slug</td>
      <td>Title</td>
      <td>Edit</td>
      <td>Delete</td>
   </tr>

   {% for page in pages %}
      <tr>
         <td>{{ page.id }}</td>
         <td>{{ page.slug }}</td>
         <td>{{ page.title }}</td>
         <td>
            <a href="/admin/page/edit/{{ page.id }}">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
         </td>
         <td>
            <a href="/admin/page/delete/{{ page.id }} ">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
         </td>
      </tr>
   {% endfor %}
</table>
