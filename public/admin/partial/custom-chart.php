<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    var countList = [];
</script>
<?php 

    $artistList = DB::all('artist_list');
    $artistNameList = [];

    foreach($artistList as $key => $nameList)
    {   
        $artistNameList[] = $nameList['name'] . ' ' . $nameList['surname'];
    }

    
    $artistNameListJson = json_encode($artistNameList, TRUE);
    $AppConfirmed = new Appointments();

    $ConfirmedList = $AppConfirmed->AppConfirmed();
    $j = 0;
    
    $total = [];

    for($i = 0; $i < count($artistList); $i++)
    {
        for($k = 0; $k < count($ConfirmedList); $k++)
        {
            if($ConfirmedList[$k]['artist_id'] == $artistList[$i]['id'])
            {
                $total[$i] = $total[$i] + 1;
                $j++;
            }
        }
    }

    $totalJSON = json_encode($total, TRUE);
?>

<script type="text/javascript">
new Chart(document.getElementById("customMyChart"), {
    type: 'bar',
    data: {
      labels: <?php echo $artistNameListJson ?>,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo $totalJSON; ?>
        }
      ]
    },
    options: {
        scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
      legend: { display: false },
      title: {
        display: true,
        text: 'Onaylanan Randevu İstatistiği'
      }
    }
});
</script>