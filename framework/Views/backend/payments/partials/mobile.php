<?php foreach($payments as $payment): ?>
    <div class="col-12 col-md-6 col-lg-6 mb-4">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="clearfix">
                    <small class="float-left text-success">
                        <strong><del>N</del></strong>
                        <?= $payment->paid; ?> paid
                    </small>
                    <small class="float-right text-muted">
                        <?= $payment->mode; ?>
                    </small>
                </div>
            </div>
            <div class="card-footer bg-custom border-top-custom">
                <small class="text-white">
                    <?= Application\Core\Help::formatDatetime($payment->date); ?>
                </small>
            </div>
        </div>
    </div>
<?php endforeach; ?>