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
                    Item
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Amount
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Type
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Delete
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Edit
                </small>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 1; ?>
        <?php foreach($allExpenses as $expenses): ?>
            <tr class="cursor-pointer">
                <td>
                    <small class="text-muted">
                        <?= $counter++; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= Application\Core\Help::formatDatetime($expenses->date); ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $expenses->item; ?>
                    </small>
                </td>
                <td>
                    <a href=""></a>
                    <small class="text-muted">
                        <?= $expenses->number; ?>
                    </small>
                </td>
                <td>
                    <small class="text-success">
                        <?= number_format($expenses->amount); ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $expenses->type; ?>
                    </small>
                </td>
                <td> 
                    <a href="javascript:;" class="delete-expenses text-danger" data-url="<?= DOMAIN; ?>/expenses/delete/<?= $expenses->id; ?>">
                        <small><i class="icofont-ui-delete"></i></small>
                    </a>
                </td>
                <td>
                    <a href="javascript:;" class="edit-expenses text-muted font-weight-normal" data-url="<?= DOMAIN; ?>/expenses/edit/<?= $expenses->id; ?>" data-toggle="modal" data-target="#edit-expenses-<?= $expenses->id; ?>">
                        <small><i class="icofont-ui-edit font-weight-lighter"></i></small>
                    </a>
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
                    Item
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Amount
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Type
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Delete
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Edit
                </small>
            </th>
        </tr>
    </tfoot>
</table>