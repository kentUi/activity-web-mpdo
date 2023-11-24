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
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['req_firstName'] . ' ' . $row['req_lastName'];
                    ?>
                    <a href="./app/api/api.php?zone-approval&<?= $data_url ?>" class="btn btn-success btn-sm"
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
                        $data_url_decline = 'id=' . $_GET['id'] . '&name=' . $row['req_firstName'] . ' ' . $row['req_lastName'];
                        ?>
                        window.location.href = './app/api/api.php?zone-decline&<?= $data_url_decline ?>&reason=' + reason;
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
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['req_firstName'] . ' ' . $row['req_lastName'];
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
                        $data_url_complete = 'id=' . $_GET['id'] . '&name=' . $row['req_firstName'] . ' ' . $row['req_lastName'];
                        ?>
                        window.location.href = './app/api/api.php?zone-complete&<?= $data_url_complete ?>&date=' + date;
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
                    $data_url = 'id=' . $_GET['id'] . '&name=' . $row['req_firstName'] . ' ' . $row['req_lastName'];
                    ?>
                    <a href="./app/api/api.php?zone-release&<?= $data_url ?>" class="btn btn-success btn-sm"
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