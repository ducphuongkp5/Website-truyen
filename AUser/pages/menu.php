<div class="menu-ver-container">
        
        <div class="left">
            <div class="wrap-tab">
                <ul class="nav">
                    <li><a href="index.php">Đang theo dõi</a></li>
                    <li><a href="Caidat.php">Cài đặt</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="content-wrap">
                <div class="tab-panel">
                    <table class="list-bookmark">
                        <thead>
                            <tr>
                                <th style="padding-left:10px">Truyện</th>
                                <th>Last Update</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include 'Model/theodoi.php';
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>