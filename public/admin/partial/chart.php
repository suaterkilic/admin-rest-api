    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
        var nameList = [];
        var countList = [];
    </script>

    <?php 

        $artistList = DB::all('artist_list');
        $appointments = QB::table('appointments_request')->select()->get();

        for($i = 0; $i < count($artistList); $i++)
        {
            for($k = 0; $k < count($appointments); $k++)
            {
                if($appointments[$k]['artist_id'] == $artistList[$i]['id'])
                { 
                    $counter[$i] = $counter[$i] + 1;
                    ?>
                        <script type="text/javascript">
                            countList['<?php echo $i; ?>'] = '<?php echo $counter[$i]; ?>';
                        </script>
                    <?php

                }
            }
        }

        foreach($artistList as $key => $value):

    ?>
        <script type="text/javascript">
            nameList['<?php echo $key ?>'] = '<?php echo $value['name'] ?>';
        </script>  
        <?php endforeach; ?>
    <script type="text/javascript">
        $(document).ready(function(){
        
            var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nameList,
                        datasets: [{
                            label: '# Sanatçıya Göre Randevu İstatistiği',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            data: countList
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
        });
    </script>
