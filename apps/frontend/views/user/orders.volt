<div class="panel panel-default col-xs-12">
  <div class="panel-heading">
    <h2 class="title text-center">Список и состояние заказов</h2>
  </div>
  <div class="panel-body">
    <div>
      <div class="container">
        <ul class="nav nav-pills col-xs-12" role="tablist" id="orders">
          
          <li role="presentation" class="active">
            <a href="#order_item_2" aria-controls="order_item_2" role="tab" data-toggle="tab">Ваши бронирования</a>
          </li>
          
          <li role="presentation">
            <a href="#order_item_3" aria-controls="order_item_3" role="tab" data-toggle="tab">Избранное</a>
          </li>
          
        </ul>
      </div>

      <div class="tab-content col-xs-12">
        
        <div role="tabpanel" class="tab-pane active" id="order_item_2">
          <div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
            <div class="main-content">
              <div class="container">
                <div class="filter-panel"></div>


                {# order villas #}
                {% if orderVillas|length %}

                  {% for villaFav in orderVillas %}

                     <div class="col-sm-6 col-md-4 col-xs-6 home-container fav-villa">
                        <div>
                           <span class="fav-delete" data-id="{{ villaFav.id }}">X</span>
                           <img class="home" src="{{  static_url("uploads/images/villas/") ~ villaFav.main_img }}" />
                           <div class="black-tip col-md-12 col-sm-12 col-xs-12">
                              <div class="ovf-a on-hover-tip">
                                 <h4 class="text-center">{{ villaFav.room_short_title }}</h4>
                                 <a href="{{ linkPrefix }}/catalog/villa/{{ villaFav.id }}" class="book-it">Book now</a>
                                 <hr class="clear">
                              </div>
                              <hr class="clear" />
                              <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                                 <span>{{ villaFav.room_name }}</span>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                 <span>$ {{ villaFav.room_price }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  {% endfor %}
                {% else %}

                  <h3>{{ t._('no_ord') }} </h3>
                {% endif %}

                <hr class="clear">

              </div>
            </div>
          </div>
        </div>
        

        {# favourite villas  #}
        <div role="tabpanel" class="tab-pane" id="order_item_3">
          <div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
            <div class="main-content">
              <div class="container">
                <div class="filter-panel"></div>

                {% if favouriteVillas | length %}
                  {% for villaFav in favouriteVillas %}

                    <div class="col-sm-6 col-md-4 col-xs-6 home-container fav-villa">
                      <div>
                        <span class="fav-delete" data-id="{{ villaFav.id }}">X</span>
                        <img class="home" src="{{  static_url("uploads/images/villas/") ~ villaFav.main_img }}" />
                        <div class="black-tip col-md-12 col-sm-12 col-xs-12">
                          <div class="ovf-a on-hover-tip">
                            <h4 class="text-center">{{ villaFav.room_short_title }}</h4>
                            <a href="{{ linkPrefix }}/catalog/villa/{{ villaFav.id }}" class="book-it">Book now</a>
                            <hr class="clear">
                          </div>
                          <hr class="clear" />
                          <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <span>{{ villaFav.room_name }}</span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>$ {{ villaFav.room_price }}</span>
                          </div>
                        </div>
                      </div>
                    </div>


                  {% endfor %}

                {% else %}

                    <h3>{{ t._('no_fav') }} </h3>

                {% endif %}


                <hr class="clear">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>