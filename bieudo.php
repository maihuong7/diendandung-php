<!DOCTYPE html>
<html>

<head>
    <title>Thống kê</title>
    
    <style type="text/css">
        BODY {
            width: 900PX;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>


</head>

<body>
    <div id="chart-container">
        <canvas id="graph"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph(){
        
            $.post("data.php",
                function (data){
                    console.log(data);
                    var formStatusVar = [];
                    var total = []; 

                    for (var i in data) {
                        formStatusVar.push(data[i].created_time);
                        total.push(data[i].tongtien);
                    }

                    var options = {
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: true
                            }],
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var myChart = {
                        labels: formStatusVar,
                        datasets: [
                            {
                                label: 'Tổng số',
                                backgroundColor: '#17cbd1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#0ec2b6',
                                hoverBorderColor: '#42f5ef',
                                data: total
                            }
                        ]
                    };

                    var bar = $("#graph"); 
                    var barGraph = new Chart(bar, {
                        type: 'bar',
                        data: myChart,
                        options: options
                    });
                });
        }
    </script>
    
    <a href="dsdanhmuc.php">Danh sách danh mục</a>
    <a href="dshoadon.php">Danh sách hóa đơn</a>
    <a href="dsnguoidung.php">Danh sách người dùng</a>
    <a href="dsnhacungcap.php">Danh sách nhà cung cấp</a>

</body>

</html>