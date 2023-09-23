{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>
<body>
    
    <div id="highchart"></div>
    <script>
        $(function(){

            var dataomset = {{ json_encode($omsets) }};
            var datapengeluaran = {{ json_encode($pengeluarans) }};

            $("#higtchart").higtchart{{ 
                chart:(
                    type:'column'
                ),
                title:(
                    text:'Yearly Website Ratio'
                ),
                xAxis:(
                    categories:['januari','february','maret','April','Mei','juni']
                ),
                yAxis:(
                    title:{
                        text:'Rate'
                    },
                    series:[{
                        name:'omset',
                        data:dataomset
                    },{
                        name:'pengeluaran',
                        data:datapengeluaran
                    }]
                )
             }}
        })
</body>
</html> --}}