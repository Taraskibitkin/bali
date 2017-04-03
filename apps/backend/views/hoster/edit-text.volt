<form method="post">

    <table width="100%">
        <tr>
            <td align="left"><?php echo $this->tag->linkTo(array("/admin/hoster/showHosters", "Back")) ?></td>
        </tr>
    </table>

    <h2>Edit Hoster </h2>
    <br>

    <table class="create-table">
       <tr>
            <td align="right">
                <label for="room_price">Hoster name</label>
            </td>
            <td align="left">
               <input type="text" class="form-control" value="{{ hoster.hoster_name }}" name="hoster_name">
            </td>
        </tr>
       <tr>
          <td align="right">
             <label for="room_price">Hoster Description</label>
          </td>
          <td align="left">
             <textarea type="text" class="form-control" name="hoster_desc">{{ hoster.hoster_desc }}</textarea>
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
   <div class="flash-message">
      {{ flash.output() }}
   </div>
</form>
