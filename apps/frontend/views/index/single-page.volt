{# конечно лучше бы было встраивать скрипты через лейаут блоки
типа как на ларавеле есть @section - @stop, и в главном layout @yield
вот бы так здесь) #}
{{ assets.outputCss() }}
{{ assets.outputJs() }}
{{ page.html_code }}
<div class="container text-center">
   {{ flash.output() }}
</div>
<hr class="clear">
