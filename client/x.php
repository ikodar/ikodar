<?php 
                  //retrieve data from project table
                  $query = "SELECT * FROM bid WHERE pid='$pid'";
                  $results = $conn->query($query);
                    if ($results->num_rows > 0){
                    //output data of each row
                     while ($row = $results->fetch_assoc()) { ?>	
                          <form action ="view.php"	method="post" class="was-validated">
                          <?php $email=$row['email'];?>
                          <tr>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['Bid']; ?></td>
                              <td><?php echo $row['Days']; ?></td>
                              <td><?php echo $row['Proposal']; ?></td>
                              <td>
                                <div class="input-group">
                                  <input type="hidden" name="IT" value="<?php echo $email?>">

                                  <button type="submit"  class="btn btn-primary pull-right"  name="view_btn">View</button>
                                  <button type="submit"  class="btn btn-primary pull-right"  name="accept_btn">Accept</button>
                                  
                                </div>
                              </td>
                          </tr>
                          </form>
                  <?php   
                    }

                  }else{
                    echo "0 results";
                  }
                    ?>