<?php /* Template Name: Messagerie */
 get_header(); 
?>

<?php 
    $y = $_GET['y'] ?  $_GET['y'] : date('Y');
    $m = $_GET['m'] ?  $_GET['m'] : date('m');
    //display 5 next and 5 previous years of selected year
    for ($i=$y-5; $i<=$y+5; $i++){
        echo '<a href="index.php?y='.$i.'&m='.$m.'">'.$i.'</a>&nbsp&nbsp;';  
    }
    echo "<br><br>";

    //months array just like Jan,Fev,Mar,Avr in short format
    $m_array = array('1'=>'Jan', '2'=>'Fev', '3'=>'Mar', '4'=>'Avr', '5'=>'Mai', '6'=>'Jun', '7'=>'Jul', '8'=>'aout', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
    //display months
    foreach ($m_array as $key=>$val){
        echo '<a href="index.php?y='.$y.'&m='.$key.'">'.$val.'</a>&nbsp&nbsp;';      
    }
    echo "<br><br>";

    $d_array = array('1'=>31, '2'=>28, '3'=>31, '4'=>30, '5'=>31, '6'=>30, '7'=>31, '8'=>31, '9'=>30, '10'=>31, '11'=>30, '12'=>31);
    $d_m = ($m==2 && $y%4==0)?29:$d_array[$m];
    echo '<table><tr><th colspan="7">'.$m_array[$m].'&nbsp'.$y.'</th></tr><tr>';
    //days array
    $days_array = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
    //display days
    foreach ($days_array as $key=>$val){
        echo '<th>'.$val.'</th>';      
    }
    echo "</tr></tr>";
    $date = $y.'-'.$m.'-01';
    //find start day of the month
    $startday = array_search(date('D',strtotime($date)), $days_array);
    //daisplay month dates
    for($i=0; $i<($d_m+$startday); $i++){
        $day = ($i-$startday+1<=9)?'0'.($i-$startday+1):$i-$startday+1;
        echo ($i<$startday)?'<td></td>':'<td>'.$day.'</td>';
        echo ($i%7==0)?'</tr><tr>':''; 
    }
    //calculate next & prev month
    $next_y=(($m+1)>12)?($y+1):$y;
    $next_m=(($m+1)>12)?1:($m+1);
    $prev_y=(($m-1)<=0)?($y-1):$y;
    $prev_m=(($m-1)<=0)?12:($m-1);
    //daisplay next prev
    echo '<tr><td><a href="index.php?y='.$prev_y.'&m='.$prev_m.'">Prev</a></td><td></td><td></td><td></td><td></td><td></td><td><a href="index.php?y='.$next_y.'&m='.$next_m.'">Next</a></td></tr>';
?>

<?php get_footer(); ?>