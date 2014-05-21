<h1>Members</h1>

<?php
    $url = 'http://sfmreport.api/api/v1/members/';
    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);

?>


@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

<?php foreach ($data as $k => $v) : ?>
    <?php

        if (date('Ym', $v['join_date']) >= '201311' && date('Ym', $v['join_date']) <= '201311'){
           $nov[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        if (date('Ym', $v['join_date']) >= '201312' && date('Ym', $v['join_date']) <= '201312'){
           $dec[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        if (date('Ym', $v['join_date']) >= '201401' && date('Ym', $v['join_date']) <= '201401'){
           $jan[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        if (date('Ym', $v['join_date']) >= '201402' && date('Ym', $v['join_date']) <= '201402'){
           $feb[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        if (date('Ym', $v['join_date']) >= '201403' && date('Ym', $v['join_date']) <= '201403'){
           $mar[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        // APRIL SIGN UPS
        if (date('Ym', $v['join_date']) >= '201404' && date('Ym', $v['join_date']) <= '201404'){
           $apr[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }
            // APRIL SIGN UPS VIA POS, group_id is == 8
            if (date('Ym', $v['join_date']) >= '201404' && date('Ym', $v['join_date']) <= '201404' && $v['group_id'] == '8'){
               $apr_pos[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
            }
            // MAY NON POS, group_id is != 8
            if (date('Ym', $v['join_date']) >= '201404' && date('Ym', $v['join_date']) <= '201404' && $v['group_id'] != '8'){
               $apr_non_pos[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
            }


        // MAY SIGN UPS
        if (date('Ym', $v['join_date']) >= '201405' && date('Ym', $v['join_date']) <= '201405'){
           $may[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }
            // MAY SIGN UPS VIA POS, group_id is == 8
            if (date('Ym', $v['join_date']) >= '201405' && date('Ym', $v['join_date']) <= '201405' && $v['group_id'] == '8'){
               $may_pos[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
            }
            // MAY NON POS, group_id is != 8
            if (date('Ym', $v['join_date']) >= '201405' && date('Ym', $v['join_date']) <= '201405' && $v['group_id'] != '8'){
               $may_non_pos[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
            }

        // MAY DEFINED DATES:

        // First of April to End of April
        if (date('Ymd', $v['join_date']) >= '20140401' && date('Ymd', $v['join_date']) <= '20140430' && $v['group_id'] == '8'){
           $apr_1st[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }

        // First of May Onwards:
        if (date('Ymd', $v['join_date']) >= '20140501' && date('Ymd', $v['join_date']) <= '20140516' && $v['group_id'] == '8'){
           $may_1st[]= $v['email'] . date('d/m/Y',$v['join_date']) . " --- " . date('Ym', $v['join_date']);
        }



    ?>
<?php endforeach; ?>



<h2>
    1st April - 30th April
</h2>
<p>Sign ups via POS: <?= count($apr_1st); ?></p>


<h2> 1st May - 16th May 2014</h2>
<p>Sign ups via POS: <?= count($may_1st); ?></p>
<hr>


<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Organic', 'POS', 'Total'],
          ['November', <?= count($nov);?> ,      0, <?= count($nov);?>  ],
          ['December', <?= count($dec);?> ,      0, <?= count($dec);?>  ],
          ['January',  <?= count($jan);?>,      0, <?= count($jan);?>   ],
          ['February',  <?= count($feb);?>,       0, <?= count($feb);?> ],
          ['March',  <?= count($mar);?>,      0,  <?= count($mar);?> ],
          ['April',  <?= count($apr_non_pos);?>,      <?= count($apr_pos);?>,<?= count($apr);?>],
          ['May',  <?= count($may_non_pos);?>,      <?= count($may_pos)/2;?>,383]
        ]);

        var options = {
          title: 'SFM Member Signups'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {
              curveType: 'function'
        });
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>