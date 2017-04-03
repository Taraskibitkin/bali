<form action="{{ actionForm }}" method="post" enctype="multipart/form-data">
   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2>{{ actionTitle }}</h2>
   <br>

   {{ flash.Output() }}

   <table class="create-table table table-bordered">
      <tr>
         <td align="right">
            <label for="room_price">Villa Price</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="room_price" value="{{ villaInfo.room_price }}">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="main_img">Main Img</label>
         </td>
         <td align="left">

            {% if villaInfo.main_img is defined %}
               <img width="170" heigth="100" src="/uploads/images/villas/{{ villaInfo.main_img }}"/>
               <input type="file" name="main_img">

            {% else %}
               <input type="file" name="main_img">

            {% endif %}
         </td>
      </tr>
      <tr>
         <td align="right">
            <label>Select Hoster</label>
         </td>
         <td align="left">
            <select name="hoster_id" class="form-control">

               {% for hoster in hosters %}

                  <option value="{{ hoster.hoster_id }}" {{ hoster.hoster_id == villaInfo.hoster_id ? 'selected' : ''  }}>
                     {{ hoster.hoster_id }} - {{ hoster.hoster_name }}</option>
               {% endfor %}
            </select>
         </td>
      </tr>

      <tr>
         <td align="right">
            <label>Select Region</label>
         </td>
         <td align="left">
            <select name="region_id" class="form-control">

               {% for region in regions %}

                  <option value="{{ region.id }}" {{ region.id == villaInfo.region_id ? 'selected' : '' }} >{{ region.title }} </option>

               {% endfor %}

            </select>
         </td>
      </tr>


      <tr>
         <td align="right">
            <label for="room_google_map">Google Map</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="room_google_map" value="{{ villaInfo.room_google_map }}">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="google_map_title">Google Map Title</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="google_map_title" value="{{ villaInfo.google_map_title }}">
         </td>
      </tr>
      <tr>
         <td><input type="hidden" name="id" value="{{ villaInfo.id }}"></td>
         <td> <input type="submit" value="Save" class="btn-primary btn"></td>
      </tr>
   </table>

</form>
