<form action="{{ actionForm }}" method="post" enctype="multipart/form-data">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2>Edit Services</h2>
   <br>

   <table class="create-table table table-bordered">

      {# services #}
      <tr>
         <input type="hidden" id="villaID" value="{{ villaID }}">
         <td align="left">
            <label>All Services</label>
            {% for service in allServices %}
               <p class="service control-span">{{ service.service_title }}
                  <img src="<?php echo SITE_URL ?>/images/room/glif-icons/{{ service.service_logo }}">
                  <span class="add-service green" data-id="{{ service.id }}">+</span>
               </p>
            {% endfor %}
         </td>

         <td align="left">
            <label>Villa Services</label>

            <div id="service-container">

               {% for service in services %}
                  <p class="service control-span">{{ service.service_title }}
                     <img src="<?php echo SITE_URL ?>/images/room/glif-icons/{{ service.service_logo }}">
                     <span class="remove-service red" data-id="{{ service.id }}">X</span>
                  </p>
               {% endfor %}
            </div>
         </td>
      </tr>


      {# housing #}
      <tr>
         <td align="left">
            <label>All Housing</label>

            {% for option in allHousing %}

               <p class="options control-span">{{ option.option_title }}:
                  <span class="add-option green" data-id="{{ option.id }}">+</span>
               </p>

            {% endfor %}
         </td>

         <td align="left">
            <label>Villa Housing</label>

            <div id="housing-container" >
               {% for option in housing %}

                  <p class="control-span">{{ option.option_title }}: <input type="text" value="{{ option.option_value }}">
                     <button data-id="{{ option.id }}" class="update-housing">ok</button>
                     <span class="remove-option red" data-id="{{ option.id }}">X</span>
                  </p>

               {% endfor %}
            </div>
         </td>
      </tr>
   </table>
</form>
