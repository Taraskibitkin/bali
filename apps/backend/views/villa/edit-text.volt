<form method="post">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2>Edit Villa</h2>
   <br>

   <div class="flash-message">
      {{ flash.output() }}
   </div>
   <table class="create-table">

      <tr>
         <td align="right">
            <label for="room_price">Title</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" value="{{ villa.room_name }}" name="room_name">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="room_price">Presence Title</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" value="{{ villa.room_short_title }}" name="room_short_title">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="room_price">Room Description</label>
         </td>
         <td align="left">
            <textarea type="text" class="form-control" name="room_desc">{{ villa.room_desc }}</textarea>
         </td>
      </tr>

      <tr>
         <td align="right">
            <label for="seo_title">Seo title</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="seo_title" value="{{ villa.seo_title }}"/>
         </td>
      </tr>

      <tr>
         <td align="right">
            <label for="seo_desc">Seo description</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="seo_desc" value="{{ villa.seo_desc }}" />
         </td>
      </tr>


      <tr>
         <td align="right">
         </td>
         <td align="left">
            <input class="btn btn-primary" type="submit" value="Save">
         </td>
      </tr>
   </table>

</form>
