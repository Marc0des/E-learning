<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE LESSON</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Lesson File List
                    </div>
                    <div class="table-responsive"  style="word-wrap:break-word;">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                
                                <th class="text-left pl-4">Video Name</th>
       
                                
                            </tr>
                            </thead>

                            <tbody>
 
                            <?php
                            
                            $fetchVideos = $conn->query ("SELECT * FROM videos ORDER BY id DESC") or die(mysqli_error());
                            if($fetchVideos->rowCount() > 0) {
                            while ($selVidRow = $fetchVideos->fetch(PDO::FETCH_ASSOC)) { ?>
                                           <tr>
                                            <td class="pl-4">
                                                <?php echo $selVidRow['name']; ?>
                                            </td>
                                            <td>
                                            <video width="100%" height="240" autoplay controls>
                                                <source src="<?php echo $selVidRow['/adminpanel/admin/video']; ?>">
                                            </video>    
                                            </td>
                                        </tr>
                                        <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Videos Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                          
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</div>
         