<select class="form-control input-sm ces_clogic_list_value" name="ces_clogic_input[<?php echo $order?>]" >
                        <?php 
                        foreach ($list as $frow): 
                            ?>
                            <option value="<?php echo $frow['id']; ?>">
                              <?php echo $frow['name']; ?>
                            </option>
                            <?php 
                        endforeach; 
                            ?>
                        <?php unset($frow); ?>
                        </select>