<form action="{{ actionForm }}" method="post" enctype="multipart/form-data">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/hoster/showHosters", "Back")) ?></td>
      </tr>
   </table>

   <h2>{{ actionTitle }}</h2>

   <table class="create-table">
      <tr>
         <td align="right">
            <label for="main_img">Hoster photo</label>
         </td>
         <td align="left">

            {% if hosterInfo.hoster_photo is defined %}
               <img width="170" heigth="100" src="/uploads/images/hosters/{{ hosterInfo.hoster_photo }}"/>
               <input class="form-control" type="file" name="hoster_photo">

            {% else %}
               <input type="file" class="form-control" name="hoster_photo">

            {% endif %}
         </td>
      </tr>
      <tr>
         <td><input type="hidden" name="id" value="{{ hosterInfo.id }}"></td>
         <td><input type="submit" class="btn-primary btn" value="Save"></td>
      </tr>
   </table>
</form>
