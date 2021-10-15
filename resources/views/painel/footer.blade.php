
            <div class="footer">

<div>
    <strong>Copyright</strong> ALBERNCAMP SOFTWARES  &copy; 2021
</div>
</div>
</div>


<!-- Mainly scripts -->


<script src="{{asset('assests/painel/js/popper.min.js')}}"></script>
<script src="{{asset('assests/painel/js/bootstrap.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{asset('assests/painel/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/flot/jquery.flot.pie.js')}}"></script>


<!-- Peity -->
<script src="{{asset('assests/painel/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assests/painel/js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('assests/painel/js/inspinia.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/pace/pace.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('assests/painel/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- GITTER -->
<script src="{{asset('assests/painel/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('assests/painel/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{asset('assests/painel/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('assests/painel/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('assests/painel/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assests/painel/js/requisicoes_painel.js')}}"></script>
<script src="{{'https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.min.js'}}"></script>

{{-- Crop imagem --}}
<script src="{{asset('assests/painel/crop/cropper.min.js')}}"></script>

{{-- Lista dados table --}}
<script src="{{asset('assests/painel/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('assests/painel/js/plugins/summernote/summernote-bs4.js')}}"></script>

<script src="{{asset('assests/painel/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assests/painel/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assests/painel/js/clone/dist/jquery.cloner.min.js')}}"></script>

<script src="{{asset('assests/painel/js/plugins/steps/jquery.steps.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


{{-- <script>
     var editor = CKEDITOR.replace( 'text' );
    //  editor.CKEDITOR.instances.text.setData('text');
    CKEDITOR.instances.editor.getData();
    //  var editor = CKEDITOR.replace( 'text' );
    // CKFinder.setupCKEditor( editor );
</script> --}}


<script>
$(document).ready(function() {

    $("#wizard").steps();
// setTimeout(function() {
// toastr.options = {
//     closeButton: true,
//     progressBar: true,
//     showMethod: 'slideDown',
//     timeOut: 4000
// };
// toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

// }, 1300);

// $('.navbar-minimalize').on('click', function (event) {
//     alert('aqui');
// event.preventDefault();
// $("body").toggleClass("mini-navbar");
// SmoothlyMenu();

// });

$('.summernote').summernote();

var data1 = [
[0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
];
var data2 = [
[0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
];
$("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
data1, data2
],
    {
        series: {
            lines: {
                show: false,
                fill: true
            },
            splines: {
                show: true,
                tension: 0.4,
                lineWidth: 1,
                fill: 0.4
            },
            points: {
                radius: 0,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#d5d5d5'
        },
        colors: ["#1ab394", "#1C84C6"],
        xaxis:{
        },
        yaxis: {
            ticks: 4
        },
        tooltip: false
    }
);

var doughnutData = {
labels: ["App","Software","Laptop" ],
datasets: [{
    data: [300,50,100],
    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
}]
} ;


var doughnutOptions = {
responsive: false,
legend: {
    display: false
}
};


var ctx4 = document.getElementById("doughnutChart").getContext("2d");
new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

var doughnutData = {
labels: ["App","Software","Laptop" ],
datasets: [{
    data: [70,27,85],
    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
}]
} ;


var doughnutOptions = {
responsive: false,
legend: {
    display: false
}
};


var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

});
</script>
</body>
</html>
