<table class="table table-hover table-bordered mb-4">
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
                    Patient
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bill
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Paid
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Unpaid
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Referrer
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bonus
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Report
                </small>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 1; ?>
        <?php foreach($allAccounts as $accounts): ?>
            <tr class="cursor-pointer">
                <td>
                    <small class="text-muted">
                        <?= $counter++; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= Application\Core\Help::formatDatetime($accounts->date); ?>
                    </small>
                </td>
                <td>
                    <a href="<?= DOMAIN; ?>/patients/patient/<?= $accounts->patient; ?>" class="text-primary">
                        <small class="">
                            <?= $accounts->number; ?>
                        </small>
                    </a>
                </td>
                <td>
                    <small class="text-muted">
                        <?= number_format($accounts->amount); ?>
                    </small>
                </td>
                <td>
                    <small class="text-success">
                        <?= number_format($accounts->paid); ?>
                    </small>
                </td>
                <td>
                    <?php $unpaid = ($accounts->amount - $accounts->paid); ?>
                    <?php if(empty($unpaid)): ?>
                        <small class="text-muted">Nill</small>
                    <?php else: ?>
                        <small class="text-danger">
                           <?= number_format($unpaid); ?>
                        </small>
                    <?php endif; ?>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $accounts->name; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= number_format($accounts->bonus).' <span class="text-success">('.$accounts->percent.'%)</span>'; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= "Nill"; ?>
                    </small>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="bg-custom">
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
                    Patient
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bill
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Paid
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Unpaid
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Referrer
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bonus
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Report
                </small>
            </th>
        </tr>
    </tfoot>
</table>