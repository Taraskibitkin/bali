<form method="post">

    <h2>Settings</h2>

   {{ flash.Output() }}

    <table class="create-table">

       {% for option in settings  %}
          <tr>
             <td align="right">
                <label for="name">{{ option.title }}</label>
             </td>
             <td align="left">
                <input type="text" size="100" value="{{ option.value }}" class="form-control" name="<?php echo str_replace(' ', '_', $option->title ); ?>">
             </td>
          </tr>
       {% endfor %}

        <tr>
           <td></td>
            <td><input type="submit" class="btn-primary btn" value="Save"></td>
        </tr>
    </table>
</form>
