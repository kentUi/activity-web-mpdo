<!-- Approve -->

<div class="modal fade" id="approval" tabindex="-1" aria-labelledby="approve" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <center>
                    <img src="/assets/chat.png" height="100">
                    <h4>Do you really want to <br> approve this application ?</h4>
                    <br>
                    <?php
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['local_corporation'];
                    ?>
                    <a href="./app/api/api.php?localize-approval&<?= $data_url ?>" class="btn btn-success btn-sm"
                        style="margin-right: 10px;">
                        Yes, Please proceed
                    </a>
                    <button class="btn btn-default btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        No, I Change my mind
                    </button>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>


<!-- Decline -->

<div class="modal fade" id="decline" tabindex="-1" aria-labelledby="decline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="decline">Please Provide a reason : </h5>
                </div>
                <br>
                <textarea id="reason" class="form-control" style="border: 1px solid #e1e1e1;" cols="30" rows="10"
                    placeholder="Write the reason here.."></textarea>
                <div class="d-grid">
                    <button onclick="reason()" class="btn btn-success btn-sm mt-3" style="margin-right: 10px;">
                        Confirm & Submit Application
                    </button>
                </div>
                <script>
                    function reason() {
                        var reason = document.getElementById('reason').value;
                        <?php
                        $data_url_decline = 'id=' . $_GET['id'] . '&name=' . $row['local_corporation'] ;
                        ?>
                        window.location.href = './app/api/api.php?localize-decline&<?= $data_url_decline ?>&reason=' + reason;
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<!-- Complete -->

<div class="modal fade" id="complete" tabindex="-1" aria-labelledby="complete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <center>
                    <img src="/assets/chat.png" height="100">
                    <h4>Are you sure that the application <br> is completed and ready ?</h4>
                    <br>
                    <?php
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['local_corporation'];
                    ?>
                    <div style="padding-left: 45px; padding-right: 45px; display: none;" id="schedule">
                        <input type="date" min="<?= date('Y-m-') . (date('d') + 1) ?>" value="<?= date('Y-m-') . (date('d') + 1) ?>" class="form-control" style="text-align: center; border: 1px solid #e1e1e1;" id="date">
                        <small style="text-transform: uppercase; letter-spacing: 1px;">Assign Schedule</small>
                        <span class="d-grid">
                            <button onclick="confirm()"
                                class="btn btn-success btn-sm mt-2">
                                Confirm & Submit
                            </button>
                            <button onclick="back()" class="btn btn-danger btn-sm mt-1">
                                Cancel
                            </button>
                        </span>
                    </div>

                    <div id="confirmed">
                        <button onclick="next()" class="btn btn-success btn-sm" style="margin-right: 10px;">
                            Yes, I'm sure
                        </button>
                        <button class="btn btn-default btn-sm" data-bs-dismiss="modal" aria-label="Close">
                            No, I will think again
                        </button>
                    </div>

                    <script>
                        function next() {
                            document.getElementById('schedule').style.display = 'block';
                            document.getElementById('confirmed').style.display = 'none';
                        }

                        function back() {
                            document.getElementById('schedule').style.display = 'none';
                            document.getElementById('confirmed').style.display = 'block';
                        }

                        function confirm() {
                        var date = document.getElementById('date').value;
                        <?php
                        $data_url_complete = 'id=' . $_GET['id'] . '&name=' . $row['local_corporation'];
                        ?>
                        window.location.href = './app/api/api.php?localize-complete&<?= $data_url_complete ?>&date=' + date;
                    }
                    </script>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Release -->

<div class="modal fade" id="release" tabindex="-1" aria-labelledby="complete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <center>
                    <img src="/assets/documentation.png" height="100">
                    <h4>The Documents <br> has been release ?</h4>
                    <br>
                    <?php
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['local_corporation'] ;
                    ?>
                    <a href="./app/api/api.php?localize-release&<?= $data_url ?>" class="btn btn-success btn-sm"
                        style="margin-right: 10px;">
                        Yes, Please proceed
                    </a>
                    <button class="btn btn-default btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        No, I Change my mind
                    </button>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>


<!-- Verify -->

<div class="modal fade" id="verify" tabindex="-1" aria-labelledby="complete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <center>

                    <div id="loading">
                        <img src="/assets/tenor-2677227502.gif" height="65" class="mb-3">
                        <h5><i> please wait..</i></h5>
                        <br>
                    </div>
                    <div id="found" style="display: none;">
                        <img src="/assets/done.png" height="100" class="mb-3">
                        <h4><b>Record Found!</b></h4>
                        Reference: [<a style="text-decoration: none;" target="_blank" href="?local&id=<?= $link_data_id ?>">Previous Request</a>]
                        <br><br>
                    </div>
                    <div id="not_found" style="display: none;">

                        <img src="/assets/denied.png" height="100" class="mb-3">
                        <h4><b>Record Not Found!</b></h4>
                        Maybe this is the first application ? <br> You can check into physical records.
                        <br><br>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>