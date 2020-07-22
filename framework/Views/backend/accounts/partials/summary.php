<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Total bills
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format($totalBills); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Referral bonus
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format($totalBonus); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Bank payments
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format($bankPayments); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Report bonus</a>
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format(00); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Money owed</a>
                </div>
                <small class="text-muted font-weight-bold">
                    <?php $debt = $unpaidBills + $partPaidBills; ?>
                    <strong><del>N</del></strong><?= number_format($debt); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Cash payments</a>
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format($cashPayments); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Total Expenses</a>
                </div>
                <small class="text-muted font-weight-bold">
                    <strong><del>N</del></strong><?= number_format($totalExpenses); ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card box-shadow border-0">
        <div class="card-body bg-white d-flex align-items-center rounded">
            <div class="rounded bg-custom text-center mr-3 panel-icons">
                <i class="icofont-hospital text-white"></i>
            </div>
            <div class="m-0">
                <div class="text-muted">
                    Grand total</a>
                </div>
                <small class="text-muted font-weight-bold">
                    <?php $grand = $totalBills - ($totalExpenses + $totalBonus + $bankPayments + $debt); ?>
                    <strong><del>N</del></strong><?= number_format($grand); ?>
                </small>
            </div>
        </div>
    </div>
</div>