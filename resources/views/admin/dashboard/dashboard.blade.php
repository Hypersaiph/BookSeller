@extends('layouts.master')

@section('title')
    Dashboard
@endsection
@section('search_big')
@endsection
@section('search_small')
@endsection
@section('navigation')
@endsection
@section('container')
    <div id="card-stats">
        <div class="row">
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">perm_identity</i>
                            <p>Clientes</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0">{{$new_customers_count}}</h5>
                            <p class="no-margin">Nuevos</p>
                            <p>{{$customer_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">timeline</i>
                            <p>Ventas</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0">{{$new_sales_growth}}%</h5>
                            <p class="no-margin">Crecimiento</p>
                            <p>{{$sale_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">attach_money</i>
                            <p>Ganancia</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0">-</h5>
                            <p class="no-margin">Hoy</p>
                            <p>Bs {{$profit}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">add_shopping_cart</i>
                            <p>Cuentas</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5 class="mb-0">{{$size_accounts}}</h5>
                            <p class="no-margin">Incobrables</p>
                            <p>Bs -{{$total_accounts}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--yearly & weekly revenue chart start-->
    <div id="sales-chart">
        <div class="row">
            <div class="col s12 m8 l8">
                <div id="revenue-chart" class="card">
                    <div class="card-content">
                        <h4 class="header mt-0">INGRESOS DEL 2018
                            <span class="purple-text small text-darken-1 ml-1"></span>
                        </h4>
                        <div class="row">
                            <div class="col s12">
                                <div class="yearly-revenue-chart">
                                    <canvas id="thisYearRevenue" class="firstShadow" height="350"></canvas>
                                    <canvas id="lastYearRevenue" height="350"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div id="weekly-earning" class="card">
                    <div class="card-content">
                        <h4 class="header m-0">Ganancias
                        </h4>
                        <p class="no-margin grey-text lighten-3 medium-small">{{$days_ago}} - {{$now}}</p>
                        <h3 class="header">Bs {{$earnings}}
                            <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>
                        </h3>
                        <canvas id="monthlyEarning" class="" height="150"></canvas>
                        <div class="center-align">
                            <p class="lighten-3">Total Ganancias hace 10 Días</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--yearly & weekly revenue chart end-->
    <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
    <div id="daily-data-chart">
        <div class="row">
            @foreach($products as $product)
                <div class="col s12 m4 l4">
                    <div class="card pt-0 pb-0">
                        <div class="padding-2 ml-2">
                            <span class="white-text badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">Bs {{$product->stock * $product->price}}</span>
                            <p class="mt-2 mb-0">{{$product->book->title}}</p>
                            <p class="no-margin grey-text lighten-3">{{$product->type->type}}</p>
                            <h5>{{$product->stock}} unidades restantes</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
@endsection
@section('js_content')
    <script type="text/javascript" src="{!! asset('vendors/chartjs/chart.min.js') !!}"></script>
    {{--<script type="text/javascript" src="{!! asset('js/scripts/dashboard-ecommerce.js') !!}"></script>--}}
    <script>
        $(document).ready(function() {
            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Ninguno', // text for clear-button
                canceltext: 'Cancelar', // Text for cancel-button,
                container: undefined, // ex. 'body' will append picker to body
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });
        });
        function setSalesSettingsInt(key, val){
            if(!Number.isInteger(Number(val))){
                Materialize.toast("Debe ser un valor entero.", 2000, 'rounded');
            }else{
                if(val <= 0){
                    Materialize.toast("Debe ser un valor positivo.", 2000, 'rounded');
                }else{
                    var new_val = parseInt(val);
                    setSetting(key,new_val);
                }
            }
        }
        function setSalesSettingsDouble(key, val){
            if (isNaN(val)) {
                Materialize.toast("Debe ser un valor numérico.", 2000, 'rounded');
            }else{
                if(val <= 0){
                    Materialize.toast("Debe ser un valor positivo.", 2000, 'rounded');
                }else{
                    var new_val = parseFloat(val);
                    setSetting(key,new_val);
                }
            }
        }
        /*
        * Line chart with shadow: Monthly Earning Chart
        */
        var thisYearCTX = document.getElementById("monthlyEarning").getContext("2d");
        Chart.types.Line.extend({
            name: "LineSm",
            initialize: function() {
                Chart.types.Line.prototype.initialize.apply(this, arguments);
                var ctx = this.chart.ctx;
                var originalStroke = ctx.stroke;
                ctx.stroke = function() {
                    ctx.save();
                    ctx.shadowColor = 'rgba(158, 158, 158, 0.6)';
                    ctx.shadowBlur = 14;
                    ctx.shadowOffsetX = 2;
                    ctx.shadowOffsetY = 16;
                    originalStroke.apply(this, arguments)
                    ctx.restore();
                }
            }
        });
        var thisYearData = {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
            datasets: [{
                label: "This year dataset",
                fillColor: "#ff6f00",
                strokeColor: "#ff6f00",
                pointColor: "transparent",
                pointStrokeColor: "transparent",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#ff6f00",
                data: [@foreach ($days_ago_sales_amounts as $amount){{$amount}},@endforeach],
            }]
        };
        var thisYearChart = new Chart(thisYearCTX).LineSm(thisYearData, {
            bezierCurve: false,
            datasetFill: false,
            showTooltips: false,
            scaleShowVerticalLines: false,
            scaleShowGridLines: false,
            datasetStrokeWidth: 3,
            scaleFontColor: 'transparent',
            scaleGridLineColor: 'transparent',
            scaleLineColor: 'transparent',
            scaleOverride: true,
            scaleSteps: 10,
            scaleStepWidth: 50,
            scaleStartValue: 0
        });
        //year chart
        //Line chart with color shadow: Revenue for 2017 Chart
        var thisYearCTX = document.getElementById("thisYearRevenue").getContext("2d");
        var lastYearCTX = document.getElementById("lastYearRevenue").getContext("2d");
        Chart.types.Line.extend({
            name: "LineAlt",
            initialize: function() {
                Chart.types.Line.prototype.initialize.apply(this, arguments);

                var ctx = this.chart.ctx;
                var originalStroke = ctx.stroke;
                ctx.stroke = function() {
                    ctx.save();
                    ctx.shadowColor = 'rgba(156, 46, 157,0.5)';
                    ctx.shadowBlur = 20;
                    ctx.shadowOffsetX = 2;
                    ctx.shadowOffsetY = 20;
                    originalStroke.apply(this, arguments)
                    ctx.restore();
                }
            }
        });
        Chart.types.Line.extend({
            name: "LineAlt2",
            initialize: function() {
                Chart.types.Line.prototype.initialize.apply(this, arguments);
                var ctx = this.chart.ctx;
                var originalStroke = ctx.stroke;
                ctx.stroke = function() {
                    ctx.save();
                    originalStroke.apply(this, arguments)
                    ctx.restore();
                }
            }
        });
        var thisYearData = {
            labels: [@foreach ($year_months as $month)"{{$month}}",@endforeach],
            datasets: [{
                label: "This year dataset",
                fillColor: "#9C2E9D",
                strokeColor: "#9C2E9D",
                pointColor: "transparent",
                pointStrokeColor: "transparent",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#9C2E9D",
                data: [@foreach ($yearly_revenue as $revenue){{$revenue->revenue}},@endforeach]
            }]
        };
        var lastYearData = {
            labels: [@foreach ($year_months as $month)"{{$month}}",@endforeach],
            datasets: [{
                label: "Last year dataset",
                fillColor: "#E4E4E4",
                strokeColor: "#E4E4E4",
                pointColor: "transparent",
                pointStrokeColor: "transparent",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#E4E4E4",
                data: [@foreach ($yearly_revenue as $revenue){{$revenue->revenue-50}},@endforeach]
            }]
        };
        var thisYearChart = new Chart(thisYearCTX).LineAlt(thisYearData, {
            datasetFill: false,
            scaleShowGridLines: false,
            datasetStrokeWidth: 5,
            scaleFontColor: '#9e9e9e',
            scaleGridLineColor: '#e4e4e4',
            scaleLineColor: 'transparent',
            scaleOverride: true,
            scaleSteps: 10,
            scaleStepWidth: 1300,
            scaleStartValue: 0
        });
        var lastYearChart = new Chart(lastYearCTX).LineAlt2(lastYearData, {
            datasetFill: false,
            scaleShowVerticalLines: false,
            datasetStrokeWidth: 5,
            scaleFontColor: '#9e9e9e',
            scaleGridLineColor: '#e4e4e4',
            scaleLineColor: 'transparent',
            scaleOverride: true,
            scaleSteps: 10,
            scaleStepWidth: 1300,
            scaleStartValue: 0
        });
    </script>
@endsection
