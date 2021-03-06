@push('css')
@include('layouts.select2_css')
@include('layouts.plugins.datepiker_css')
@endpush
<!-- Proveedore Id Field -->
<div class="form-group col-sm-12">
    <label for="proveedores" class="control-label">
        Proveedor:
        <a  data-toggle="modal" href="#modal-form-proveedores">Nuevo</a>
    </label>
    {!! Form::select('proveedor_id', $proveedores ,$tempCompraUser->proveedor_id,['class' => 'form-control', 'id'=>'proveedores']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('tcomprobante', 'Tipo Comprobante:') !!}
    {!! Form::select('tcomprobante_id', $tcomps ,$tempCompraUser->tcomprobante_id ,['class' => 'form-control', 'id'=>'tcomprobantes']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', \Carbon\Carbon::today()->format('d/m/Y'), ['class' => 'form-control','id'=>'fecha']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-12">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-12">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>


@push('scripts')
@include('layouts.select2_js')
@include('layouts.plugins.datepiker_js')
<!--
    ****** Scripts campos compras-->
<script>
    $(function () {
        $.fn.select2.defaults.set("theme", "classic");

        function formatState (state) {
            var $state = $(
                '<span>Nombre: '+ state.nombre+ '</span><br>'+
                '<span>Razon: ' + state.razon_social+ '</span><br>'+
                '<span>Nit: ' + state.nit+ '</span><br>'
            );
            return $state;
        };

        $("#proveedores").select2({
            closeOnSelect: false,
            language: "es",
            {{--delay: 500,--}}
            {{--ajax: {--}}
                {{--url: "{{ route('api.proveedors.index') }}",--}}
                {{--dataType: 'json',--}}
                {{--delay: 250,--}}
                {{--data: function (params) {--}}
                    {{--return {--}}
                        {{--search: params.term, // search term--}}
                        {{--page: params.page--}}
                    {{--};--}}
                {{--},--}}
                {{--processResults: function (data, params) {--}}

                    {{--//add attr text a cada objeto de la respuesta para no utilizar templateResult--}}
                    {{--var newData = $.map(data.data, function (obj) {--}}
                        {{--obj.text = obj.nombre;--}}
                        {{--return obj;--}}
                    {{--});--}}

                    {{--return {--}}
                        {{--results: newData,--}}
                    {{--};--}}
                {{--},--}}
                {{--cache: true--}}
            {{--},--}}
            {{--//escapeMarkup: function (markup) { return markup; }, // let our custom formatter work--}}
            {{--minimumInputLength: 1,--}}
            {{--templateResult: formatState--}}
        }).on('select2:close', function (evt) {
            $("#tcomprobantes").select2('open');
        })

        $("#tcomprobantes").select2({
            closeOnSelect: false,
            language: "es",
        }).on('select2:close', function (evt) {
            $("#fecha").focus().select();
        });

        $("#fecha").datepicker({
            language : 'es'
        });
    })
</script>
@endpush