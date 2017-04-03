<form method="post" enctype="multipart/form-data">

    <table width="100%">
        <tr>
            <td align="left"><?php echo $this->tag->linkTo(array("/admin/order/show", "Back")) ?></td>
        </tr>
    </table>

    <h2>{{ actionTitle }}</h2>

    <table class="create-table">

       <tr>
          <td align="right">
             <label for="user_id">User ID</label>
          </td>
          <td align="left">
             <select name="user_id">

                {% for user in users %}

                  <option value="{{ user.id }}" {{ user.id == orderInfo.user_id ? 'selected' : '' }}>
                     {{ user.id }} - {{ user.name }} {{ user.sourname  }}
                  </option>

                {% endfor %}
             </select>
          </td>
       </tr>
       <tr>
          <td align="right">
             <label for="villa_id">Villa ID</label>
          </td>
          <td align="left">
             <select name="villa_id">

                {% for villa in villas %}

                   <option value="{{ villa.room_id }}" {{ villa.room_id  == orderInfo.villa_id ? 'selected' : '' }}>
                      {{ villa.room_id  }} - {{ villa.room_name }}
                   </option>

                {% endfor %}
             </select>
          </td>
       </tr>
       <tr>
          <td align="right">
             <label for="is_payed">Is payed</label>
          </td>
          <td align="left">
             <input type="text" value="{{ orderInfo.is_payed }}" placeholder="1 for true, 0 equals false " class="form-control" name="is_payed">
          </td>
       </tr>
       <tr>
          <td align="right">
             <label for="ordered_from">Ordered from</label>
          </td>
          <td align="left">
             <input type="text" value="{{ orderInfo.ordered_from }}" class="form-control" placeholder="YYYY-MM-DD" name="ordered_from">
          </td>
       </tr>
       <tr>
          <td align="right">
             <label for="ordered_to">Ordered to</label>
          </td>
          <td align="left">
             <input type="text" value="{{ orderInfo.ordered_to }}"  class="form-control" placeholder="YYYY-MM-DD" name="ordered_to">
          </td>
       </tr>

        <tr>
            <td><input type="hidden" name="id" value="{{ userInfo.id }}"></td>
            <td><input type="submit" class="btn-primary btn" value="Save"></td>
        </tr>
    </table>
</form>
