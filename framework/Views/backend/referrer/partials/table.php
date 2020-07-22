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
                    Datetime
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Name
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bills
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bonus
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
        <?php foreach($referrers as $referrer): ?>
            <tr class="cursor-pointer">
                <td>
                    <small class="text-muted">
                        <?= $counter++; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= Application\Core\Help::formatDate($referrer->date); ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $referrer->name; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $referrer->number; ?>
                    </small>
                </td>
                <td>
                    <a href="javascript:;">
                        <small class="text-muted">
                            Nill
                        </small>
                    </a>
                </td>
                <td>
                    <small class="text-success">
                        <?= empty($referrer->bonus) ? "00" : $referrer->bonus; ?>%
                    </small>
                </td>
                <td> 
                    <a href="javascript:;" class="delete-referrer text-danger" data-url="<?= DOMAIN; ?>/referrer/delete/<?= $referrer->id; ?>">
                        <small><i class="icofont-ui-delete"></i></small>
                    </a>
                </td>
                <td>
                    <a href="javascript:;" class="edit-referrer text-primary" data-url="<?= DOMAIN; ?>/referrer/edit/<?= $referrer->id; ?>" data-toggle="modal" data-target="#edit-referrer-<?= $referrer->id; ?>">
                        <small><i class="icofont-ui-edit"></i></small>
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
                    Datetime
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Name
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bills
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Bonus
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