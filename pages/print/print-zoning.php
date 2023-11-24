
<section class="py-4">
    <div class="container px-5">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="min-height: 350px">
                    <div class="card-header" style="text-transform: uppercase; letter-spacing: 2px;">
                    Preview: <a href="pages/print/sub/zoning.php?token=<?= $_GET['id'] ?>" target="_blank" rel="noopener noreferrer"> Print Document</a>
                    </div>
                    <div class="card-body">
                        <?php 
                            include('./pages/print/sub/zoning.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
