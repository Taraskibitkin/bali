<form action="{{ actionForm }}" method="post" enctype="multipart/form-data">
   <table width="100%">
      <tr>
         <td align="left"><a href="/admin/page/show">Back</a></td>
      </tr>
   </table>

   <h2>{{ actionTitle }}</h2>

   <br>
   <div>
      {{ flash.Output() }}
   </div>

   <table class="create-table">
      <tr>
         <td align="right">
            <label>Title</label>
         </td>
         <td align="left">
            <input type="text" value="{{ page.title }}" class="form-control" name="title">
         </td>
      </tr>

      <tr>
         <td align="right">
            <label>Meta Description</label>
         </td>
         <td align="left">
            <input type="text" value="{{ page.meta_description }}" class="form-control" name="meta_description">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label>Html Code</label>
         </td>
         <td align="left">
            <textarea id="wysewig" name="html_code">{{ page.html_code }}</textarea>
         </td>
      </tr>
      <tr>
         <td><input type="hidden" name="id" value="{{ page.id }}"></td>
         <td><input type="submit" class="btn-primary btn" value="Save"></td>
      </tr>
   </table>
</form>
