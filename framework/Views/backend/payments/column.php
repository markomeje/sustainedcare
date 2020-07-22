<div class="cursor-pointer p-3 box-shadow clearfix mb-4 rounded" data-toggle="collapse" data-target="#payments">
    <div class="text-muted float-left">
        Payments Records
    </div>
    <div class="text-muted float-right">
        <i class="icofont-rounded-down"></i>
    </div>
</div>
<div id="payments" class="collapse show" data-parent="#accordions-two">
    <?php if(empty($payments)): ?>
        <div class="border-top border-bottom py-2 rounded clearfix px-3 mb-4">
            <div class="text-muted">No payment(s) yet</div>
        </div>
    <?php else: ?>
        <div class="border-top border-bottom py-2 rounded clearfix px-3 mb-4">
            <div class="text-muted float-left">
                Total payments <strong><del>N</del></strong><?= number_format($totalPayments); ?>
            </div>
            <a href="javascript:;" class="text-muted float-right">Reciept</a>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-custom">
                            <tr>
                                <th scope="col" class="text-white">
                                    <small>
                                        Serial
                                    </small>
                                </th>
                                <th scope="col" class="text-white">
                                    <small>
                                        Date
                                    </small>
                                </th>
                                <th scope="col" class="text-white">
                                    <small>
                                        Amount
                                    </small>
                                </th>
                                <th scope="col" class="text-white">
                                    <small>
                                        Bills
                                    </small>
                                </th>
                                <th scope="col" class="text-white">
                                    <small>
                                        Mode
                                    </small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            <?php foreach($payments as $payment): ?>
                                <tr class="cursor-pointer">
                                    <td>
                                        <small class="text-muted">
                                            <?= $counter++; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?= Application\Core\Help::formatDatetime($payment->date); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?= number_format($payment->amount); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?= number_format($payment->money); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?= $payment->mode; ?>
                                        </small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="border-top border-bottom py-2 rounded mb-4 px-3 clearfix">
            <div class="text-muted float-left">
                <?= count($payments); ?> Payments(s) made
            </div>
            <a href="javascript:;" class="text-muted float-right">Invoice</a>
        </div>
    <?php endif; ?>
</div>
