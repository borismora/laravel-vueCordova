<h4 class="widgettitle nomargin shadowed">Generar Reportes</h4>
<div class="widgetcontent bordered shadowed nopadding">

<form class="stdform stdform2" method="GET" action="/pdf" enctype="multipart/form-data">

        <p >
            <label for="rango_in">{{ __('Rango inicial') }}</label>
            <span class="field"><input type="date" name="rango_in" class="input-xxlarge" placeholder="" required></span>
        </p>

        <p>
            <label for="rango_fn">{{ __('Rango final') }}</label>
            <span class="field"><input type="date" name="rango_fn"  class="input-xxlarge" placeholder="" required></span> 
            
        </p>
        
        <p class="stdformbutton">
        <button class="btn btn-primary" type="submit">Generar PDF</button>
        </p>
         
  
</form>
</div>