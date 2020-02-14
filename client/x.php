<?php
                        $query = "SELECT * FROM tasks where pid='$pid'";
                        $results = $conn->query($query);
                          if ($results->num_rows > 0) {
                          //output data of each row
                             while ($row = $results->fetch_assoc()) { 
                             { ?>			
                              <td><?php $tid= $row['tid']; ?></td>
                              <td><?php $task=$row['task']; ?></td>
                              <?php echo '
                               <form action="task.php" method="post">
                               <input type="hidden" name="pid" value="'.$pid.'">
                               <tr>
                                <td>'.$tid.'</td>
                                <td>'.$task.'</td>
                              </tr>
                              </form>
                       ';?>
                       <?php   }
                      }

                        }else{
                      echo "0 results";
                      }
                    ?>