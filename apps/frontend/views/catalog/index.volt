<div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
   <div class="main-content catalogue">
      <div class="container">
         <div class="filter-panel"></div>
         <h2 class="text-center title">{{ t._('s nami prosto') }} </h2>


         {% if villas.items|length %}

            {% for villa in villas.items %}

               {{ partial("partial/villa-chunk") }}

            {% endfor %}

            <hr class="clear">

            <div class="pagination-container">
               <ul class="pagination pagination-lg">

                  {% if is_paged is not defined %}

                     <li>
                        <a href={{ this.linkPrefix }}"/catalog/page/{{ villas.before }}">Previous&nbsp;&nbsp;&nbsp;«</a>
                     </li>

                     {% for i in range %}

                        <li><a class="{{ villas.current == i ? 'active':'' }}" href="/catalog/page/{{ i }}">{{ i }}</a>
                        </li>

                     {% endfor %}

                     <li><a href={{ this.linkPrefix }}"/catalog/page/{{ villas.next }}">»&nbsp;&nbsp;&nbsp;Next</a></li>

                  {% endif %}

               </ul>
            </div>

         {% else %}

            <br>
            <h4>No villas found.</h4>
            <a style="color: #2d76fa !important; " href="{{ linkPrefix }}/catalog">There are many villas in catalog</a>
            <br>
            <br>


         {% endif %}
      </div>
   </div>
</div>
