<br>
<h2>User management</h2>
<div class="pull-right">
   <a href="/admin/user/createUser"> <span class="glyphicon glyphicon-plus"></span> Add new User </a>
</div>

<div>
   {{ flash.output() }}
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td>{{ 'ID' | capitalize }}</td>
      <td>{{ 'name' | capitalize }}</td>
      <td>{{ 'sourname' | capitalize }}</td>
      <td>{{ 'email' | capitalize }}</td>
      <td>{{ 'phone' | capitalize }}</td>
      <td>{{ 'languages' | capitalize }}</td>
      <td>{{ 'edit' | capitalize }}</td>
      <td>{{ 'delete' | capitalize }}</td>
   </tr>

   {% for user in users %}
      <tr>
         <td>{{ user.id }}</td>
         <td>{{ user.name }}</td>
         <td>{{ user.sourname }}</td>
         <td>{{ user.email }}</td>
         <td>{{ user.phone }}</td>
         <td>{{ user.languages }}</td>
         <td>
            <a href="/admin/user/editUser/{{ user.id }}">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
         </td>
         <td>
            <a href="/admin/user/deleteUser/{{ user.id }} ">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
         </td>
      </tr>
   {% endfor %}
</table>
