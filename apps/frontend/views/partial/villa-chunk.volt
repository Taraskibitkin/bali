<div class="col-sm-6 col-md-4 col-xs-12 home-container villa-chunk">
  <div>
    <img class="home" src="{{ static_url("uploads/images/villas/" ~ villa.main_img ) }}" />
    <div class="black-tip col-md-12 col-sm-12 col-xs-12">
      <div class="ovf-a on-hover-tip">
        <h4 class="text-center">{{ villa.room_short_title }}</h4>
        <a href="{{ linkPrefix }}/catalog/villa/{{ villa.id }}" class="book-it">{{ t._('book-now') }}</a>
        <hr class="clear">
        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
          {#<span>Data: <span></span></span>#}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
          <span>{{ t._('status') }}:<span> {{ t._('opened') }} </span></span>
        </div>
      </div>
      <hr class="clear" />
      <div class="col-md-6 col-sm-6 col-xs-6 text-left">
        <span>{{ villa.room_name }}</span>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 text-right">
        <span>${{ villa.room_price }}</span>
      </div>
    </div>
  </div>
</div>