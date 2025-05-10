<?php

function generate_time_table($con, $courseid, $s){

    $query = "select * from subject where department_id = $courseid and sem_id = $s";
    $que=mysqli_query($con, $query);
    $rows = mysqli_num_rows($que);

    if($rows != 0){
    
        $subjects = array();
        
        while($row = mysqli_fetch_assoc($que)){
            array_push($subjects, $row);
        }
        
        $weekTimeTable = array();
        
        for($i = 0; $i <= 4; $i++){
        
            $dayTimeTable = array();
            shuffle($subjects);
            $pointer = 0;
        
            for($j = 0; $j <= 5; $j++){
        
                try{
                    while($subjects[$pointer]['lecture_per_week'] === 0){
                        $pointer++;
                    }
        
                    if($subjects[$pointer]['type'] === "Lab"){
                        if($j === 1 || $j === 2 || $j === 4){
                            array_push($dayTimeTable, $subjects[$pointer]);
                            array_push($dayTimeTable, $subjects[$pointer]);
                            $subjects[$pointer]['lecture_per_week']--;
                            if($pointer === count($subjects) - 1){
                                $pointer = 0;
                            }
                            else{
                                $pointer++;
                            }
                            $j++;
                        }
                        else{
                            if($pointer === count($subjects) - 1){
                                $pointer = 0;
                            }
                            else{
                                $pointer++;
                            }
                        }
                    }
                    else if($subjects[$pointer]['type'] == "Theory"){
                        array_push($dayTimeTable, $subjects[$pointer]);
                        $subjects[$pointer]['lecture_per_week']--;
                        if($pointer === count($subjects) - 1){
                            $pointer = 0;
                        }
                        else{
                            $pointer++;
                        }
                    }
                }
                catch(OutOfBoundsException $e){
                    array_push($dayTimeTable, "Empty");
                }
            }
        
            array_push($weekTimeTable, $dayTimeTable);
        
        }
        
        // for($i = 0; $i < 5; $i++){
        //     echo "<tr>";
        //     echo "<th center class='danger text-center'>".$weekDays[$i]."</th>";
        //     for($j = 0; $j < 6; $j++){
        //         if($weekTimeTable[$i][$j]['type'] === 'Lab'){
        //           echo "<th class=' text-center' colspan=2>".$weekTimeTable[$i][$j]['subject_name']."</th>";
        //           $j++;
        //         }
        //         else{
        //           echo "<th class=' text-center'>".$weekTimeTable[$i][$j]['subject_name']."</th>";
        //         }
        //         if($j === 3){
        //           echo "<th class=' text-center'><b style='text-sze=24'>".$lunch[$i]."</b></th>";
        //         }
        //     }
        //     echo "</tr>";
        //   }

         return $weekTimeTable;
    
    }
    else{
        return false;
    }

}

?>